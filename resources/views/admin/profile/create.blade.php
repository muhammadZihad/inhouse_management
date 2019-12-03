@extends('layout.body')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="main-card mb-3 p-5 card">
            <div class="card-header p-0">Profile
            </div>

            <form method="POST" action="{{route('profile.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="id">National ID</label>
                            <input type="text" name="id" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <select name="salary" id="" class="form-control" required>
                                @foreach ($sal as $i)
                                <option value="{{$i->id}}">{{$i->amount}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class=" col-4">
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <select type="text" name="designation" id="" class="form-control" required>
                                @foreach ($des as $i)
                                <option value="{{$i->id}}">{{$i->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="department">Department</label>
                            <select type="text" name="department" id="" class="form-control" required>
                                @foreach ($dep as $i)
                                <option value="{{$i->id}}">{{$i->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="form-control" name="phone" id="" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" name="type" id="" required>
                                <option value="Permanent">Permanent</option>
                                <option value="Part-Time">Part-Time</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="" required>
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
                            <input type="date" class="form-control" name="dob" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="std">Start Date</label>
                            <input type="date" class="form-control" name="std" required>
                        </div>
                    </div>


                    <div class="col-4">
                        <div class="form-group">
                            <label for="gender">Is Admin ?</label>
                            <select class="form-control" name="admin" id="" required>
                                <option value=1>Yes</option>
                                <option value=0>No</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" name="address" rows="2" required></textarea>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="d-block text-center card-footer"><button type="submit"
                        class="btn btn-success">Create</button></div>

            </form>
        </div>
    </div>
</div>

@endsection


@section('upperjs')

@endsection