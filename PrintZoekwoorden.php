<?php
function printZoekwoorden($zoekwoorden) {
    sort($zoekwoorden);
    foreach ($zoekwoorden as &$zoekwoord) {
        $ZOEKWOORD = ucfirst($zoekwoord);
        echo "<div class=$zoekwoord>$ZOEKWOORD</div>";
    }
}