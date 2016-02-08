<?php
//minnetjes veranderen in letters
function minnetjesNaarLetters($woordenzoeker) {
    global $woordenzoeker;
    $alfabet = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
    foreach ($woordenzoeker as &$value) {
        foreach ($value as &$value2) {
            if ($value2 == "-") {
                $value2 = $alfabet[rand(0, 25)];
            }
        }
    }
}