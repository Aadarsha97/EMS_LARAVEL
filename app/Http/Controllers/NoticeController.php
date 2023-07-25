<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


        return view('admin.notice.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();

        $data['user_id'] = auth()->user()->id;
        $data['date'] = date('Y-m-d');

        Notice::create($data);

        return redirect()->route('notice.index', ['success', 'Notice Created Successfully']);
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

        $notice = Notice::find($id);

        return view('admin.notice.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //



        return redirect()->route('notice.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        Notice::find($id)->delete();

        return redirect()->route('notice.index', ['success', 'Notice Deleted Successfully']);
    }
}
