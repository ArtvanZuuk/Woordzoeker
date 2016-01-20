<?php
$regels = file('woordzoeker.txt');

//for($i = 0 : $i < \strlen(regel); $i++);
//$matrix[$j][$i] = $regel [$i]; 
 //Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($regels as $regel_nummer => $regel) {
    echo "Regel #<b>{$regel_nummer}</b> : ". htmlspecialchars ($regel) . "<br />\n";
}

foreach ($regels as $letters => $regel){
$str = $regel;

$arr1 = str_split($str);
}

 //Another example, let's get a web page into a string.  See also file_get_contents().
//$html = implode('', file('woordzoeker.txt'));

// Using the optional flags parameter since PHP 5


?>