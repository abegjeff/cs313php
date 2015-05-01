$(document).ready(function(){
    $("#description").hide();
});

$(document).ready(function(){
    $("#about").click(function(){
        $("#description").slideToggle("slow");
    });
});

