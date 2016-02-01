$(document).ready(function(){
    $(".podcast").click(function(){$(".podcast").hide();});
});


foreach ($gevondenWoordenCoordinaten as $gevondenwoord){
    foreach ($gevondenwoord as $cordinaat){
        $(document).ready(function(){
            $("td.$cordinaat").addClass($gevondenwoord)
        });
    }
}



