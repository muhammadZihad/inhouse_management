@extends('layout.body')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 p-5 card">
            <div class="card-header p-0">Update Salary Status
            </div>
            <form method="POST" action="{{route('salary.update',$user->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        value="{{$user->user->name}}" disabled name="title">
                </div>
                <div class="form-group">
                    <label for="dept">Department</label>
                    <input type="text" class="form-control" id="dept" aria-describedby="emailHelp"
                        value="{{$user->user->department->name}}" disabled name="designation">
                </div>
                <div class="form-group">
                    <label for="desc">Designation</label>
                    <input type="text" class="form-control" id="desc" aria-describedby="emailHelp"
                        value="{{$user->user->designation->name}}" disabled name="designation">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp"
                        value="{{$user->user->email}}" disabled name="email">
                </div>
                <div class="form-group">
                    <label for="phn">Phone</label>
                    <input type="text" class="form-control" id="phn" aria-describedby="emailHelp"
                        value="{{$user->user->phone}}" disabled name="phone">
                </div>
                <div class="form-group">
                    <label for="mon">Month</label>
                    <input type="text" class="form-control" id="phn" aria-describedby="emailHelp"
                        value="{{$user->month->name}}" disabled name="phone">
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="text" class="form-control" id="amount" aria-describedby="emailHelp"
                        value="{{$user->amount->amount}}" disabled name="phone">
                </div>
                <div class="form-group">
                    <label class="form-check-label">Payment Status</label>
                    <select class="form-control" name="status" id="status">
                        <option @if ($user->status == "Pending")
                            selected
                            @endif value="Pending">Pending</option>
                        <option @if ($user->status == "Due")
                            selected
                            @endif value="Due">Due</option>
                        <option @if ($user->status == "Paid")
                            selected
                            @endif value="Paid">Paid</option>
                    </select>

                </div>
                <div class="d-block text-center card-footer"><button type="submit"
                        class="btn btn-success">Update</button></div>

            </form>
        </div>
    </div>

</div>



@endsection

@section('upperjs')
<script src="{{asset('js/sort.js')}}"></script>
@endsection