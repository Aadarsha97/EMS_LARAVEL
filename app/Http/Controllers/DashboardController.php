<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Role;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $departments = Department::count();
        $roles = Role::count();
        $salary = Salary::where('status', 'Pending')->count();
        $employee = User::count();
        return view('Admin.dashboard', compact('departments', 'roles', 'salary', 'employee'));
    }
}
