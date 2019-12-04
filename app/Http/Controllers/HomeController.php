<?php

namespace App\Http\Controllers;

use App\Attendence;
use App\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $att = Attendence::where('user_id', auth()->user()->id)
            ->where('date', Carbon::now('+6:00')->toDateString())->first();
        return view('dash')->with('att', $att);
        // dd(Attendence::where('user_id', auth()->user()->id));
        // return view('dash')->with('chk', Attendence::where('user_id', auth()->user()->id)->sortByDesc('date')->first());
    }
}