@extends('website.layouts.index')
@section('content')
    <section class="contact-us bg-light">
        <div class="container">
            <h3 class="text-center">Update Your Profile</h3>

            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-10">
                    <div class="contact-form">

                        <form action="{{route('update')}}" method="post">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group ">
                                <label for="inputName">Write Your Name</label>
                                <input type="text" id="inputName" class="form-control"
                                       placeholder="Write Your Name" name="name" value="{{$user->name}}">
                                @error('name')
                                <strong style="color: red;padding-left: 12px">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Your Email Addrss</label>
                                <input type="email" id="inputEmail" class="form-control"
                                       placeholder="Write Your Email" name="email" value="{{$user->email}}">
                                @error('email')
                                <strong style="color: red;padding-left: 12px">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Enter Password </label>
                                <input type="password" id="inputPassword" class="form-control" placeholder=" Write Your password" name="password">
                                @error('password')
                                <strong style="color: red;padding-left: 12px">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputConfirmPassword">Confirm Password </label>
                                <input type="password" id="inputConfirmPassword" class="form-control" placeholder="  Confirm Your password" name="password_confirmation">
                            </div>

                            <div class="text-center p-2">
                                <button type="submit" class="btn btn-gradiant">
                                    <a>Update</a>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
