@extends('layout.body')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Welcome To Your Dashboard
                <div class="page-title-subheading">This is an example dashboard created using build-in elements and
                    components.
                </div>
            </div>
        </div>
        <div class="page-title-actions d-flex align-items-center">
            Attendence :
            @if (!$att)
            <form action="{{route('attendence.store')}}" method="POST">
                @csrf
                <button type="submit" class="btn-shadow mr-3 ml-1 btn btn-success">
                    + Check in
                </button>
            </form>
            @elseif($att->time_out==null)
            <form action="{{route('attendence.update',auth()->user()->id)}}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn-shadow mr-3 ml-1 btn btn-warning">
                    - Check out
                </button>
            </form>
            @else
            <button type="submit" class="btn-shadow mr-3 btn btn-secondary">
                Done
            </button>
            @endif
        </div>
    </div>
</div>

@admin
<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Employee</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-success">{{$emp}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Projects Running</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning">{{$sch}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">

                    <div class="widget-content-left">
                        <div class="widget-heading">Want a leave ?</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-danger"><button type="button"
                                class="btn mr-2 mb-2 btn-primary clk" data-toggle="modal" data-target="#exampleModal">
                                Click
                            </button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Income</div>
                        <div class="widget-subheading">Expected totals</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-focus">$147</div>
                    </div>
                </div>
                <div class="widget-progress-wrapper">
                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0"
                            aria-valuemax="100" style="width: 54%;"></div>
                    </div>
                    <div class="progress-sub-label">
                        <div class="sub-label-left">Expenses</div>
                        <div class="sub-label-right">100%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endadmin

<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-header">My Attendence <small class="text-muted pl-1">Last 7 days</small>
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Date</th>
                            <th class="text-center">Check in</th>
                            <th class="text-center">Check out</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @if (auth()->user()->attendences->sortByDesc('date')->take(7))
                        @foreach (auth()->user()->attendences->sortByDesc('date')->take(7) as $item)
                        <tr>
                            <td class="text-center text-muted">#{{$i++}}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{$item->date}}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="badge badge-success">{{$item->time_in}}</div>
                            </td>
                            <td class="text-center">
                                <div class="badge badge-warning">{{$item->time_out}}</div>
                            </td>
                            <td class="text-center">
                                <div class="badge badge-primary">{{$item->status}}</div>
                            </td>
                        </tr>
                        @endforeach
                        @endif



                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i
                        class="pe-7s-trash btn-icon-wrapper"> </i></button>
                <button class="btn-wide btn btn-success">Save</button>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-header">My Schedule
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Title</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @if (auth()->user()->schedules->take(5))
                        @foreach (auth()->user()->schedules->take(5) as $item)
                        <tr>
                            <td class="text-center text-muted">#{{$i++}}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{$item->title}}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{$item->description}}</td>
                            <td class="text-center">
                                <div class="badge badge-warning">{{$item->status}}</div>
                            </td>
                            <td class="text-center">
                                <button type="button" id="PopoverCustomT-1"
                                    class="btn btn-primary btn-sm">Details</button>
                            </td>
                        </tr>
                        @endforeach
                        @endif



                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i
                        class="pe-7s-trash btn-icon-wrapper"> </i></button>
                <button class="btn-wide btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('underjs')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request for Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('leave.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="date">Leave date</label>
                        <input type="date" name="date" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="msg">Messege</label>
                        <textarea name="msg" id="" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection