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
    <div class="swiper-slide card" style="width: 18rem;">
      <img src="/frontend/assets/sautisol.jpg"  height="300px" width="300px" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Sauti Sol</h5>
        <a href="#" class="btn btn-dark">View Artist</a>
      </div>
    </div>
    <div class="swiper-slide card" style="width: 18rem;">
      <img src="/frontend/assets/Mejja.jpg"  height="300px" width="300px" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Mejja</h5>
        <a href="#" class="btn btn-dark">View Artist</a>
      </div>
    </div>
    <div class="swiper-slide card" style="width: 18rem;">
      <img src="/frontend/assets/ndovunikuu.jpg"  height="300px" width="300px" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Ndovu Ni Kuu</h5>
        <a href="#" class="btn btn-dark">View Artist</a>
      </div>
    </div>
    <div class="swiper-slide card" style="width: 18rem;">
      <img src="/frontend/assets/juakali.jpg" height="300px" width="300px" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">JuaKali</h5>
        <a href="#" class="btn btn-dark">View Artist</a>
      </div>
    </div>
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
</div>
<div class="card">
    <div class="card-header">
        <div class="headie">
            <h2 id="headline">Comments</h2>
        </div>
    </div>
</div>
</div>
@endsection




