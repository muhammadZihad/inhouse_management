@extends('layout.body')

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">
                    @if (Route::is('dep.index'))
                    Add New Department
                    @else
                    Add New Designation
                    @endif
                </h5>
                <form class="" method="POST"
                    action="{{Route::is('dep.index') ? route('dep.store') : route('des.store')}}">
                    @csrf
                    <div class="position-relative form-group"><label for="exampleEmail" class="">Name</label><input
                            name="name" id="exampleEmail" @if (Route::is('dep.index')) placeholder="Department name"
                            @else placeholder="Designation name" @endif type="text" class="form-control"></div>
                    <button type="submit" class="mt-1 btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="main-card mb-3 card">
            <div class="card-header">
                @if (Route::is('dep.index'))
                Department List
                @else
                Designation List
                @endif
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover sortable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>No. Employee</th>
                            <th class="">Actions</th>
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
                                        <div class="widget-content-left mr-3">
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{$item->name}}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="">{{$item->users->count()}}</td>
                            <td class="">
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal"
                                    onclick="handleDelete({{$item->id}})">Edit</button>
                                <form style="display: inline"
                                    action="{{Route::is('dep.index') ? route('dep.destroy',$item->id) : route('des.destroy',$item->id)}}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="PopoverCustomT-1"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
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

@section('bottom')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit
                    {{Route::is('dep.index') ? 'Department' : 'Designation'}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" id="modalForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="position-relative form-group"><label for="exampleEmail" class="">Name</label><input
                            name="name" id="exampleEmail" @if (Route::is('dep.index')) placeholder="Department name"
                            @else placeholder="Designation name" @endif type="text" class="form-control"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function handleDelete(id){
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        var form = document.querySelector("#modalForm");
        form.action = baseUrl+'/'+id;
    }

</script>
@endsection