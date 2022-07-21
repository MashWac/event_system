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
        <div class="container" style="height: fit-content;">
        <div class="text-center uploadarea" onclick="showDiv()">
            <header>Please Upload Content below</header>
            <input type="file" id="default-btn" name="myfile" style="display:none">
                <i style="font-size:100px; padding-bottom:30px" class="fas fa-cloud-upload-alt"></i>
                <p style="font-size:40px; padding-bottom:30px">Browse file to Upload</p>
        </div>
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
<div class="bg-modal text-center" style="display:none; width:100%;" id="bbbg">
            <div class="modal-content text-center" style="background-image: linear-gradient(to bottom right,#c286ed, #ef9dd5);">
            <header class="header2" style="margin-top:5%;"><h3>Upload Content</h3></header>
                <div class="card mb-3 text-center" style="max-width: 40%; margin-top:3%; padding-bottom:8%; margin-left:30%;">
                <form action="{{url('uploadcontent')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="col-md-6" style="margin-left:30%;">
                    <label for="contenttype">Select Content Type:</label>
                      <select id="contenttype" class="form-control" name="contenttype">
                        <option value="1">Albums</option>
                        <option value="videos">Videos</option>
                      </select>
                    </div>
                    <div class="col-md-6"  style="margin-left:30%;">
                      <label for="contenttype">Select File:</label>
                      <input type='file' class="form-control" id="contentfile" name="contentfile">
                    </div>
                     <div class="col-md-12"  style="margin-top:5%;" >
                    <button type="submit" class="btn btn-dark" onclick="">Upload Content</button>
                    </div>
                </form>
                
                </div>
                <div class="close" onclick="closingdiv()">+</div>
            </div>       
        </div>


@endsection
