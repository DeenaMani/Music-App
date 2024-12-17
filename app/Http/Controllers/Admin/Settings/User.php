<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = ModelsUser::all();
        $users = $users->map(function ($user) {
            $user->url = route('user.update', $user->id);

            return $user;
        });
        $roles = Role::where('status', 1)->get();

        return view('admin.pages.settings.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'role' => 'required|integer|exists:roles,id',
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|string',
            'password' => 'required',
            'profile_picture' => 'nullable|image|max:2048',
            'status' => 'nullable|in:1,2',
        ]);

        try {
            if ($request->hasfile('profile_picture')) {
                $images = $request->file('profile_picture');
                $image = time() . '.' . $images->getClientOriginalExtension();
                $destinationPath = public_path('/image/user');
                $images->move($destinationPath, $image);
                $validated['profile_picture'] = 'public/image/user/' . $image;
            }

            $validated['password'] = Hash::make($validated['password']);
            $user = ModelsUser::create($validated);
            session()->flash('success', config('messages.user.created'));
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            session()->flash('error', config('messages.user.error'));
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = ModelsUser::findOrFail($id);

        $validated = $request->validate([
            'role' => 'required|integer|exists:roles,id',
            'name' => 'sometimes|required|string|max:255',
            'username' => 'sometimes|required|string|unique:users,username,' . $user->id,
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
            'mobile' => 'sometimes|required|string|unique:users,mobile,' . $user->id,
            'profile_picture' => 'nullable|image|max:2048',
            'status' => 'required|in:1,2',
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
            session()->flash('success', config('messages.user.updated'));
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            session()->flash('error', config('messages.user.error'));
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = ModelsUser::findOrFail(decrypt($id));

        if ($user->email == 'horizontamil@gmail.com' || $user->email == Auth::user()->email) {
            return back()->with('error', config('messages.user.authuser'));
        }

        $user->delete();

        return back()->with('success', config('messages.user.delete'));
    }

    // Change Password
    public function changePassword(Request $request, $id)
    {
        $user = ModelsUser::findOrFail($id);

        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ]);

        if (!Hash::check($validated['current_password'], $user->password)) {
            return response()->json(['error' => 'Current password is incorrect'], 400);
        }

        $user->password = Hash::make($validated['new_password']);
        $user->save();

        return back()->with('success', config('messages.user.password'));
    }

    // Profile Update by User
    public function updateProfile(Request $request, $id)
    {
        $user = ModelsUser::findOrFail($id);
        if (auth()->id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'username' => 'sometimes|required|string|unique:users,username,' . $user->id,
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
            'mobile' => 'sometimes|required|string|unique:users,mobile,' . $user->id,
            'profile_picture' => 'nullable|image|max:2048',
        ]);

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
    }
}
