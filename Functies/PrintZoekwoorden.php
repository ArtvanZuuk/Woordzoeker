<?php
function printZoekwoorden($zoekwoorden) {
    //sort($zoekwoorden);
    array_multisort(array_map('strlen', $zoekwoorden), $zoekwoorden);
    foreach ($zoekwoorden as &$zoekwoord) {
        $ZOEKWOORD = ucfirst($zoekwoord);
        echo "<div class=$zoekwoord>$ZOEKWOORD</div>";
    }
}