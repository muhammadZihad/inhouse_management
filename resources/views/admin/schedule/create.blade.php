@extends('layout.body')


@section('content')
    <form method="POST" action="{{route('schedule.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Project title" name="title">
        </div>
        <div class="form-group">
            <label for="desc">Description</label>
            <textarea name="description" id="desc" cols="30" rows="10" placeholder="Description about the project" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">From (date)</label>
            <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Password" name="fromDate">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">To (date)</label>
            <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Salary in tk" name="toDate">
        </div>

        Assign this to:
        @foreach ($users as $user)
            <div class="form-check">
                <label class="form-check-label"><input class="form-check-input" type="checkbox" value="{{$user->id}}" name="users[]">{{$user->name}}</label>
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Add Schedule</button>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection