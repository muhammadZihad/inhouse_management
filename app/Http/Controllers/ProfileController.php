<?php

namespace App\Http\Controllers;

use App\Amount;
use App\Department;
use App\Designation;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = User::find($id);
        // return view('profile')->with('user', $user);
    }
    public function myPro()
    {
        return view('admin.profile.single')
            ->with('item', User::find(auth()->user())->first())
            ->with('des', Designation::all())
            ->with('sal', Amount::all())
            ->with('dep', Department::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.create')
            ->with('des', Designation::all())
            ->with('sal', Amount::all())
            ->with('dep', Department::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->image->store('profile');
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'home_address' => $request->address,
            'gender' => $request->gender,
            'national_id' => $request->id,
            'type' => $request->type,
            'password' => bcrypt('password'),
            'isAdmin' => $request->admin,
            'd_o_b' => $request->dob,
            'start_date' => $request->std,
            'department_id' => $request->department,
            'designation_id' => $request->designation,
            'amount_id' => $request->salary,
            'image' => $image,
        ]);
        return redirect(route('employee.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.profile.single')
            ->with('item', User::find($id))
            ->with('des', Designation::all())
            ->with('sal', Amount::all())
            ->with('dep', Department::all());
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->home_address = $request->address;
        $user->phone = $request->phone;
        $user->national_id = $request->id;
        $user->gender = $request->gender;
        $user->type = $request->type;
        $user->isAdmin = $request->admin;
        $user->d_o_b = $request->dob;
        $user->amount_id = $request->salary;
        $user->start_date = $request->std;
        $user->department_id = $request->department;
        $user->designation_id = $request->designation;


        $user->save();
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
        //
    }
}