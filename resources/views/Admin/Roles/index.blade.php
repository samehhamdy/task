@extends('Admin.layouts.index')
@section('body')
@section('title')
    <h4 class="page-title">Roles</h4>
@endsection
@section('link')
    <li class="breadcrumb-item"><a> Roles</a></li>
@endsection
@include('partial.alert')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">

            <h4 class="mt-0 header-title" style="display: inline">crud roles table</h4>
            @can('edit user')
                <a href="{{route('roles.create')}}" class="btn btn-primary" style="float: right" >New Role</a>
            @endcan
            <p class="text-muted font-14 mb-3">
                this is table to do all crud actions on roles model create,edit and delete.
            </p>
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            @can('edit user')
                                <a href="{{route('roles.edit',$role->id)}}" class="btn btn-dark"><i class="ti-pencil"></i></a>
                            @endcan
                            @can('delete user')
                                <form method="post" action="{{route('roles.destroy',$role->id)}}" style="display: inline;color: white">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="ti-trash"></i></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
@endsection
