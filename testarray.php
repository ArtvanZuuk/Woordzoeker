<?php
$regels = file("woordzoeker.txt");
foreach ($regels as &$letter){
    $letter = str_split($letter);
}
print_r(array_values($regels));
//print_r($regels);