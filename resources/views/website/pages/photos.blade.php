@extends('website.layouts.index')
@section('content')
    <section class="check_demo_movie">
        <div class="container">
            <h2 class=" wow fadeInDown">{{$album->name}}<span class="main-color">({{$album->user->name}})</span></h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book.</p>
            @include('partial.alert')
            <div class="row">
                @foreach($album->photos as $photo)
                    <div class="col-md-4">
                        <div class="card wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="card-header">
                                <img src="{{$photo->link}}" class="lazyload">
                            </div>
                            @if(auth()->user() && auth()->user()->id == $photo->album->user_id)
                                <div class="card-body">
                                    <form method="post" action="{{route('photos.destroy',$photo->id)}}" style="display: inline;color: white">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                                @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
