@extends('layouts.artists')
@section('content')


<div class="hero" id="home">
  
  <div class="content">
    <h3>"Everything you can imagine is Real"</h3>
    <div class="newsletter">
      <!--<form>
        <input type="email" name="email" id="mail" placeholder="Enter your email address">
        <input type="submit" name="submit" value="Lets begin">
      </form>-->
    </div>
  </div>

</div>

  <!--Events-->
  <section class="about" id="events">
    <div class="main">
      <img src="/frontend/assets/pic2.jpg">
      <div class="about-text">
        <h2>“Creativity takes courage.”</h2>
        <p>Today’s world may be full of inspiration, but as well as discouragement and demotivation. Do you feel like you need some re-energizing and motivation? Well done! You came to the right place as this is exactly where it all starts.</p>
        <!-- <button type="button" class="button-index">Events</button> -->
      </div>
    </div>
  </section> 

<!--Gallery-->
<section id="services"> 
  <div class="titletext">
    <h1>Gallery</h1>
  </div>
  <div class="servicebox">
    <div class="singleservice">
      <img src="/frontend/assets/gallery5.jpg" height="320">
      <div class="servicedescription">
        <h3></h3>
        <hr>
        <p>“God respects me when I work, but he loves me when I sing.”</p>
      </div>
    </div>
    <div class="singleservice">
      <img src="/frontend/assets/gallery2.jpg">
      <div class="servicedescription">
        <h3></h3>
        <hr>
        <p>A little celebration never killed anyone.</p>
      </div>
    </div>
    <div class="singleservice">
      <img src="/frontend/assets/gallery1.jpg">
      <div class="servicedescription">
        <h3></h3>
        <hr>
        <p class="celebrate">Celebrate with a bang and get lost in the night.</p>
        <p></p>
      </div>
    </div>
    <div class="singleservice">
      <img src="/frontend/assets/gallery9.jpg" width="320" height="325px">
      <div class="servicedescription">
        <h3></h3>
        <hr>
        <p>"Art washes away from the soul the dust of everyday life."</p>
      </div>
    </div>
  </div>
</section>


@endsection
