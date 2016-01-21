<?php
    function build_table($array){
    // start table
    $html = '<table>';

    // data rows
    foreach( $array as $key=>$value){
        //var_dump($value);
        $html .= '<tr>';
        foreach($value as $key2=>$value2){
            $html .= '<td>' . $value2 . '</td>';
        }
        $html .= '</tr>';
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
}

$alfabet = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", 
    "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"
);

$woordenzoeker = file("woordzoeker.txt");

foreach ($woordenzoeker as &$regel){
    $regel = str_split($regel);
}

foreach ($woordenzoeker as &$value3) {
    $elementToBeDeleted = sizeof($value3) - 1;
    unset($value3[$elementToBeDeleted]);
    foreach ($value3 as &$value4){
        if($value4 == "-" or $value4 == "/n"){
            $value4 = $alfabet[rand(0, 25)];
        }
    }
}

?>

<html>
    <head>
        <title>Woordenzoeker</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="opmaak.css" rel="stylesheet"/>
    </head>
    <body>
        <div id="tabel">
            <?php
                echo build_table($woordenzoeker);
                echo $woordenzoeker[0][0];
            ?>
        </div>
    </body>
</html>