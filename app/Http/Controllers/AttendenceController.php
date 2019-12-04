<?php

namespace App\Http\Controllers;

use App\Attendence;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.attendence.att')->with('list', Attendence::all()->sortBy('date'));
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
        $carbon = new Carbon('today 10am', '+6:00');
        if ($carbon >= Carbon::now('+6:00')) {
            $status = 'on time ';
        } else {
            $status = 'late ';
        }
        Attendence::create([
            'user_id' => auth()->user()->id,
            'date' => Carbon::now('+6:00')->toDateString(),
            'time_in' => Carbon::now('+6:00')->toTimeString(),
            'status' => $status
        ]);
        return redirect(route('home'));
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
        //
        $att = Attendence::where('user_id', $id)->where('date', Carbon::now('+6:00')->toDateString())->first();

        $carbon = new Carbon('today 6pm', '+6:00');
        if ($carbon <= Carbon::now('+6:00')) {
            $att->status = $att->status . '/ after time';
        } else {
            $att->status = $att->status . '/ early';
        }
        $att->time_out = Carbon::now('+6:00')->toTimeString();
        $att->save();
        return redirect(route('home'));
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