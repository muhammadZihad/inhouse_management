<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\User;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.schedule.schedule')->with('list', Schedule::all());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->sortBy('name');
        return view('admin.schedule.create')->with('users', $users);
    }
    public function mySched()
    {
        $user = auth()->user();
        return view('admin.schedule.schedule')
            ->with('list', User::find($user->id)->schedules);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'fromDate' => 'required',
            'toDate' => 'required',
            'users' => 'required'
        ]);
        $schedule = Schedule::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'Running',
            'leader_id' => $request->leader,
            'from_Date' => $request->fromDate,
            'to_Date' => $request->toDate,
        ]);
        $schedule->users()->attach($request->users);
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
        $sch = Schedule::find($id);
        return view('admin.schedule.single')
            ->with('item', $sch)
            ->with('lead', User::find($sch->leader_id))
            ->with('users', User::all());
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'fromDate' => 'required',
            'toDate' => 'required',
            'users' => 'required'
        ]);
        $schedule = Schedule::find($id);
        $schedule->title = $request->title;
        $schedule->description = $request->description;
        $schedule->status = $request->status;
        $schedule->leader_id = $request->leader;
        $schedule->from_Date = $request->fromDate;
        $schedule->to_Date = $request->toDate;
        $schedule->save();
        if ($request->users) {
            $schedule->users()->sync($request->users);
        }

        return redirect(route('mesched'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}