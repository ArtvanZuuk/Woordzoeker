<?php

function voegBestandToe() {
    global $woordenzoeker;
    if (isset($_FILES['file'])) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        } elseif ($_FILES["file"]["type"] !== "text/plain") {
            echo "Dit is een verkeerd type bestand.";
        } else {
            $woordenzoeker = FILE($_FILES["file"]["tmp_name"]);
        }
    }
    else {
        $woordenzoeker = file("Woordzoekers/woordzoeker.txt");
    }
    return $woordenzoeker;
    $woordenzoeker = file("Woordzoekers/woordzoeker.txt");
}

function bestandtoevoegenaanenuit (){
    echo '<form action="Output.php" method="post" enctype="multipart/form-data">
            <br/>
            <label for="file">Zoek een bestand:</label>
            <input type="file" name="file" id="file"/>
            <input type="submit" value="Submit">
        </form>';
}
