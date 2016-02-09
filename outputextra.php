<?php
function leesBestand() {
    $regels = array();
    if (isset($_FILES['file'])) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        } elseif ($_FILES["file"]["type"] !== "text/plain") {
            echo "File must be a .txt";
        } else {
            $regels = FILE($_FILES["file"]["tmp_name"]);
        }
    }
    return $regels;
}

$regels = leesBestand();
//pre(); print_r($regels);
//include_once 'oplossen.php';
?>
<?php

//functie om een tabel te kunnen maken van een array
function build_table($array) {
    $html = '<table>';
    foreach ($array as $key => $value) {
        $html .= '<tr>';
        foreach ($value as $key2 => $value2) {
            $html .= '<td>' . $value2 . '</td>';
        }
        $html .= '</tr>';
    }
    $html .= '</table>';
    return $html;
}

//array met letters om minnetjes te veranderen
$alfabet = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p",
    "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"
);

//woordzoeker.txt in een array zetten per regel
$woordenzoeker = $regels;

//array splitsen in een woordzoeker deel en een zoekwoorden deel
$witregel = file("witregel.txt");
$witregel = $witregel[0];
$MagischWitRegelNummer = array_search($witregel, $woordenzoeker);
unset($woordenzoeker[$MagischWitRegelNummer]);
$zoekwoorden = array_slice($woordenzoeker, $MagischWitRegelNummer);
foreach ($zoekwoorden as &$zoekwoord) {
    $zoekwoord = trim($zoekwoord);
}
$woordenzoeker = array_slice($woordenzoeker, 0, $MagischWitRegelNummer);


//woordzoeker array met regels verder splitsen in een multidimensionale array met lose letters
foreach ($woordenzoeker as &$regel) {
    $regel = str_split(trim($regel));
}

//minnetjes veranderen in plusjes
foreach ($woordenzoeker as &$value3) {
    foreach ($value3 as &$value4) {
        if ($value4 == "-") {
            $value4 = $alfabet[rand(0, 25)];
        }
    }
}

//zoekwoorden ontdoen van hoofdletters zodat ze gezocht kunnen worden
//gzw = gesplitst zoekwoord
//gzwn = gesplitste zoekwoorden
$zoekwoorden = array_map('strtolower', $zoekwoorden);
$gzwn = $zoekwoorden;
foreach ($gzwn as &$gzw) {
    $gzw = str_split($gzw);
}
?>


<html>
    <head>
        <title>Woordenzoeker</title>
        <link rel="shortcut icon" href="fav.ico" type="image/x-icon" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="opmaak.css">
        <?php
        $classes = array("beeld", "browser", "edublog", "geheugen");
        $classes = $zoekwoorden;
        print "<style>";
        include_once 'opmaak.php';
        print "</style>";

        //<link href="opmaak.php" rel="stylesheet"/>
        ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
</script>

<script>

$(document).ready(function(){
    $("#zoekwoorden").mouseover(function(){
  	$(this).css("color", "blue");
  
  });
    $("#zoekwoorden").mouseout(function(){
        $(this).css("color", "black");
    });
	});
</script>

<script>

$(document).ready(function(){
  $("#zoekwoorden").click(function(){
        $(this).css("background-color","red");
   });
        });

</script>
  
    </head>
    <body>



        <div id="tabel">

            <form action="outputextra.php" method="post" enctype="multipart/form-data">
                <label for="file">Zoek een bestand:</label> <input type="file" name="file" id="file"/>
                <input type="submit" value="Submit">
            </form>

            <?php
            //de tabel laten zien
            echo build_table($woordenzoeker);
            ?>   
            <div id="zoekwoorden">
                </br>
                <?php
                //het lijstje met zoekwoorden laten zien
                sort($zoekwoorden);
                foreach ($zoekwoorden as &$zoekwoord) {
                    $ZOEKWOORD = ucfirst($zoekwoord);
                    echo "<div class=$zoekwoord>$ZOEKWOORD</div>";
                }
                ?>
            </div>
        </div>
    </body>
</html>
