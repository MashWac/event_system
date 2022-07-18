function showorgDiv() {

    document.getElementById('bg-modal').style.display = "inline-block";
    var artist=document.getElementById('artistid').value;
    document.getElementById('artistsend').value=artist;
}
function closeorgDiv() {
    document.getElementById('bg-modal').style.display = "none";
 }