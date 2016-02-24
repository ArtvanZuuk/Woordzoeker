<?php

function voegBestandToe() {
    if (isset($_FILES['file'])) {
        if ($_FILES["file"]["error"] > 0) {
        } elseif ($_FILES["file"]["type"] !== "text/plain") {
        } else {
            $_SESSION['test123'] = FILE($_FILES["file"]["tmp_name"]);  
        }
    }
}
