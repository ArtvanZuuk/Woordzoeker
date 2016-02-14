<?php

//diagonaal, van links boven naar rechts onder en alle andere kanten
function diagonaalZoeken($woordenzoeker, $gesplitst, $niveau) {
    if ($niveau >= 4) {
        global $gevondenWoordenCoordinaten;
        foreach ($gesplitst as $zoekendwoord) {
            $hetWoord = implode('', $zoekendwoord);
            $cordinaat[$hetWoord] = array();
            $verticaleletters = count($woordenzoeker);
            $horizontaleletters = count($woordenzoeker[0]);
            $aantalk = $horizontaleletters - count($zoekendwoord);
            $aantalr = $verticaleletters - count($zoekendwoord);
            for ($r = 0; $r <= $aantalr; $r++) {
                for ($k = 0; $k <= $aantalk; $k++) {
                    //van linksboven naar rechtsonder
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
                    //van rechtsonder naar linksboven
                    $check = 0;
                    for ($i = 0; $i < count($zoekendwoord); $i++) {
                        if ($zoekendwoord[$i] == $woordenzoeker[$verticaleletters - $i - $r - 1][$horizontaleletters - $i - $k - 1]) {
                            $check = $check + 1;
                            $x = $horizontaleletters - $i - $k - 1;
                            $y = $verticaleletters - $i - $r - 1;
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
                    //van rechtsboven naar linksonder
                    $check = 0;
                    for ($i = 0; $i < count($zoekendwoord); $i++) {
                        if ($zoekendwoord[$i] == $woordenzoeker[$i + $r][$horizontaleletters - $i - $k - 1]) {
                            $check = $check + 1;
                            $x = $horizontaleletters - $i - $k - 1;
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
                    //van linksonder naar rechtsboven
                    $check = 0;
                    for ($i = 0; $i < count($zoekendwoord); $i++) {
                        if ($zoekendwoord[$i] == $woordenzoeker[$verticaleletters - $i - $r - 1][$i + $k]) {
                            $check = $check + 1;
                            $x = $i + $k;
                            $y = $verticaleletters - $i - $r - 1;
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
