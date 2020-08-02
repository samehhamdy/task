
<div class="preloader">
    <div class="preloader-loading">
        <img src="{{url('/')}}/website/images/logo-m.png" data-src="{{url('/')}}/website/images/logo-m.png" class="lazyload">
    </div>
</div>
<div class="top_nav">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <ul class="d-flex about-site">
                    <li><a href="#">Questions</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Terms Of Privacy</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <ul class="d-flex social ">
                    <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a></li>
                    <li> <a href="#"> <i class="fab fa-twitter"></i> </a></li>
                    <li> <a href="#"> <i class="fab fa-instagram"></i> </a></li>
                    <li> <a href="#"> <i class="fab fa-snapchat-ghost"></i> </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
        <a class="navbar-brand" href="index.html"><img src="{{url('/')}}/website/images/logo-m.png" data-src="{{url('/')}}/website/images/logo-m.png"
                                                       class="lazyload"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <ul class="menu-bars">
                        <li><span></span></li>
                        <li><span></span></li>
                        <li><span></span></li>
                    </ul>
                </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                @if(auth()->user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('albums.index')}}">My Albums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('albums.create')}}">New Album</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('profile')}}">Profile</a>
                    </li>
                @endif
                <li class="nav-item">
                    <button class="btn btn-gradiant">
                        @if(auth()->user())
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                <i class="fe-log-out"></i>
                                <span> Log Out</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a href="{{route('login')}}">login</a>
                        @endif
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
