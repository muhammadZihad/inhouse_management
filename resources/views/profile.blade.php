@extends('layout.body')

@section('content')
Name : {{$user->name}}
Department : {{$user->department->name}}
Designation : {{$user->designation->name}}
Salary : {{$user->amount->amount}}
National Id : {{$user->national_id}}
Address : {{$user->home_address}}
@endsection


@section('upperjs')

@endsection