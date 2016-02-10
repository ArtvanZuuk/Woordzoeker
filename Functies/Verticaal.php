<?php

//woorden zoeken van boven naar beneden
function verticaalZoeken($woordenzoeker, $gesplitst, $niveau) {
    if ($niveau >= 3) {
        global $gevondenWoordenCoordinaten;
        $horizontaleletters = count($woordenzoeker[0]);
        $verticaleletters = count($woordenzoeker);
        foreach ($gesplitst as $zoekendwoord) {
            $hetWoord = implode('', $zoekendwoord);
            $aantalkeer = $verticaleletters - count($zoekendwoord) + 1;
            $cordinaat[$hetWoord] = array();
            for ($r = 0; $r < $horizontaleletters; $r++) {
                for ($j = 0; $j < $aantalkeer; $j++) {
                    //van boven naar beneden
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
                    //van beneden naar boven
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
        //echo "<pre>", PRINT_R($gevondenWoordenCoordinaten), "</pre>";
    }
}
