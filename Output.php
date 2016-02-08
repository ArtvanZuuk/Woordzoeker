<?php

//functie om een tabel te kunnen maken van een array
function build_table($array) {
    $html = '<table>';
    $xcordinaat = "0";
    $ycordinaat = "0";
    foreach ($array as $key => $value) {
        $html .= '<tr>';
        foreach ($value as $key2 => $value2) {
            $cordinaat = "x" . $xcordinaat . "y" . $ycordinaat;
            $html .= "<td class='$cordinaat'>" . $value2 . '</td>';
            $xcordinaat = $xcordinaat + 1;
        }
        $html .= '</tr>';
        $ycordinaat = $ycordinaat + 1;
        $xcordinaat = "0";
    }
    $html .= '</table>';
    return $html;
}

//array met letters om minnetjes te veranderen
$alfabet = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p",
    "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"
);
//woordzoeker.txt in een array zetten per regel
//$woordenzoeker = file("woordzoeker_1.txt");
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

//minnetjes veranderen in letters
foreach ($woordenzoeker as &$value3) {
    foreach ($value3 as &$value4) {
        if ($value4 == "-") {
            $value4 = $alfabet[rand(0, 25)];
        }
    }
}

//letters in een regel tellen
$horizontaleletters = count($woordenzoeker[0]);

//zoekwoorden ontdoen van hoofdletters zodat ze gezocht kunnen worden
//gzw = gesplitst zoekwoord
//gesplitst = gesplitste zoekwoorden
$zoekwoorden = array_map('strtolower', $zoekwoorden);
$gesplitst = $zoekwoorden;
foreach ($gesplitst as &$gzw) {
    $gzw = str_split($gzw);
}

//woorden zoeken Horizontaal
    $horizontaleletters = count($woordenzoeker[0]);
    foreach ($gesplitst as $woordIndex => $zoekendwoord) {
        $regelnummer = 0;
        foreach ($woordenzoeker as $woordenzoekerregel) {
            $regelnummer++;
            $hetWoord = implode('', $zoekendwoord);
            $aantalkeer = $horizontaleletters - count($zoekendwoord) + 1;
            $cordinaat[$hetWoord] = array();
            for ($j = 0; $j < $aantalkeer; $j++) {
//Van links naar rechts zoeken
                $check = 0;
                for ($i = 0; $i < count($zoekendwoord); $i++) {
                    if ($zoekendwoord[$i] == $woordenzoekerregel[$i + $j]) {
                        $check++;
                        $x = $i + $j;
                        $y = $regelnummer - 1;
                        $c = "x" . $x . "y" . $y;
                        array_push($cordinaat[$hetWoord], $c);
                    }
                }
                if ($check == count($zoekendwoord)) {
                    $gevondenWoordenCoordinaten[$hetWoord] = $cordinaat[$hetWoord];
                    $gevondenWoordenCoordinaten[$hetWoord] = array_slice($gevondenWoordenCoordinaten[$hetWoord], count($gevondenWoordenCoordinaten[$hetWoord]) - count($zoekendwoord));
                }
                if ($check <> count($zoekendwoord)) {
                    for ($a = 0; $a <= count($zoekendwoord); $a++) {
                        unset($cordinaat[$hetWoord][$a]);
                    }
                }
//van rechts naar links zoeken
                $check = 0;
                for ($i = 0; $i < count($zoekendwoord); $i++) {
                    if ($zoekendwoord[$i] == $woordenzoekerregel[$horizontaleletters - $i - $j - 1]) {
                        $check++;
                        $x = $horizontaleletters - $i - $j - 1;
                        $y = $regelnummer - 1;
                        $c = "x" . $x . "y" . $y;
                        array_push($cordinaat[$hetWoord], $c);
                    }
                }
                if ($check == count($zoekendwoord)) {
                    $gevondenWoordenCoordinaten[$hetWoord] = $cordinaat[$hetWoord];
                    $gevondenWoordenCoordinaten[$hetWoord] = array_slice($gevondenWoordenCoordinaten[$hetWoord], count($gevondenWoordenCoordinaten[$hetWoord]) - count($zoekendwoord));
                }
                if ($check <> count($zoekendwoord)) {
                    for ($a = 0; $a < count($zoekendwoord); $a++) {
                        unset($cordinaat[$hetWoord][$a]);
                    }
                }
            }
        }
    }

//woorden zoeken van boven naar beneden
$verticaleletters = count($woordenzoeker);
foreach ($gesplitst as $woordIndex => $zoekendwoord) {
    $hetWoord = implode('', $zoekendwoord);
    $aantalkeer = $verticaleletters - count($zoekendwoord) + 1;
    $cordinaat[$hetWoord] = array();
    for ($r = 0; $r < $horizontaleletters; $r++) {
        for ($j = 0; $j < $aantalkeer; $j++) {
            $check = 0;
            for ($i = 0; $i < count($zoekendwoord); $i++) {
                if ($zoekendwoord[$i] == $woordenzoeker[$i + $j][$r]) {
                    $check = $check + 1;
                    $x = $r;
                    $y = $i + $j;
                    $c = "x" . $x . "y" . $y;
                    array_push($cordinaat[$hetWoord], $c);
                }
            }
            if ($check == count($zoekendwoord)) {
                $gevondenWoordenCoordinaten[$hetWoord] = $cordinaat[$hetWoord];
                $gevondenWoordenCoordinaten[$hetWoord] = array_slice($gevondenWoordenCoordinaten[$hetWoord], count($gevondenWoordenCoordinaten[$hetWoord]) - count($zoekendwoord));
            }
            if ($check <> count($zoekendwoord)) {
                for ($a = 0; $a < count($zoekendwoord); $a++) {
                    unset($cordinaat[$hetWoord][$a]);
                }
            }
            $check = 0;
            for ($i = 0; $i < count($zoekendwoord); $i++) {
                if ($zoekendwoord[$i] == $woordenzoeker[$verticaleletters - $i - $j - 1][$r]) {
                    $check = $check + 1;
                    $x = $r;
                    $y = $verticaleletters - $i - $j - 1;
                    $c = "x" . $x . "y" . $y;
                    array_push($cordinaat[$hetWoord], $c);
                }
            }
            if ($check == count($zoekendwoord)) {
                $gevondenWoordenCoordinaten[$hetWoord] = $cordinaat[$hetWoord];
                $gevondenWoordenCoordinaten[$hetWoord] = array_slice($gevondenWoordenCoordinaten[$hetWoord], count($gevondenWoordenCoordinaten[$hetWoord]) - count($zoekendwoord));
            }
            if ($check <> count($zoekendwoord)) {
                for ($a = 0; $a < count($zoekendwoord); $a++) {
                    unset($cordinaat[$hetWoord][$a]);
                }
            }
        }
    }
}

//eerste diagonaal, van links boven naar rechts onder
//i is letter nummer
//k is aantal vakjes naar rechts
//r is aantal vakjes naar beneden
foreach ($gesplitst as $woordIndex => $zoekendwoord) {
    $hetWoord = implode('', $zoekendwoord);
    $cordinaat[$hetWoord] = array();
    $verticaleletters = count($woordenzoeker);
    $horizontaleletters = count($woordenzoeker[0]);
    $schuineletters = min($horizontaleletters, $verticaleletters);
    $aantalr = $verticaleletters - count($zoekendwoord);
    $aantalk = $horizontaleletters - count($zoekendwoord);
    for ($r = 0; $r <= $aantalr; $r++) {
        for ($k = 0; $k <= $aantalk; $k++) {
            $check = 0;
            for ($i = 0; $i < count($zoekendwoord); $i++) {
                if ($zoekendwoord[$i] == $woordenzoeker[$i + $r][$i + $k]) {
                    $check = $check + 1;
                    $x = $k + $i;
                    $y = $r + $i;
                    $c = "x" . $x . "y" . $y;
                    array_push($cordinaat[$hetWoord], $c);
                }
            }
            if ($check == count($zoekendwoord)) {
                $gevondenWoordenCoordinaten[$hetWoord] = $cordinaat[$hetWoord];
                $gevondenWoordenCoordinaten[$hetWoord] = array_slice($gevondenWoordenCoordinaten[$hetWoord], count($gevondenWoordenCoordinaten[$hetWoord]) - count($zoekendwoord));
            }
            if ($check <> count($zoekendwoord)) {
                for ($a = 0; $a < count($zoekendwoord); $a++) {
                    unset($cordinaat[$hetWoord][$a]);
                }
            }
            $check = 0;
            for ($i = 0; $i < count($zoekendwoord); $i++) {
                if ($zoekendwoord[$i] == $woordenzoeker[$schuineletters - $i - $r - 1][$schuineletters - $i - $k - 1]) {
                    $check = $check + 1;
                    $x = $schuineletters - $i - $k - 1;
                    $y = $schuineletters - $i - $r - 1;
                    $c = "x" . $x . "y" . $y;
                    array_push($cordinaat[$hetWoord], $c);
                }
            }
            if ($check == count($zoekendwoord)) {
                $gevondenWoordenCoordinaten[$hetWoord] = $cordinaat[$hetWoord];
                $gevondenWoordenCoordinaten[$hetWoord] = array_slice($gevondenWoordenCoordinaten[$hetWoord], count($gevondenWoordenCoordinaten[$hetWoord]) - count($zoekendwoord));
            }
            if ($check <> count($zoekendwoord)) {
                for ($a = 0; $a < count($zoekendwoord); $a++) {
                    unset($cordinaat[$hetWoord][$a]);
                }
            }
            $check = 0;
            for ($i = 0; $i < count($zoekendwoord); $i++) {
                if ($zoekendwoord[$i] == $woordenzoeker[$i + $r][$schuineletters - $i - $k - 1]) {
                    $check = $check + 1;
                    $x = $schuineletters - $i - $k - 1;
                    $y = $i + $r;
                    $c = "x" . $x . "y" . $y;
                    array_push($cordinaat[$hetWoord], $c);
                }
            }
            if ($check == count($zoekendwoord)) {
                $gevondenWoordenCoordinaten[$hetWoord] = $cordinaat[$hetWoord];
                $gevondenWoordenCoordinaten[$hetWoord] = array_slice($gevondenWoordenCoordinaten[$hetWoord], count($gevondenWoordenCoordinaten[$hetWoord]) - count($zoekendwoord));
            }
            if ($check <> count($zoekendwoord)) {
                for ($a = 0; $a < count($zoekendwoord); $a++) {
                    unset($cordinaat[$hetWoord][$a]);
                }
            }
            $check = 0;
            for ($i = 0; $i < count($zoekendwoord); $i++) {
                if ($zoekendwoord[$i] == $woordenzoeker[$schuineletters - $i - $r - 1][$i + $k]) {
                    $check = $check + 1;
                    $x = $i + $k;
                    $y = $schuineletters - $i - $r - 1;
                    $c = "x" . $x . "y" . $y;
                    array_push($cordinaat[$hetWoord], $c);
                }
            }
            if ($check == count($zoekendwoord)) {
                $gevondenWoordenCoordinaten[$hetWoord] = $cordinaat[$hetWoord];
                $gevondenWoordenCoordinaten[$hetWoord] = array_slice($gevondenWoordenCoordinaten[$hetWoord], count($gevondenWoordenCoordinaten[$hetWoord]) - count($zoekendwoord));
            }
            if ($check <> count($zoekendwoord)) {
                for ($a = 0; $a < count($zoekendwoord); $a++) {
                    unset($cordinaat[$hetWoord][$a]);
                }
            }
        }
    }
}

/**
include 'Horizontaal.php';
horizontaalZoeken($woordenzoeker, $gesplitst);
include 'Verticaal.php';
verticaalZoeken($woordenzoeker, $gesplitst);
include 'Diagonaal.php';
diagonaalZoeken($woordenzoeker, $gesplitst);
*/

//echo "<pre>", PRINT_R($woordenzoeker), "</pre>";
//echo "<pre>", PRINT_R($gevondenWoordenCoordinaten), "</pre>";
?>


<html>
    <head>
        <title>Woordenzoeker</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="opmaak.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <?php
        $classes = $zoekwoorden;
        print "<style>";
        include_once 'opmaak.php';
        print "</style>";
        foreach ($gevondenWoordenCoordinaten as $GEVONDENWOORDJE => $gevondenwoord) {
            echo '<script type=text/javascript>';
            echo '$(document).ready(function () {';
            echo '$("div.' . $GEVONDENWOORDJE . '").mouseenter(function () {';
            echo '$("td.' . $GEVONDENWOORDJE . '").css("background-color", "pink");';
            echo "});";
            echo '});';
            echo '</script>';
            echo '<script type=text/javascript>';
            echo '$(document).ready(function () {';
            echo '$("div.' . $GEVONDENWOORDJE . '").mouseleave(function () {';
            echo '$("td.' . $GEVONDENWOORDJE . '").css("background-color", "white");';
            echo "});";
            echo "});";
            echo '</script>';
            echo '<script type=text/javascript>';
            echo '$(document).ready(function () {';
            echo '$("div.' . $GEVONDENWOORDJE . '").click(function () {';
            echo '$("td.' . $GEVONDENWOORDJE . '").addClass("blauw");';
            echo "});";
            echo "});";
            echo '</script>';
            foreach ($gevondenwoord as $cordinaat) {
                echo '<script type=text/javascript>';
                echo '$(document).ready(function () {';
                echo '$("td.' . $cordinaat . '").addClass("' . $GEVONDENWOORDJE . '");';
                echo '});';
                echo '</script>';
            }
        }
        ?>
    </head>
    <body>
        <div id="boven">
            <img src="vergrootglas.png" alt="vergrootglas" style="width:40px; height:40px;">
            Woordzoeker
        </div>
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
                    //echo "</br>";
                }
                ?>
            </div>
        </div>
    </body>
</html>
