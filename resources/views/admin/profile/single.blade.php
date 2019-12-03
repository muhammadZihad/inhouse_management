@extends('layout.body')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="main-card mb-3 p-5 card">
            <div class="card-header p-0">Profile
            </div>

            <form method="POST" action="{{route('profile.update',$item->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group text-center">
                    {{-- <img class="rounded-circle m-3" src="{{Gravatar::get($item->email,['size'=>150])}}" alt="">
                    --}}
                    <img class="rounded-circle m-3" src="{{gravatar('abdur15-9097@diu.edu.bd')->s(120)}}" alt="">
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="" class="form-control" value="{{$item->name}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="id">National ID</label>
                            <input type="text" name="id" id="" class="form-control" value="{{$item->national_id}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <select name="salary" id="" class="form-control">
                                @if (auth()->user()->isAdmin || auth()->user()->id==$item->id)
                                @foreach ($sal as $i)
                                <option @if ($item->amount_id==$i->id)
                                    selected
                                    @endif
                                    value="{{$i->id}}">{{$i->amount}}</option>
                                @endforeach
                                @else
                                <option selected value="lol">You are not authorized</option>

                                @endif

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="" class="form-control" value="{{$item->email}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <select type="text" name="designation" id="" class="form-control">
                                @foreach ($des as $i)
                                <option @if ($item->designation_id==$i->id)
                                    selected
                                    @endif
                                    value="{{$i->id}}">{{$i->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="department">Department</label>
                            <select type="text" name="department" id="" class="form-control">
                                @foreach ($dep as $i)
                                <option @if ($item->department_id==$i->id)
                                    selected
                                    @endif
                                    value="{{$i->id}}">{{$i->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="form-control" name="phone" id="" value="{{$item->phone}}"></input>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" name="type" id="">
                                <option @if ($item->type=='Permanent')
                                    selected
                                    @endif
                                    value="Permanent">Permanent</option>
                                <option @if ($item->type=='Part-Time')
                                    selected
                                    @endif
                                    value="Part-Time">Part-Time</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="">
                                <option @if ($item->gender=='Male')
                                    selected
                                    @endif
                                    value="Male">Male</option>
                                <option @if ($item->gender=='Female')
                                    selected
                                    @endif value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" value="{{$item->d_o_b}}"></input>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="std">Start Date</label>
                            <input type="date" class="form-control" name="std" value="{{$item->start_date}}"></input>
                        </div>
                    </div>


                    <div class="col-4">
                        <div class="form-group">
                            <label for="gender">Is Admin ?</label>
                            <select class="form-control" name="admin" id="">
                                <option @if ($item->isadmin==1)
                                    selected
                                    @endif
                                    value=1>Yes</option>
                                <option @if ($item->isAdmin==0)
                                    selected
                                    @endif value=0>No</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" rows="2">{{$item->home_address}}</textarea>
                        </div>
                    </div>
                </div>
                @if (auth()->user()->isAdmin || auth()->user()->id==$item->id)
                <div class="d-block text-center card-footer"><button type="submit"
                        class="btn btn-success">Update</button></div>
                @endif

            </form>
        </div>
    </div>
</div>

@if (! (auth()->user()->isAdmin || auth()->user()->id==$item->id))
<script>
    let arr =  document.querySelectorAll('input');
    arr.forEach(element => {
       element.disabled = true; 
    });
    document.querySelector('textarea').disabled = true;
    let arra =  document.querySelectorAll('select');
    arra.forEach(element => {
       element.disabled = true; 
    });
</script>
@endif
@endsection


@section('upperjs')

@endsection