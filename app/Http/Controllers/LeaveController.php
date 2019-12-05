<?php

namespace App\Http\Controllers;

use App\Leave;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Leave::all()->sortByDesc('date');
        return view('admin.leave.index')
            ->with('list', $list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Leave::create([
            'user_id' => auth()->user()->id,
            'msg' => $request->msg,
            'req_date' => $request->date,
            'status' => 'requested',
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $l = Leave::find($id);
        $l->approver = auth()->user()->name;
        $l->app_date = Carbon::now('+6:00')->toDateString();
        $l->status = 'approved';
        $l->save();
        return redirect()->back();
    }
    public function update2(Request $request, $id)
    {
        $l = Leave::find($id);
        $l->approver = auth()->user()->name;
        $l->app_date = Carbon::now('+6:00')->toDateString();
        $l->status = 'declined';
        $l->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $l = Leave::find($id);
        $l->delete();
        return redirect()->back();
    }
}