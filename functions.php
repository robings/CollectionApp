<?php

require_once 'dbConnect.php';
require_once 'class.php';

function var_dumpPre($variabletoDump) {
    echo '<pre>';
    var_dump($variabletoDump);
    echo '</pre>';
}