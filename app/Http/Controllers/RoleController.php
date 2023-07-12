<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::orderBy('level')->get();
        return view('Admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */

   

    public function create()
    {
        //
        $roles = Role::orderBy('level')->get();

        return view('Admin.roles.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'role' => 'required|min:3',
            'role_id' => 'required'
        ]);
        $prev_role = Role::find($request->role_id);



        $next_roles = Role::where('level', '>', $prev_role->level + 1)->get();



        foreach ($next_roles as $role) {
            $role->level = $role->level + 1;
            $role->save();
        }





        $data = [
            'role' => $request->role,
            'level' => $prev_role->level + 1
        ];

        Role::create($data);

        return redirect(route('roles.index'))->with('success', 'Role Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        return view('Admin.roles.manage');
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
