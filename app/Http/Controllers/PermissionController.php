<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permissions = Permission::orderBy('permission')->get();

        // dd(auth()->user()->role->permissons);
        return view('Admin.permissions.index', compact('permissions'));
    }

    public function manage()
    {
        //
        $permissions = Permission::all();

        dd(auth()->user()->role->permissons);
        return view('Admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = User::find(session()->get('u_id'));



        $user_permissions = $user->permissions()->get()->pluck('id');

        $permissions = Permission::whereNotIn('id', $user_permissions)->get();


        return view('Admin.permissions.create', compact('user', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'permissions' => 'required|array'
        ]);

        $permissions = $request->permissions;
        $role = User::find(session()->get('u_id'))->role;







        $role->permissions()->sync($permissions);

        return redirect()->route('roles.index')->with('success', 'Permissions Added Successfully');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
