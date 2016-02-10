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

