@extends('layouts.attendee')
@section('content')
<div class="con">
<div id="landingback" class="col">
    <div id="landtext">
        <p id="welcomemessage"> Experience Live Events Like Never Before.</p>
        <a href="{{url('events')}}">
          <button type="button" class="btn btn-dark">Find Event</button>
        </a>
    </div>
</div>

<div class="card py-1">
  <div class="card-header">
    <div class="headie">
      <h2 id="headline">Upcoming events</h2>
    </div>
  </div>
  <div class="card-body">
            <ul id="autoWidth" class="cs-hidden">
        <div class="row">
          <div class="swiper mySwiper container py-4">
              <div class="swiper-wrapper content">
              @foreach($data['events'] as $item)
                  <div class="swiper-slide card pin" style="width: 18rem;">
                    <div class="images">
                      <img src="{{asset('/assets/uploads/events/'.$item->event_flyer) }}" height="300px" width="300px" class="card-img-top" alt="Event Image">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">{{$item->event_name}}</h5>
                      <a href="#" class="btn btn-dark">View Event</a>
                    </div>
                  </div>
                  @endforeach
              </div>
            <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-pagination"></div>
          </div>
        </div>
    </div>
</div>
  </div>
  <!--artist section begins-->
    <div id="artistcall">
    <div id="calltext">
          <p id="callmessage"> Follow Your Favourite Artist.</p>
          <p id="moreinfo">Get The latest News, Info and Content directly from your favorite artist.</p>
          <a href="{{url('artists')}}">
            <button type="button" class="btn btn-dark" style="background-color:#E223E2;">See Artists</button>
          </a>
      </div>
    </div>
    <div class="card py-1">
    <div class="card-header">
      <div class="headie">
        <h2 id="headline">Featured Artists</h2>
      </div>
    </div>
        <div class="swiper mySwiper container py-4">
          <div class="swiper-wrapper content">
            @foreach($data['artists'] as $item)
              <div class="swiper-slide card" style="width: 18rem;">
                <img src="{{asset('/assets/uploads/artists/'.$item->artist_photo) }}"  height="300px" width="300px" class="card-img-top" alt="artist Image">
                <div class="card-body">
                  <h5 class="card-title">{{$item->stage_name}}</h5>
                  <a href="#" class="btn btn-dark">View Artist</a>
                </div>
              </div>
              @endforeach
          </div>
          <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>


@endsection




