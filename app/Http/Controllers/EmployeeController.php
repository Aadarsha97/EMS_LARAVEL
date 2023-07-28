<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


        $employees = User::all();


        return view('Admin.Employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments = Department::all();
        $roles = Role::all();

        return view('Admin.Employees.create')->with(compact('departments', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'department_id' => 'required',
            'password' => 'required|max:255|min:6',
            'confirm_password' => 'required|same:password|max:255|min:6'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'department_id' => $request->department_id,
        ];

        $data['password'] = Hash::make($request->password);

        User::create($data);


        return view('Admin.Employees.index')->with('success', 'New Employee Added Successfully');
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

        $employee = User::find($id);
        $departments = Department::all();
        $roles = Role::all();

        return view('Admin.Employees.edit', compact('employee', 'departments', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'department_id' => 'required|integer',
            'password' => 'nullable|string|max:255|min:6',
            'confirm_password' => 'nullable|same:password|max:255|min:6',
        ]);


        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'department_id' => $request->department_id,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::find($id)->update($data);


        if ($request->password) {
            User::find($id)->update($data);
        }

        return redirect()->route('employee.index')->with('success', 'Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //


        $this->index()->with('success', ' Employee Deleted Successfully');
    }
}
