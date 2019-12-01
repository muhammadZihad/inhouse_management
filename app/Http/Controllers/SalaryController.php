<?php

namespace App\Http\Controllers;

use App\Month;
use App\Salary;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.salary.salary')->with('sals', Salary::all());
    }
    public function index_my($id)
    {
        return view('admin.salary.salary')->with('sals', User::find($id)->salaries);
    }

    public function push_sal($id)
    {
        $user = User::find($id);
        $prev = $user->salaries;
        $bool1 = false;
        $bool2 = false;
        $mon = Carbon::now()->format('F');
        if ($prev->last()) {
            $prev_mon = $prev->last()->month->name;
            if ($prev_mon != $mon) {
                $bool1 = true;
            }
        } else {
            $bool2 = true;
        }
        if ($bool1 || $bool2) {
            $mon_id = Month::where('name', 'like', $mon)->first()->id;
            Salary::create([
                'user_id' => $id,
                'amount_id' => $user->amount_id,
                'month_id' => $mon_id,
                'status' => 'Pending'
            ]);
        }
        return redirect()->back();
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
        //
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
    public function edit(Salary $salary)
    {
        return view('admin.salary.update')->with('user', $salary);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        //
        $salary->status = $request->status;
        $salary->save();
        return redirect(route('salary.index'));
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