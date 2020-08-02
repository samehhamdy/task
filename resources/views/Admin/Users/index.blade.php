@extends('Admin.layouts.index')
@section('body')
    @section('title')
        <h4 class="page-title">Users</h4>
    @endsection
@section('link')
    <li class="breadcrumb-item"><a> Users</a></li>
@endsection
@include('partial.alert')
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">

                <h4 class="mt-0 header-title" style="display: inline">crud users table</h4>
                @can('create user')
                <a href="{{route('users.create')}}" class="btn btn-primary" style="float: right" >New User</a>
                @endcan
                <p class="text-muted font-14 mb-3">
                    this is table to do all crud actions on users model create,edit and delete.
                </p>
                <table id="datatable" class="table table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @can('edit user')
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-dark"><i class="ti-pencil"></i></a>
                                @endcan
                                @can('delete user')
                                    <form method="post" action="{{route('users.destroy',$user->id)}}" style="display: inline;color: white">
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
