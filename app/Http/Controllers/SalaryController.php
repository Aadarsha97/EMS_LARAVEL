<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $role = Role::where('level', '>=', auth()->user()->role->level)->pluck('id')->toArray();


        $users = User::whereIn('role_id', $role)->get();



        foreach ($users as $user) {
            $salary = Salary::where('user_id', $user->id)->where('month', date('m'))->first();
            if (!$salary) {
                $salary = new Salary();
                $salary->user_id = $user->id;
                $salary->salary = 50000;
                $salary->month = date('m');
                $salary->save();
            }
        }

        $salaries = Salary::where('month', date('m'))->get();

        return view('admin.salary.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.salary.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        //
    }


    public function paid($id)
    {


        $salary = Salary::find($id);
        $salary->status = "Paid";
        $salary->save();

        return redirect()->back()->with('success', 'Salary Paid Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        //
    }
}
