@extends('layouts.artists')
@section('content')

<!-- <div class="container">
    <div class="header-container">
    
        <div class="header-holder">

        </div>
    </div>   

    <div class="content-inside">
        <div class="search-bar">
            <form action="" class=""></form>
            <div class="category">
                <div class="Videos">

                </div>
            </div>
        </div>
    </div>
</div> 
 <body> -->
	<h1 class="py-4"> MY VIDEOS</h1>
<div class="Videos-single">
    <img src="/frontend/assets/gallery8.jpg" alt="" width="100%">
    <img src="/frontend/assets/playicon.png" alt="" width="" class="play-button" onclick="playvideo('/frontend/assets/concert.mp4')">
</div>
<div class="Videos-single">
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
</div>

<div class="videos-player" id="videosplayer" >


    <video width="50%" autoplay id="myvideo">
    <source src="" type="video/mp4">
    </video>
    <div class="close-button" onclick="stopvideo()" style="color:black; transform: rotate(45deg); display: hidden;">
    
</div>

     <!-- <div class="containerdis text-center">
            <div class="row">
                <div class="col md-4">
                    <img src="/frontend/assets/gallery8.jpg" alt="" class="img-fluid" width="50%">
                    <img src="/frontend/assets/playicon.png" alt="" class="vd-playbtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                </div>
            </div>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">VIDEO DETAILS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <img src="/frontend/assets/gallery8.jpg" alt="" width="50%">
                        <img src="/frontend/assets/playicon.png" alt="" width="" class="play-button" onclick="playvideo('/frontend/assets/woman painting.mp4')"> 
                        <div class="videoplayer" id="videoplayer" >
                            <video width="50%" controls=true autoplay id="myvideo">
                            <source src="" type="video/mp4">
                            </video>
                        </div> 
                    </div>

                    <div class="testimonialcolumn">
                        <div class="user">
                            <img src="/frontend/assets/betty2.jpg">
                            <div class="userinfo">
                                <h4>BETTY<i class="fa fa-twitter"></i></h4></h4>
                                <small>@bettymy</small>
                            </div>
                        </div>	
                        <p>I had Sweet Themes create my beautiful wedding cake and I must say I was completely satisfied! Not only was it beautiful but it was also delicious! Thank you so much Sweet Themes for making my wedding that much sweeter!</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="button" class="btn btn-primary">Understood</button> 
                    </div>
                </div>
            </div>`
        
    </div>  -->


    @endsection
