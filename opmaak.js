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
<<<<<<< HEAD
//src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
//<script>
=======

src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
//maakt id "y1x1" rood wanneer muis erop is
>>>>>>> fffa926bc6940762f646a4eeced6eed676249e77
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
//</script>
//dit is html>
/*
<div id="bal" <p>Doe je muis hierop</p></div>
<div id="y1x1"
<p>dit wordt rood</p>
</div>
*/


