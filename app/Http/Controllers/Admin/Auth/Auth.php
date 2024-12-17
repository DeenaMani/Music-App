<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class Auth extends Controller
{
    public function login()
    {
        return view('admin.pages.auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (FacadesAuth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('sucess', config('messages.login.success'));
        } else {
            return redirect()->back()->withInput()->with('error', config('messages.login.error'));
        }
    }

    public function logout(Request $request)
    {
        FacadesAuth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have been logged out.');
    }

    public function profile()
    {
        $user = User::find(FacadesAuth::user()->id);
        $user->role = Role::where('id', $user->role)->first()->name;
        return view('admin.pages.auth.profile', compact('user'));
    }


    public function profileUpdate(Request $request)
    {
        $user = User::findOrFail(FacadesAuth::user()->id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
            'mobile' => 'sometimes|required|string|unique:users,mobile,' . $user->id,
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        try {

            if ($request->hasfile('profile_picture')) {
                $images = $request->file('profile_picture');
                $image = time() . '.' . $images->getClientOriginalExtension();
                $destinationPath = public_path('/image/user');
                $images->move($destinationPath, $image);
                $validated['profile_picture'] = 'public/image/user/' . $image;
                if ($user->profile_picture && url($user->profile_picture)) {
                    unlink(url($user->profile_picture));
                }
            }

            $user->update($validated);
            return back()->with('success', config('messages.user.profile'));
        } catch (\Exception $e) {
            return back()->with('error', config('messages.user.error'));
        }
    }

    public function changePassword(Request $request)
    {
        $user = User::findOrFail(FacadesAuth::user()->id);

        $validated = $request->validate([
            'current_password' => 'required|required||min:6',
            'new_password' => 'required|required|min:6|same:confirm_password',
            'confirm_password' => 'required|required|min:6',
        ]);

        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->with('error', config('messages.user.passwordInvalid'))->withInput($request->all());
        }

        try {
            $user->update([
                'password' => bcrypt($validated['new_password']),
            ]);
            return back()->with('success', config('messages.user.password'))->withInput([$request->current_password]);
        } catch (\Exception $e) {
            return back()->with('error', config('messages.user.error'));
        }
    }
}
