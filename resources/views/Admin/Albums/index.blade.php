@extends('Admin.layouts.index')
@section('body')
@section('title')
    <h4 class="page-title">Albums</h4>
@endsection
@section('link')
    <li class="breadcrumb-item"><a> Albums</a></li>
@endsection
@include('partial.alert')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">

            <h4 class="mt-0 header-title" style="display: inline">albums table</h4>
            <a href="{{route('albums.create')}}" class="btn btn-primary" style="float: right" >New Album</a>
            <p class="text-muted font-14 mb-3">
                this is albums table to create,view and destroy albums.
            </p>
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>User</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($albums as $album)
                    <tr>
                        <td>{{$album->id}}</td>
                        <td>{{$album->name}}</td>
                        <td>{{$album->type}}</td>
                        <td>{{$album->user->name}}</td>
                        <td>
                            @can('delete album')
                                <form method="post" action="{{route('albums.destroy',$album->id)}}" style="display: inline;color: white">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="ti-trash"></i></button>
                                </form>
                            @endcan
                            @if($album->type == 'public' || ($album->type == 'private' && $album->user_id == auth()->user()->id))
                                <a class="btn btn-dark" href="{{route('albums.show',$album->id)}}"><i class="ti-eye"></i>
                                @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
@endsection
