<?php

function pre() {
    print "<pre>";
}

/*
  pre();
  print_r($_POST);
  print_r($_FILES);
 *
 */

function leesBestand() {
    $regels = array();
    if (isset($_FILES['file'])) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        } elseif ($_FILES["file"]["type"] !== "text/plain") {
            echo "File must be a .txt";
        } else {
            $regels = FILE($_FILES["file"]["tmp_name"]);
            //pre();
            //print_r($regels);
            //   $file_handle = fopen($_FILES["file"]["name"], "rb");
        }
        // $fp = fopen($_FILES['uploadFile']['tmp_name'], 'rb');
        // while (($line = fgets($fp)) !== false) {
        //     echo "$line<br>";
        // }
    }
    return $regels;
}
$regels  = leesBestand();
pre(); print_r($regels);
include_once 'oplossen.php';
?>


