<?php
function printjQuery($gevondenWoordenCoordinaten) {
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
}