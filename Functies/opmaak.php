<?php

function klikKleuren($zoekwoorden) {
    print "<style>";
    foreach ($zoekwoorden as $class) {
        echo "td.klik" . strtoupper($class) . "{";
        echo "color: #F5A700;}";
    }
}

Function zoekwoordenOnderlijnen($zoekwoorden) {
    $laatste = end($zoekwoorden);
    array_pop($zoekwoorden);
    foreach ($zoekwoorden as $class) {
        print "div." . $class . ":hover,";
    }
    print "div." . $laatste . ":hover";
    print " {text-decoration: underline;}";
    print "</style>";
}
