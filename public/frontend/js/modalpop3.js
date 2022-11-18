$(".btnshowmodal").on("click", function () {
    document.getElementById('bgg').style.display = "flex";

    var organiser = $(this).closest(".details").find("input[id='organiser']").val();
    document.getElementById('modalorganiser').innerText = 'Event Organiser:'+' '+organiser;
    
    var eventname = $(this).closest(".details").find("input[id='eventnames']").val();
    document.getElementById('modalevent').innerText = 'Event Name:'+' '+eventname;
    
    var eventlocation = $(this).closest(".details").find("input[id='eventlocation']").val();
    document.getElementById('modalvenue').innerText ='Venue:'+' '+eventlocation;

    
    var eventtime = $(this).closest(".details").find("input[id='eventtime']").val();
    document.getElementById('modaldate').innerText ='Time:'+' '+eventtime;

    
    var eventdescription = $(this).closest(".details").find("input[id='eventdescription']").val();
    document.getElementById('modaldescription').innerText = 'Description:'+' '+eventdescription;

    var salaryrange = $(this).closest(".details").find("input[id='salaryrange']").val();
    document.getElementById('modalsalary').innerText ='Proposed pay:'+' '+ salaryrange;

    var eventflyer = $(this).closest(".details").find("input[id='eventflyer']").val();
    document.getElementById('modalimage').src =eventflyer;

    var eventorg = $(this).closest(".details").find("input[id='emailorg']").val();
    document.getElementById('modalemail').innerText ='Email:'+' '+ eventorg;

    var phone = $(this).closest(".details").find("input[id='phoneor']").val();
    document.getElementById('modalphone').innerText ='Phone:'+' '+ phone;
    
});
function closediv(){
    document.getElementById("bgg").style.display="none";
}

function editartphone(val) {
    document.getElementById('phonewartist').value= val;

}
function editartamount(val) {
    document.getElementById('withdrawartist').value= val;}
