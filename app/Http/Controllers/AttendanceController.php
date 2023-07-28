<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $attendances = Attendance::where('date', date('Y-m-d'))->get();




        $oldattendances = Attendance::where('date', date('Y-m-d'))->where('user_id', auth()->user()->id)->first();
        $leave = Leave::where('date', date('Y-m-d'))->where('user_id', auth()->user()->id)->first();

        if (auth()->user()->role->role == 'Admin') {
            return view('admin.attendance.index', compact('attendances', 'oldattendances', 'leave'));
        } else {

            $id = auth()->user()->id;



            $attendances = Attendance::where('user_id', $id)->orderBy('date', 'desc')->get();

            // dd($attendances);
            $user = User::find($id);





            $thisattenance = Attendance::where('user_id', $id)->whereMonth('date', date('m'))->count();
            $thisleave = Leave::where('user_id', $id)->whereMonth('date', date('m'))->count();

            $days = [$thisattenance, $thisleave];



            return view('admin.attendance.history', compact('attendances', 'user', 'oldattendances', 'leave', 'days'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $attendance = Attendance::where('user_id', auth()->user()->id)->where('date', date('Y-m-d'))->first();

        return view('admin.attendance.create', compact('attendance'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->input('date', date('Y-m-d'));

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'work_plan' => 'required|string',
            'date' => 'date|unique:attendances,date'

        ]);



        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $filename);


        $data = [
            'user_id' => auth()->user()->id,
            'image' => $filename,
            'work_plan' => $request->work_plan,
            'date' => date('Y-m-d'),
        ];

        Attendance::create($data);

        return redirect()->route('attendance.index', ['success', 'Attendance Registered Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //


        $attendance = Attendance::find($id);




        return view('admin.attendance.show', compact('attendance'));
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


    public function history(string $id)
    {
        //
        $oldattendances = Attendance::where('date', date('Y-m-d'))->where('user_id', auth()->user()->id)->first();
        $leave = Leave::where('date', date('Y-m-d'))->where('user_id', auth()->user()->id)->first();

        $attendances = Attendance::where('user_id', $id)->orderBy('date', 'desc')->get();

        // dd($attendances);
        $user = User::find($id);


        $thisattenance = Attendance::where('user_id', $id)->whereMonth('date', date('m'))->count();
        $thisleave = Leave::where('user_id', $id)->whereMonth('date', date('m'))->count();

        $days = [$thisattenance, $thisleave];



        return view('admin.attendance.history', compact('attendances', 'user', 'oldattendances', 'leave', 'days'));
    }

    public function changemonth(Request $request)
    {

        $request = $request->toArray();
        $month = $request['data']['month'];
        $id = $request['data']['user_id'];



        $thisattenance = Attendance::where('user_id', $id)->where('date', 'LIKE', $month . "%")->count();
        $thisleave = Leave::where('user_id', $id)->where('date', 'LIKE', $month . "%")->count();

        $days = [$thisattenance, $thisleave];





        return response()->json($days);
    }
}
