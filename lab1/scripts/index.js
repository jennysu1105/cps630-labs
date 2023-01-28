//Mony Thach 500695151
//Jenny Su 500962385



//
$(document).ready(function(){
    //fade functions for devices
    $("#galaxys7In").click(function(){
        $("#phoneImg").fadeIn();
    });
    $("#galaxys7Out").click(function(){
        $("#phoneImg").fadeOut();
    });
    $("#surfaceIn").click(function(){
        $("#compImg").fadeIn();
    });
    $("#surfaceOut").click(function(){
        $("#compImg").fadeOut();
    });
    $("#macbookIn").click(function(){
        $("#noteImg").fadeIn();
    });
    $("#macbookOut").click(function(){
        $("#noteImg").fadeOut();
    });
    //fade function for info
    $("#infoIn").click(function(){
        $(".information").fadeIn();
    });
    $("#infoOut").click(function(){
        $(".information").fadeOut();
    });
    //animation function to toggle height to 0
    $(".animate button").click(function(){
        $(".images img").animate(
            {
            height: 'toggle'
            }
        );
    });
});
