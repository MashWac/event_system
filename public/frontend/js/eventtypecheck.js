$(function(){
    $("#earlycheck").click(function(event){
        var x=$(this).is(':checked');
        if(x==true){
            document.getElementById('early').style.display = "inline";

        }
        else{
            document.getElementById('early').style.display = "none";
        }
    })
});
$(function(){
    $("#advancedcheck").click(function(event){
        var x=$(this).is(':checked');
        if(x==true){
            document.getElementById('advanced').style.display = "inline";

        }
        else{
            document.getElementById('advanced').style.display = "none";
        }
    })
});
$(function(){
    $("#vipcheck").click(function(event){
        var x=$(this).is(':checked');
        if(x==true){
            document.getElementById('vip').style.display = "inline";

        }
        else{
            document.getElementById('vip').style.display = "none";
        }
    })
});
$(function(){
    $("#flashcheck").click(function(event){
        var x=$(this).is(':checked');
        if(x==true){
            document.getElementById('flash').style.display = "inline";

        }
        else{
            document.getElementById('flash').style.display = "none";
        }
    })
});