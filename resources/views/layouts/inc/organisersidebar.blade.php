<div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
           <?php echo 'Welcome<br>'.session('name')?>
          </a>
        </div>
        <ul class="nav">
          <li class="navorg {{ \Illuminate\Support\Facades\Request::is('organisers') ? 'active' : ''}}">
            <a href="{{url('organisers')}}" style="display: inline-block;">
              <span class="navlin">
                <ion-icon class="sidemenicons" name="home"></ion-icon>
                <p class="linknav">Home</p> 
              <span>
            </a>
          </li>
          <li class="navorg {{ \Illuminate\Support\Facades\Request::is('createevent') ? 'active' : ''}}">
            <a href="{{url('createevent')}}">
            <span class="navlin">
            <ion-icon class="sidemenicons" name="paper"></ion-icon>
            <p class="linknav">Create Event</p> 
            <span>
            </a>
          </li>
          <li class="navorg {{ \Illuminate\Support\Facades\Request::is('activeevents') ? 'active' : ''}}">
            <a href="{{url('activeevents')}}">
            <span class="navlin">
              <ion-icon class="sidemenicons" name="star"></ion-icon>
              <p class="linknav">Active Events</p> 
            <span>
            </a>
          </li>
          <li class="navorg {{ \Illuminate\Support\Facades\Request::is('previousevents') ? 'active' : ''}}">
            <a href="{{url('previousevents')}}">
              <span class="navlin">
                <ion-icon class="sidemenicons" name="filing"></ion-icon>
                <p class="linknav">Previous Events</p> 
              <span>
            </a>
          </li>
          <li class="navorg {{ \Illuminate\Support\Facades\Request::is('findartists') ? 'active' : ''}}">
            <a href="{{url('findartists')}}">
              <span class="navlin">
              <ion-icon class="sidemenicons" name="compass"></ion-icon>
              <p class="linknav">Find Artists</p> 
              <span>
            </a>
          </li>
          
          <li class="navorg {{ \Illuminate\Support\Facades\Request::is('acceptedrequests') ? 'active' : ''}}">
            <a href="{{url('acceptedrequests')}}">
            <span class="navlin">
            <ion-icon class="sidemenicons" name="happy"></ion-icon>
            <p class="linknav">Accepted Requests</p> 
            <span>
            </a>
          </li>

          <li class="navorg {{ \Illuminate\Support\Facades\Request::is('deniedrequests') ? 'active' : ''}}">
            <a href="{{url('deniedrequests')}}">
              <span class="navlin">
                <ion-icon class="sidemenicons" name="close-circle"></ion-icon>
                <p class="linknav">Denied Requests</p> 
              <span>
            </a>
          </li>
        </ul>
      </div>
    </div>