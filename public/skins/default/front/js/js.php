<?php
if (!empty($_GET)) {
    header('Content-type: text/javascript');
    foreach ($_GET as $file) {
        readfile($file);
    }
}