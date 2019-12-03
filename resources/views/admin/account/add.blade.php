@extends('layout.body')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="main-card mb-3 p-5 card">
            <div class="card-header p-0">Profile
            </div>

            <form action="">
                @csrf
                <div class="form-group text-center">
                    <img class="rounded-circle m-3" src="{{Gravatar::get($item->email,['size'=>150])}}" alt="">
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="id">National ID</label>
                            <input type="text" name="id" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <select name="salary" id="" class="form-control">
                                <option value="5000">50000</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="department">Department</label>
                            <input type="text" name="department" id="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="form-control" name="phone" id=""></input>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" name="type" id="">
                                <option value="Permanent">Permanent</option>
                                <option value="Part-Time">Part-Time</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" name="dob"></input>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="std">Start Date</label>
                            <input type="date" class="form-control" name="std"></input>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="d-block text-center card-footer"><button type="submit"
                        class="btn btn-success">Update</button></div>

            </form>
        </div>
    </div>
</div>


{{-- Name : {{$item->name}}
Department : {{$item->department->name}}
Designation : {{$item->designation->name}}
Salary : {{$item->amount->amount}}
National Id : {{$item->national_id}}
Address : {{$item->home_address}} --}}
@endsection


@section('upperjs')

@endsection