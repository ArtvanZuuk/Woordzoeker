<?php
//$bestand = fopen("woordzoeker.txt", "r") or die("Unable to open file!");
//echo fread($bestand,filesize("woordzoeker.txt"));

$file_handle = fopen("woordzoeker.txt", "rb");

while (!feof($file_handle) ) {

$line_of_text = fgets($file_handle);
$parts = explode('=', $line_of_text);

print $parts[0] . $parts[1]. "</br>";

}

fclose($file_handle);
