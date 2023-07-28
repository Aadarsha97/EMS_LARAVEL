<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $roles = Role::orderBy('level')->where('role', '!=', 'Admin')->get();

        $d = date('Y-m');

        $query = "
    SELECT date, COUNT(*) AS count
    FROM attendances 
    WHERE date LIKE ?
    GROUP BY date
";

        $attendances = DB::select($query, ["$d%"]);
        $attendances = collect($attendances)->pluck('count', 'date');


        return view('Admin.analytics.index', compact('roles', 'attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function changemonth(Request $request)
    {
        //

        print_r($request->all());
    }

    public function fetch(Request $request)
    {
        //


        $d = $request->month;

        $query = "
      SELECT date, COUNT(*) AS count
    FROM attendances 
    WHERE date LIKE ?
    GROUP BY date
";

        $attendances = DB::select($query, ["$d%"]);
        $attendances = collect($attendances)->pluck('count', 'date');



        return response()->json($attendances);
    }

    public function create()
    {
        //
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
