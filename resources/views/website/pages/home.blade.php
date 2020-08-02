@extends('website.layouts.index')
@section('content')
    <section class="check_demo_movie">
        <div class="container">
            <h2 class=" wow fadeInDown">Check Our <span class="main-color"> Albums</span></h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book.</p>
            <div class="row">
                @include('partial.alert')
                @foreach($albums as $album)
                    <div class="col-md-4">
                        <a href="{{route('photos',$album->id)}}">
                            <div class="card wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                                <div class="card-header">
                                    @if(count($album->photos) != 0)
                                        <img src="{{$album->photos->first()->link}}" class="lazyload">
                                    @else
                                        <img src="{{url('/')}}/website/images/demo2.png" class="lazyload">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <a href="{{route('photos',$album->id)}}"><h4> {{$album->name}}</h4></a>
                                    <h6 class="main-color">{{$album->type}}</h6>
                                    @if(auth()->user() && auth()->user()->id == $album->user_id)
                                        <a href="{{route('albums.show',$album->id)}}" style="color: white" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                        <form method="post" action="{{route('albums.destroy',$album->id)}}" style="display: inline;color: white">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <a href="{{route('albums.edit',$album->id)}}" style="color: white" class="btn btn-dark"><i class="fas fa-pen"></i></a>
                                        @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{ $albums->links() }}
        </div>
    </section>
@endsection
