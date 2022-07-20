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
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('attendee')}}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('events')}}">{{ __('Events') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('artists')}}">{{ __('Artists') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('refunds')}}">{{ __('Refunds') }}</a>
                </li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <?php if(session('logged')):?>
                <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <ion-icon size="large" name="contact"></ion-icon>
                            {{ session('name') }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profile/{{session('user_id')}}">
                                {{ __('View Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{url('logout')}}">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                    <?php endif;?>
            </ul>
        </div>
    </div>
</nav>