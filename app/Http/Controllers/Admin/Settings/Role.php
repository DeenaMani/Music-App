<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Role as ModelsRole;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Role extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = ModelsRole::withCount('users')->get();
        $roles = $roles->map(function ($role) {
            $role->url = route('role.update', $role->id);

            return $role;
        });

        return view('admin.pages.settings.roles.index', compact('roles'));
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
        $request->validate([
            'name' => 'required|string|max:60|unique:roles,name',
            'status' => 'required|in:1,2',
        ]);

        try {
            $role = ModelsRole::create($request->all());
            session()->flash('success', config('messages.role.added'));
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            session()->flash('error', config('messages.role.error'));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:60', Rule::unique('roles', 'name')->ignore($id),],
            'status' => 'required|in:1,2',
        ]);
        try {
            $role = ModelsRole::findOrFail($id);
            $role->update($request->all());
            session()->flash('success', config('messages.role.updated'));
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            session()->flash('error', config('messages.role.error'));
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = ModelsRole::findOrFail($id);
        $role->delete();

        return back()->with('success', 'Role deleted successfully.');
    }
}
