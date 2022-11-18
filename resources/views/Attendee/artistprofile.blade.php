@extends('layouts.attendee')
@section('content')
<div class="con">
<div class="card">
<div class="card mb-3" style="max-width:90%;">
  <div class="row g-0">
  
    <div class="col-md-4">
      <img src="{{asset('/assets/uploads/artists/'.$data['artist']->artist_photo)}}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body text-center py-5">
      <h3 id="artcardmessage" class="card-title">Name: {{$data['artist']->stage_name}}</h3>
        <p class="card-text" id="artcardmessage">Description: I am a Kenyan {{$data['artist']->skill}}. View My content below.</p>
        <p class="card-text"><small class="text-muted">Last updated: {{$data['artist']->updated_at}}</small></p>
        <a href="{{url('followartist/'.$data['artist'])}}" class="btn btn-dark" style="background-color:#E223E2;">Follow Artist</a>
      </div>
    </div>
  
  </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="headie">
            <h2 id="headline">Albums</h2>
        </div>
    </div>
    <div class="card-body">
    <div class="swiper mySwiper container py-4">
    <div class="swiper-wrapper content">
    @foreach($data['albums'] as $item) 
    <div class="swiper-slide card" style="width: 18rem;">
      <img src="{{asset('/assets/uploads/albums/'.$item->album) }}"  height="300px" width="300px" class="card-img-top" alt="...">
    </div>
    @endforeach
    </div>
    <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
  </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="headie">
            <h2 id="headline">Videos</h2>
        </div>
    </div>
    <div class="card-body">
    <div class="swiper mySwiper container py-4">
    <div class="swiper-wrapper content">
    @foreach($data['videos'] as $item)
    <div class="swiper-slide card" style="width: 18rem;">
      <img src="{{asset('/assets/uploads/videos/'.$item->video) }}"  height="300px" width="300px" class="card-img-top" alt="...">
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
@endsection




