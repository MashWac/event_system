
 $(".btnshowmodal").on("click", function () {
    document.getElementById('bgg').style.display = "flex";
    
    var eventname = $(this).closest(".details").find("input[id='eventnames']").val();
    document.getElementById('modaltitle').innerText = eventname;
    
    var eventlocation = $(this).closest(".details").find("input[id='eventlocation']").val();
    var eventtime = $(this).closest(".details").find("input[id='eventtime']").val();
    document.getElementById('modallocation').innerText =eventtime+' '+eventlocation;

    
    var eventdescription = $(this).closest(".details").find("input[id='eventdescription']").val();
    document.getElementById('modaldescription').innerText = eventdescription;

    var organiser = $(this).closest(".details").find("input[id='organiser']").val();
    document.getElementById('modalorganiser').innerText = organiser;

    var eventflyer = $(this).closest(".details").find("input[id='eventflyer']").val();
    document.getElementById('modalimg').src =eventflyer;

    var eventid = $(this).closest(".details").find("input[id='eventidtag']").val();
    document.getElementById('buyticketmodal').href =eventid;


    
});
function closeDiv() {
    document.getElementById('bgg').style.display = "none";
 }
