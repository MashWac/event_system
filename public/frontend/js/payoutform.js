$(".payoutform").on("click", function () {
    document.getElementById('bbg').style.display = "flex";
    
    var eventname = $(this).closest(".paytoform").find("input[id='evname']").val();
    document.getElementById('eventyname').value= eventname;
    
    var artistname = $(this).closest(".paytoform").find("input[id='artname']").val();
    document.getElementById('artist_name').value=artistname;


    var eventId = $(this).closest(".paytoform").find("input[id='evid']").val();
    document.getElementById('event_id').value=eventId;

    var artistId = $(this).closest(".paytoform").find("input[id='artid']").val();
    document.getElementById('artist_id').value= artistId;

    var organiserId = $(this).closest(".paytoform").find("input[id='orgid']").val();
    document.getElementById('organiserid').value= organiserId;

    var payit = $(this).closest(".paytoform").find("input[id='ammyu']").val();
    document.getElementById('paytoartist').value= payit;




    
});
function closureDiv() {
    document.getElementById('bbg').style.display = "none";
 }
function showmpesabox(){
    payist=document.getElementById('paylist').val();
    if(payist==1){
        document.getElementById('mpesaview').style.display = "inline";
    }else{
        document.getElementById('mpesaview').style.display = "none";
    }

}
function editorgphone(val) {
    document.getElementById('phonedorganiser').value= val;
    document.getElementById('phoneworganiser').value= val;

}
function editorgamount(val) {
    document.getElementById('depositorganiser').value= val;
    document.getElementById('withdraworganiser').value= val;}

