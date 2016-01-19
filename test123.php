<?php
$bestand = fopen("woordzoeker.txt", "r") or die("Unable to open file!");
echo fread($bestand,filesize("woordzoeker.txt"));

$regels=file('woordzoeker.txt');

$regels= array[0];
$fp=fopen('woordzoeker.txt', 'r');
while (!feof($fp))
{
    $line=fgets($fp);

    //process line however you like
    $line=trim($line);

    //add to array
    $lines[]=$line;

}
fclose($fp);
?> 