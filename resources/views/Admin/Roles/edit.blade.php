@extends('Admin.layouts.index')
@section('body')
@section('title')
    <h4 class="page-title">Roles</h4>
@endsection
@section('link')
    <li class="breadcrumb-item"><a>Edit Role</a></li>
    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>

@endsection
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="mt-0 header-title" style="display: inline">Edit Role</h4>
            <p class="text-muted font-14 mb-3">
                edit existed roles and thier permissions attached.
            </p>
            @include('partial.alert')
            <div class="p-2">
                <form class="form-horizontal" role="form" action="{{route('roles.update',$role->id)}}" method="post">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group row">
                        <label class="col-sm-2  col-form-label" for="simpleinput">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{$role->name}}" id="simpleinput" class="form-control" placeholder="Type name" required>
                        </div>
                    </div>

                    <div class="form-group row permission" style="display: none">
                        <label class="col-sm-2  col-form-label" for="example-password">Permissions</label>
                        <div class="col-sm-10">
                            <select name="permissions[]" class="multi-select" multiple="" id="my_multi_select3" >
                                @foreach(\Spatie\Permission\Models\Permission::all() as $permission)
                                    <option value="{{$permission->name}}" @if($role->hasPermissionTo($permission->name)) selected @endif>{{$permission->name}}</option>
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

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script  type="text/javascript">
    $(document).ready(function () {
        $('.permission').fadeIn();
    });
</script>
@endsection


