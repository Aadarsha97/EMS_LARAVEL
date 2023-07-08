<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departments = Department::all();
        return view('Admin.Departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('Admin.Departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required|min:3'
        ]);
        $data = [
            'name' => $request->name
        ];

        Department::create($data);

        return redirect(route('departments.index'))->with('success', 'New Department created Successfully');
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
        $department = Department::findorFail($id);

        return view('Admin.Departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = [
            'name' => $request->name
        ];

        $department = Department::findorFail($id);
        $department->update($data);

        return redirect(route('departments.index'))->with('success', "Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //


        $department->delete();

        return redirect(route('departments.index'))->with('success', "Successfully Deleted");
    }
}
