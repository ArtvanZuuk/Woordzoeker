<?php
function splitsen($woordenzoeker) {
    global $gesplitst, $zoekwoorden, $woordenzoeker;
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

//woordzoeker array met regels verder splitsen in een multidimensionale array met losse letters
    foreach ($woordenzoeker as &$regel) {
        $regel = str_split(trim($regel));
    }

//zoekwoorden ontdoen van hoofdletters zodat ze gezocht kunnen worden
//gzw = gesplitst zoekwoord
//gesplitst = gesplitste zoekwoorden
    $zoekwoorden = array_map('strtolower', $zoekwoorden);
    $gesplitst = $zoekwoorden;
    foreach ($gesplitst as &$gzw) {
        $gzw = str_split($gzw);
    }
}
