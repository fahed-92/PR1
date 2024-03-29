<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top">Voting System</a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">
                        @if(Auth::check())
                            {{ auth()->user()->email }}
                        @else
login please
                        @endif

                    </a>
                </li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About US</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Help</a></li>
                @if(Auth::check())
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" >
                        @csrf
                    <li class="nav-item mx-0 mx-lg-1"><a href="{{ route('logout') }}" >Logout</a>
                        </form>
                    </li>
                @else
                    <li class="nav-item mx-0 mx-lg-1">
                        <a href="{{route('login')}}"><i class="fa fa-user"></i>Login</a>
                    </li>
                @endif
{{--                <li class="nav-item mx-0 mx-lg-1"><form method="POST" action="{{ route('logout') }}">--}}
{{--                        @csrf--}}
{{--                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('logout') }}">Logout</a>--}}
{{--                    </form>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="{{URL::asset('site/assets/img/vot6.jfif')}}" alt="..." />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">WELCOME</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">CHOSE VOTE'S PROGRAM___CHOSE CANDIDATE___VOTE</p>
    </div>
</header>
