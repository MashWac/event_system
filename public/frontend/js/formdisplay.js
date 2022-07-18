
function toggle(){
    var name=document.getElementById('accounttype').value;
    if(name== 'artist'){
        document.getElementById("formartist").style.display='inline';
        document.getElementById("formattendee").style.display='none';
        document.getElementById("formorganiser").style.display='none';     
    }
    else if(name=='none'){
        document.getElementById("formartist").style.display='none';
        document.getElementById("formattendee").style.display='none';
        document.getElementById("formorganiser").style.display='none';  
    }
    else if(name=='user'){
        document.getElementById("formartist").style.display='none';
        document.getElementById("formattendee").style.display='inline';
        document.getElementById("formorganiser").style.display='none';  
    }else{
        document.getElementById("formartist").style.display='none';
        document.getElementById("formattendee").style.display='none';
        document.getElementById("formorganiser").style.display='inline'; 

    }
   
} 