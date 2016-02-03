/*
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
*/

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<script>
//maakt id "y1x1" rood wanneer muis erop is
$(document).ready(function(){
    $("div.geheugen").mouseenter(function(){
        $("td.x1y1").css("color", "red");
    });
});
//maakt id "y1x1" zwart als muis eraf is
$(document).ready(function(){
    $("div.geheugen").mouseleave(function(){
        $("td.x1y1").css("color", "black");
    });
});
</script>



