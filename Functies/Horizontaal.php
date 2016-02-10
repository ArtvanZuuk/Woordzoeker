<?php

//woorden zoeken Horizontaal
function horizontaalZoeken($woordenzoeker, $gesplitst, $niveau) {
    global $gevondenWoordenCoordinaten;
    $horizontaleletters = count($woordenzoeker[0]);
    foreach ($gesplitst as $zoekendwoord) {
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
                if ($niveau >= 2) {
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
    }
    //echo "<pre>", PRINT_R($gevondenWoordenCoordinaten), "</pre>";
}
