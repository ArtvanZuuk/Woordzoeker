<?php
session_start();
if (empty($_SESSION['test123'])) {
    $_SESSION['test123'] = file("Woordzoekers/woordzoeker.txt");
}
$woordenzoeker = $_SESSION['test123'];
include 'Functies/BestandToevoegen.php';
include 'Functies/Splitsen.php';
include 'Functies/MinnetjesNaarLetters.php';
include 'Functies/Horizontaal.php';
include 'Functies/Verticaal.php';
include 'Functies/Diagonaal.php';
include 'Functies/ArrayNaarTabel.php';
include 'Functies/PrintjQueryEnPHPOpmaak.php';
include 'Functies/PrintZoekwoorden.php';

voegBestandToe();
splitsen($woordenzoeker);
minnetjesNaarLetters($woordenzoeker);
$niveau = 4;
if (isset($_POST["submitknop"])) {
    echo 'Kies een richting';
}
if (isset($_POST["Niveau1"])) {
    $niveau = 1;
}
if (isset($_POST["Niveau2"])) {
    $niveau = 2;
}
if (isset($_POST["Niveau3"])) {
    $niveau = 3;
}
if (isset($_POST["Niveau4"])) {
    $niveau = 4;
}
horizontaalZoeken($woordenzoeker, $gesplitst, $niveau);
verticaalZoeken($woordenzoeker, $gesplitst, $niveau);
diagonaalZoeken($woordenzoeker, $gesplitst, $niveau);
?>

<html>
    <head>
        <title>Woordenzoeker</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" type="image/ico" href="fav.ico"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="opmaak.css">
        <!--<link rel="stylesheet" type="text/css" href="opmaak.php">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <?php jQueryEnPhpOpmaak($gevondenWoordenCoordinaten, $zoekwoorden); ?>
    </head>
    <body>
        <div id="boven">
            <img src="vergrootglas.png" alt="vergrootglas" style="width:40px; height:40px;">
            Woordzoeker
        </div>
        <form action="Output.php" method="post" enctype="multipart/form-data">
            <br/>
            <label for="file">Zoek een bestand:</label>
            <input type="file" name="file" id="file"/>
            <input class="submitknop" type="submit" onclick="drukhier()" value="Submit"> Dubbelklik om te bevestigen.
        </form>
        <div>
            <form action="Output.php" method="post">
                <input class= "knoppen" type="submit" name="Niveau1" value="Alleen van links naar rechts"></input>
                <input class= "knoppen" type="submit" name="Niveau2" value="Aleen horizontaal"></input>
                <input class= "knoppen" type="submit" name="Niveau3" value="Horizontaal en verticaal"></input>
                <input class= "knoppen" type="submit" name="Niveau4" value="Horizontaal, verticaal en diagonaal"></input>
            </form>
        </div>
        
        <form action="window.location.reload()" method="post">
        
        <?php
        if (isset($_POST["Niveau1"])) {
            echo 'Hij zoekt nu alleen van links naar rechts';
        }
        if (isset($_POST["Niveau2"])) {
            echo 'Hij zoekt nu alleen horizontaal';
        }
        if (isset($_POST["Niveau3"])) {
            echo 'Hij zoekt nu horizontaal en verticaal';
        }
        if (isset($_POST["Niveau4"])) {
            echo 'Hij zoekt nu horizontaal, verticaal en diagonaal';
        }
        ?>
            <?php
if (isset($_POST['drukhier'])) {
       function myFunction() {
    location.reload();
}
    }
    ?>

        <div id="tabel">
            <?php echo build_table($woordenzoeker); ?>   
            <div id="zoekwoorden">
                <?php printZoekwoorden($zoekwoorden); ?>
            </div>
        </div>
        <div id="copy">
            Woordzoeker&copy; 
        </div>
        <div id="namen">
<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">Neville, Robbie & Art</a> 
        </div>
    </body>
</html>
