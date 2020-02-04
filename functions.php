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


function collectionBox($shinkansen) {
    $shinkansenBox = '<article><div class=\'item\'>';
    $shinkansenBox .= '<h2>Series ' . $shinkansen['series'] . '</h2>';
    $shinkansenBox .= '<img src=\'' . $shinkansen['imgURL'] . '\' alt=\'' . $shinkansen['series'] . 'Bullet Train\' />';
    $shinkansenBox .= '<ul>';
    $shinkansenBox .= '<li><span>Introduced:</span> ' . $shinkansen['introducedYR'] . '</li>';
    $shinkansenBox .= '<li><span>Top speed:</span> ' . $shinkansen['topSpeedKMH'] . 'km/h (' . $shinkansen['topSpeedMPH'] . 'mph)</li>';
    if ($shinkansen['withdrawn']==1) {
        $shinkansenBox .= '<li><span>Withdrawn:</span> ' . $shinkansen['withdrawnYR'] . '</li>';
    } else {
        $shinkansenBox .= '<li><span>Withdrawn:</span> still in service</li>';
    }
    $shinkansenBox .= '</ul></div></article>';

    return $shinkansenBox;
}