<?php

require_once 'dbConnect.php';
require_once 'class.php';

/**
 * function to call a var dump with pre tags
 * @param $variabletoDump - the variable to be dumped
 */
function var_dumpPre($variabletoDump) {
    echo '<pre>';
    var_dump($variabletoDump);
    echo '</pre>';
}

function fetchData($db) {
    $query = $db->prepare('SELECT `id`, `series`, `introducedYR`, `topSpeedKMH`, `topSpeedMPH`, `withdrawn`, `withdrawnYR`, `imgURL` FROM `shinkansens`;');
    $query->execute();
    return $query->fetchAll();
}