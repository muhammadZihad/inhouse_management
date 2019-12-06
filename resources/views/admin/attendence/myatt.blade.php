@extends('layout.body')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Attendence
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover sortable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Date</th>
                            <th class="">Name</th>
                            <th class="text-center">Check in</th>
                            <th class="text-center">Check out</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach ($list as $item)
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
                            <td class="">{{$item->user->name}}</td>
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

                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i
                        class="pe-7s-trash btn-icon-wrapper">
                    </i></button>
                <button class="btn-wide btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>



@endsection

@section('upperjs')
<script src="{{asset('js/sort.js')}}"></script>
@endsection