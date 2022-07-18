@extends('layouts.artists')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
</head>

<body>
<!--upload content-->
<section class="py-2">
    <header class="header"><h3>UPLOAD CONTENT</h3></header>
    <div class="outside-container">
        <div class="container">
            <header>Please Upload Content below</header>
            <form action="#">
              <label>
                <input type="file" id="default-btn" name="myfile" style="display:none">
                <i class="fas fa-cloud-upload-alt"></i>
                <p>Browse file to Upload</p>
              </label>
             </form>
        </div>
    </div>
</section>
<script>

const defaultBtn = document.querySelector('#default-')

  //selecting all required elements
  const dropArea = document.querySelector("");
//if user Drags file over drag area
  dropArea.addEventListener("dragover",()=>){
    console.log("File is over DragArea");
    dropArea.classlist.add("");
  }

  //if user leaves dragged file from drag area
  dropArea.addEventListener("dragleave",()=>){
    console.log("File is outside from DragArea");
  }
</script>

<!--previously upload content-->

<!-- <section class="py-3">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="/frontend/assets/gallery4.jpg" class="d-block w-100" alt="..." >
      <div class="carousel-caption d-none d-md-block">
        <h5>Dance</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="..." class="d-block w-100" alt="..." onclick="playvideo('frontend/assets/man singing a song.mp4')">
      <div class="carousel-caption d-none d-md-block">
        <h5>Singing</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="" class="d-block w-100" alt="..." onclick="playvideo('concert.mp4')">
      <div class="carousel-caption d-none d-md-block">
        <h5>Concert </h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section> -->

<section class="py-4">
  <header class="header2"><h3>PREVIOUSLY UPLOADED CONTENT</h3></header>
  <div class="video-featurewrap">
    <div class="video-wrap">
      <br>
      <div class="video-container">
        <div class="Video-single-container">
          <div class="Video-single">
          <img src="/frontend/assets/gallery1.jpg" alt="" width="100%">
          <img src="/frontend/assets/playicon.png" alt="" width="" class="play-button" onclick="playvideo('/frontend/assets/concert.mp4')">
          
          </div>
          <div class="Video-single">
          <img src="/frontend/assets/gallery5.jpg" alt="" width="100%">
          <img src="/frontend/assets/playicon.png" alt="" width="" class="play-button" onclick="playvideo('/frontend/assets/man singing a song.mp4')"> 
          </div>
          <div class="Video-single">
          <img src="/frontend/assets/gallery9.jpg" alt="" width="100%">
          <img src="/frontend/assets/playicon.png" alt="" width="" class="play-button" onclick="playvideo('/frontend/assets/woman painting.mp4')"> 
          </div>
        </div> 
      </div>
    </div>
    <a href="videodisplay"><button class="button-video">See more ...</button></a>
  </div>
</section>

<div class="video-player" id="videoplayer" >
  <video width="50%" autoplay id="myvideo">
  <source src="" type="video/mp4">
  </video>
  <div class="close-button" onclick="stopvideo()" style="color:white; transform: rotate(45deg); display: hidden;">
  <!-- <img src="/frontend/assets/cancel.png" height="25px" width="25px"> -->
  +
  </div>
</div> 



   
    

<!--Albums -->

<section class="py-4">
  <header class="header2"><h3>ALBUMS</h3></header>
  <div class="album-featurewrap">
    <div class="album-wrap">
      <br>
      <div class="album-container">
        <div class="album-single-container">
          <div class="album-single">
          <img src="/frontend/assets/album2.jpg" alt="" width="100%">
          </div>
          <div class="Video-single">
          <img src="/frontend/assets/album3.jpg" alt="" width="100%">
          </div>
          <div class="Video-single">
          <img src="/frontend/assets/album4.webp" alt="" width="100%">
          </div>
        </div> 
      </div>
    </div>
    <a href="albumsdisplay"><button class="button-video">See more ...</button></a>
  </div>
</section>


@endsection
