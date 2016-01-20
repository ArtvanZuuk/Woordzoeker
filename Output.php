<?php
    function build_table($array){
    // start table
    $html = '<table>';
    // header row
    $html .= '<tr>';
    $html .= '</tr>';

    // data rows
    foreach( $array as $key=>$value){
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
$woordenzoeker = array(
  array("-", "-", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-"),
  array("-", "-", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-"),
  array("-", "-", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-"),
  array("-", "-", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-"),
  array("-", "-", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-"),
  array("-", "-", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-"),
  array("-", "-", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-"),
  array("-", "-", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-"),
  array("-", "-", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-"),
  array("-", "-", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-"),
  array("-", "-", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-"),
  array("-", "-", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-"),
  array("-", "-", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-"),
  array("-", "-", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-"),
  array("-", "-", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-")
);
//$min = "-";
foreach ($woordenzoeker as $i => $w) {
  if ($w == "-"){
      $i = random(0,26);
      //$woordenzoeker[$i] =
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
            ?>
        </div>
    </body>
</html>