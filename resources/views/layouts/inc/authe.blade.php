<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
            <a class="navbar-brand" href="{{url('attendee')}}">
            <img src="/frontend/assets/house.png" alt="logo" height="80px" width="80px">
            </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Middle Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('landing')}}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('login')}}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('register')}}">{{ __('Register') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>