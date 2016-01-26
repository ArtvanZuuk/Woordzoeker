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
$woordenzoeker = file("woordzoeker.txt");

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
//foreach ($gzwn as &$gzw) {
//}
//echo "<pre>", print_r($gzwn, true), "</pre>";
//eerste poging tot woorden zoeken
//echo "<pre>", print_r($woordenzoeker, true), "</pre>";
//echo "<pre>", print_r($gzwn, true), "</pre>";
//$overeenkomst = array();
foreach ($gzwn as &$zoekendwoord) {
    $zoekendwoord = str_split($zoekendwoord);
    foreach ($woordenzoeker as &$woordenzoekerregel) {
        $overeenkomst = array_intersect_assoc($zoekendwoord, $woordenzoekerregel);
        if ($overeenkomst == $zoekendwoord){
            echo "ja dit woord, zit er in";
            echo "<pre>", print_r($zoekendwoord, true), "</pre>";
        }
    }
}
?>


<html>
    <head>
        <title>Woordenzoeker</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="opmaak.css">
        <?php
        $classes = $zoekwoorden;
        print "<style>";
        include_once 'opmaak.php';
        print "</style>";
        ?>
        <script type="text/javascript" src="opmaak.js"></script>
    </head>
    <body>
        <div id="tabel">
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
