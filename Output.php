<?php
include 'Splitsen.php';
include 'BestandToevoegen.php';
include 'MinnetjesNaarLetters.php';
include 'Horizontaal.php';
include 'Verticaal.php';
include 'Diagonaal.php';
include 'ArrayNaarTabel.php';
include 'PrintjQuery.php';
include 'PrintZoekwoorden.php';
voegBestandToe();
splitsen($woordenzoeker);
minnetjesNaarLetters($woordenzoeker);
horizontaalZoeken($woordenzoeker, $gesplitst);
verticaalZoeken($woordenzoeker, $gesplitst);
diagonaalZoeken($woordenzoeker, $gesplitst);
?>

<html>
    <head>
        <title>Woordenzoeker</title>
        <meta charset="UTF-8">
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
        //bestandtoevoegenaanenuit();
        ?>
        <div id="tabel">
            <?php echo build_table($woordenzoeker); ?>   
            <div id="zoekwoorden">
                </br>
                <?php printZoekwoorden($zoekwoorden); ?>
            </div>
        </div>
    </body>
</html>
