<?php

function voegBestandToe() {
    global $woordenzoeker1;
    if (isset($_FILES['file'])) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        } elseif ($_FILES["file"]["type"] !== "text/plain") {
            echo "Dit is een verkeerd type bestand.";
        } else {
            $woordenzoeker1 = FILE($_FILES["file"]["tmp_name"]);
            $_SESSION['test123'] = $woordenzoeker1;
        }
    }
}

$woordenzoeker = $_SESSION['test123'];

function bestandtoevoegenaanenuit() {
    echo '<form action="Output.php" method="post" enctype="multipart/form-data">
            <br/>
            <label for="file">Zoek een bestand:</label>
            <input type="file" name="file" id="file"/>
            <input class="submitknop" type="submit" value="Submit">
        </form>';
}
