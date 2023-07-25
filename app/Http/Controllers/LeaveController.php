<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (auth()->user()->role == 'admin') {
            $leaves = Leave::orderBy('date', 'desc')->get();
        } else {
            $leaves = Leave::where('user_id', auth()->user()->id)->orderBy('date', 'desc')->get();
        }

        return view('Admin.leaves.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('Admin.leaves.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'leave_reason' => 'required'
        ]);

        $leave = new Leave();
        $leave->user_id = auth()->user()->id;
        $leave->leave_reason = $request->leave_reason;
        $leave->date = date('Y-m-d');
        $leave->save();

        return redirect()->route('attendance.index')->with('success', 'Leave Requested Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
