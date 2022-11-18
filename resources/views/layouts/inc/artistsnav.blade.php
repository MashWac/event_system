<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{url('artisthome')}}">
        <img src="/frontend/assets/house.png" alt="logo" height="80px" width="80px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="{{url('artisthome')}}">Home</a>
        <a class="nav-link" href="{{url('contenthome')}}">My content</a>
        <a class="nav-link" href="{{url('eventbookings')}}">Event Bookings</a>
        <a class="nav-link" href="{{url('contentfeedback')}}">Content feedback</a>
      </div>
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
                            <a class="dropdown-item" href="{{url('myartistpage')}}">
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