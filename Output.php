<?php
include 'Functies/Splitsen.php';
include 'Functies/BestandToevoegen.php';
include 'Functies/MinnetjesNaarLetters.php';
include 'Functies/Horizontaal.php';
include 'Functies/Verticaal.php';
include 'Functies/Diagonaal.php';
include 'Functies/ArrayNaarTabel.php';
include 'Functies/PrintjQuery.php';
include 'Functies/PrintZoekwoorden.php';
voegBestandToe();
splitsen($woordenzoeker);
minnetjesNaarLetters($woordenzoeker);

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
if(isset($niveau))
{
    horizontaalZoeken($woordenzoeker, $gesplitst, $niveau);
    verticaalZoeken($woordenzoeker, $gesplitst, $niveau);
    diagonaalZoeken($woordenzoeker, $gesplitst, $niveau);
}
?>

<html>
    <head>
        <title>Woordenzoeker</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" type="image/ico" href="fav.ico"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="opmaak.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <?php printjQuery($gevondenWoordenCoordinaten); ?>
    </head>
    <body>
        <div id="boven">
            <img src="vergrootglas.png" alt="vergrootglas" style="width:40px; height:40px;">
            Woordzoeker
        </div>
        <?php
        bestandtoevoegenaanenuit();
        ?>
        <div>
            <form action="Output.php" method="post">
                <input id="knoppen" type="submit" name="Niveau1" value="Alleen van links naar rechts"></input>
                <input id="knoppen" type="submit" name="Niveau2" value="Aleen horizontaal"></input>
                <input id="knoppen" type="submit" name="Niveau3" value="Horizontaal en verticaal"></input>
                <input id="knoppen" type="submit" name="Niveau4" value="Horizontaal, verticaal en diagonaal"></input>
            </form>
        </div>
        <div id="tabel">
            <?php echo build_table($woordenzoeker); ?>   
            <div id="zoekwoorden">
                <?php printZoekwoorden($zoekwoorden); ?>
            </div>
        </div>
        <div id="namen">
        By: Neville, Robby & Art
        </div>
    </body>
</html>
