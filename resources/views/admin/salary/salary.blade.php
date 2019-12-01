@extends('layout.body')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header"> @if (Route::is('salary.index'))
                All Salary Records
                @else
                My Salary Records
                @endif
                <div class="btn-actions-pane-right">
                    {{-- <a href="{{route('schedule.add')}}" class="btn btn-success">+Add Schedule</a> --}}
                    <div role="group" class="btn-group-sm btn-group">
                        <a href="{{route('salary.pusher',auth()->user()->id)}}" class="active btn btn-info">Push Current
                            Salary</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover sortable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            @if (Route::is('salary.index'))
                            <th>Name</th>
                            <th>Designation</th>
                            <th class="">Month</th>
                            <th class="">Status</th>
                            <th class="">Actions</th>
                            @else
                            <th class="">Month</th>
                            <th class="">Amount</th>
                            <th class="">Status</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach ($sals as $sal)
                        <tr>
                            <td class="text-center text-muted">#{{$i++}}</td>
                            @if (Route::is('salary.index'))
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-content-left">
                                                {{-- <img width="40" class="rounded-circle"
                                                        src="{{Gravatar::get($sal->email)}}" alt=""> --}}
                                            </div>
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{$sal->user->name}}</div>
                                            <div class="widget-subheading opacity-7">{{$sal->user->email}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="">{{$sal->user->designation->name}}</td>
                            @endif
                            <td class="">{{$sal->month->name}}</td>

                            @if (Route::is('salary.index_my'))
                            <td class="">{{$sal->amount->amount}}</td>
                            @endif
                            <td class="">
                                <div @if ($sal->status=="Pending")
                                    class="badge badge-warning"
                                    @elseif ($sal->status=="Due")
                                    class="badge badge-danger"
                                    @else
                                    class="badge badge-success"
                                    @endif >{{$sal->status}}</div>
                            </td>
                            @if (Route::is('salary.index'))
                            <td class="">
                                <a href="{{route('salary.edit',$sal->id)}}" type="button" id="PopoverCustomT-1"
                                    class="btn btn-primary btn-sm">Pay</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">
            </div>
        </div>
    </div>
</div>



@endsection

@section('upperjs')
<script src="{{asset('js/sort.js')}}"></script>
@endsection