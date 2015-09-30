<?php
if (!empty($_GET)) {
    header('Content-type: text/css');
    foreach ($_GET as $file) {
        readfile($file);
    }
}