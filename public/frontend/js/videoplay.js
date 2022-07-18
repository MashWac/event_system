var videoplayer = document.getElementById("videoplayer");
var myvideo = document.getElementById("myvideo");

function stopvideo(){
    videoplayer.style.display="none";
}

function playvideo(file){
    myvideo.src = file;
    videoplayer.style.display="inline";
}

function videoUrl(file){
    document.getElementById("slider").src=file;
}