@extends('layouts.landing')
@section('content')

<section id="artbackground">
        <header>
            <a href="{{url('landing')}}" class="langing-logo"><img src="/frontend/assets/house.png"  height="80px" width="80px" alt=""></a>
            <ul>
                <li><a href="{{url('landing')}}">Home</a></li>
                <li><a href="{{url('login')}}">Login</a></li>
                <li><a href="{{url('register')}}">Register</a></li>
            </ul>
        </header>  
        <div class="landing-content">
            <div class="textBox">
                <h2>Creativity<br>takes<span><br>Courage.</span></h2>
                <p>"In the mind of every artist there is a masterpiece."</p>
            </div>
           
        </div> 
        <ul class="thumbnail">
            
        </ul>

    </section>


@endsection