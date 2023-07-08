<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


        return view('Admin.Employees.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments = Department::all();

        return view('Admin.Employees.create')->with(compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required|numeric|max_digits:13',
            'department_id' => 'required',
            'dob' => 'required|date|before:' . Carbon::now()->subYears(16)->format('Y-m-d'),
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/|max:255|min:6',
            'confirm_password' => 'required|same:password|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/|max:255|min:6'
        ]);

        dd($request);

        $this->index()->with('success', 'New Employee Added Successfully');
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


        $this->index()->with('success', ' Employee Updated Successfully');
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
