@extends('layouts.artists')
@section('content')


<h1 class="py-4"> MY VIDEOS</h1>
@foreach($data['videos'] as $item)
<div class="Videos-single">
    <img src="{{asset('/assets/uploads/videos/'.$item->video) }}"  width="100%" alt='image here'>
    <img src="/frontend/assets/playicon.png" alt="" width="" class="play-button" onclick="playvideo('/frontend/assets/concert.mp4')">
</div>
@endforeach
<!-- <div class="Videos-single">
    <img src="/frontend/assets/gallery8.jpg" alt="" width="100%">
    <img src="/frontend/assets/playicon.png" alt="" width="" class="play-button" onclick="playvideo('/frontend/assets/man singing a song.mp4')"> 
</div>
<div class="Videos-single">
    <img src="/frontend/assets/gallery8.jpg" alt="" width="100%">
    <img src="/frontend/assets/playicon.png" alt="" width="" class="play-button" onclick="playvideo('/frontend/assets/woman painting.mp4')"> 
</div>
<div class="Videos-single">
    <img src="/frontend/assets/gallery8.jpg" alt="" width="100%">
    <img src="/frontend/assets/playicon.png" alt="" width="" class="play-button" onclick="playvideo('/frontend/assets/woman painting.mp4')"> 
</div>
<div class="Videos-single">
    <img src="/frontend/assets/gallery8.jpg" alt="" width="100%">
    <img src="/frontend/assets/playicon.png" alt="" width="" class="play-button" onclick="playvideo('/frontend/assets/woman painting.mp4')"> 
</div>
<div class="Videos-single">
    <img src="/frontend/assets/gallery8.jpg" alt="" width="100%">
    <img src="/frontend/assets/playicon.png" alt="" width="" class="play-button" onclick="playvideo('/frontend/assets/woman painting.mp4')"> 
</div>
<div class="Videos-single">
    <img src="/frontend/assets/gallery8.jpg" alt="" width="100%">
    <img src="/frontend/assets/playicon.png" alt="" width="" class="play-button" onclick="playvideo('/frontend/assets/woman painting.mp4')"> 
</div>
<div class="Videos-single">
    <img src="/frontend/assets/gallery8.jpg" alt="" width="100%">
    <img src="/frontend/assets/playicon.png" alt="" width="" class="play-button" onclick="playvideo('/frontend/assets/woman painting.mp4')"> 
</div>
<div class="Videos-single">
    <img src="/frontend/assets/gallery8.jpg" alt="" width="100%">
    <img src="/frontend/assets/playicon.png" alt="" width="" class="play-button" onclick="playvideo('/frontend/assets/woman painting.mp4')"> 
</div> -->

<div class="videos-player" id="videosplayer" >


    <video width="50%" autoplay id="myvideo">
    <source src="" type="video/mp4">
    </video>
    <div class="close-button" onclick="stopvideo()" style="color:black; transform: rotate(45deg); display: hidden;">
    
</div>

    @endsection
