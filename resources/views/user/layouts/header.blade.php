<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="" style="font-size: 25px">Movie World App</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    @if(Auth::guest())
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                @else


                    <li class="nav-item">
                        <a class="nav-link" href="{{url('actor_show')}}">Cast</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('movie_show')}}">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endif
                    </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<header class="masthead" style="height:450px;background-image: url(@yield('bg-img'))">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1 style="font-size: 40px;">@yield('title')</h1>
                    <span class="subheading" style="padding-bottom: 20px">@yield('sub-heading')</span>
                </div>
            </div>
        </div>
    </div>
</header>
