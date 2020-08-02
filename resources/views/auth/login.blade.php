@extends('website.layouts.index')
@section('content')
    <section class="contact-us bg-light">
        <div class="container">
            <h3 class="text-center">Login To Join Us</h3>

            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-10">
                    <div class="contact-form">
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="inputEmail">Your Email Addrss</label>
                                <input required type="email" id="inputEmail" class="form-control"
                                       placeholder="Write Your Email" name="email">
                                @error('email')
                                    <strong style="color: red;padding-left: 12px">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Your Password </label>
                                <input required name="password" type="password" id="inputPassword" class="form-control" placeholder=" Write Your password">
                                @error('password')
                                    <strong style="color: red;padding-left: 12px">{{ $message }}</strong>
                                @enderror
                            </div>


                            <div class="text-center p-2">
                                <button type="submit" class="btn btn-gradiant">
                                    <a>login</a>
                                </button>
                            </div>

                            <div >
                                <b> <span>Don't Have An Account ?</span> <a href="{{route('register')}}" class="main-color ">Sign Up</a></b>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
