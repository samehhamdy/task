@extends('Admin.layouts.index')
@section('body')
@section('title')
    <h4 class="page-title">Users</h4>
@endsection
@section('link')
    <li class="breadcrumb-item"><a>New User</a></li>
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>

@endsection
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="mt-0 header-title" style="display: inline">Add New User</h4>
            <p class="text-muted font-14 mb-3">
                this is form to create new user and attach permissions to this user.
            </p>
            @include('partial.alert')
            <div class="p-2">
                <form class="form-horizontal" role="form" action="{{route('users.store')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2  col-form-label" for="simpleinput">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="simpleinput" class="form-control" placeholder="Type name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2  col-form-label" for="example-email">Email</label>
                        <div class="col-sm-10">
                            <input type="email" id="example-email" name="email" class="form-control" placeholder="Type email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2  col-form-label" for="example-password">Password</label>
                        <div class="col-sm-10">
                            <input type="password"  class="form-control" name="password" placeholder="Type password" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2  col-form-label" for="example-password">Password Confirmation</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2  col-form-label" for="example-password">Role</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" id="mySelectBox" name="role">
                                <option></option>
                                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group text-right mb-0">
                        <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- end row -->

@endsection


