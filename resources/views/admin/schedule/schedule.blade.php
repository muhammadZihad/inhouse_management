@extends('layout.body')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Schedules
                <div class="btn-actions-pane-right">
                    <a href="{{route('schedule.add')}}" class="btn btn-success">+Add Schedule</a>
                    <div role="group" class="btn-group-sm btn-group">
                        <button class="active btn btn-focus">Sort By</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover sortable">
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
                        <tr>
                            <td class="text-center text-muted">ID</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            {{-- <div class="widget-content-left">
                                                <img width="40" class="rounded-circle"
                                                    src="{{Gravatar::get($item->email)}}" alt="">
                                        </div> --}}
                                    </div>
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading">This is a title</div>
                                        <div class="widget-subheading opacity-7">Short Description
                                        </div>
                                    </div>
                                </div>
            </div>
            </td>
            <td class="text-center">Details</td>
            <td class="text-center">
                <div class="badge badge-warning">Pending</div>
            </td>
            <td class="text-center">
                <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Action</button>
            </td>
            </tr>
            </tbody>
            </table>
        </div>
        <div class="d-block text-center card-footer">
            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper">
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