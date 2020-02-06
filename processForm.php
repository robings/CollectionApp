<?php

require_once 'functions.php';
require_once 'dbConnect.php';

session_start();

$db = connectdb();

if (!isset($_POST['series'])) {
    header ('Location: index.php');
}

$series = $_POST['series'];
$topKph = $_POST['topSpeedKmh'];
$topMph = $_POST['topSpeedMph'];
$introYr = $_POST['introYr'];
$withdrawnYr = $_POST['withdrawnYr'];
$imgUrl = $_POST['imgUrl'];

$errorMessage = '';

if (validateStringOnlyAlphaNumeric($series) == 'error') {
    $errorMessage .= 'invalid series<br />';
}

if (validateSpeed($topKph) == -1) {
    $errorMessage .= 'invalid km/h<br />';
}


if (validateSpeed($topMph) == -1) {
    $errorMessage .=  'invalid mph<br />';
}


if (validateYear($introYr) == -1) {
    $errorMessage .=  'invalid intro year<br />';
}

if ($withdrawnYr != NULL) {
    if (validateYear($withdrawnYr) == -1) {
        $errorMessage .=  'invalid withdrawn year<br />';
    } elseif ($withdrawnYr < $introYr) {
        $errorMessage .= 'withdrawn year cannot be before introduced year<br />';
    }
}

if (validateUrl($imgUrl) == 'error') {
    $errorMessage .=  'invalidUrl<br />';
}



if ($errorMessage !='') {
    if (isset($_SESSION)) {
        $_SESSION['errorMessage'] = $errorMessage;
    }
    header('Location: addForm.php');
    exit;
}

$shinkansen = [ $series, $topKph, $topMph, $introYr, $withdrawnYr, $imgUrl ];

addTraintoDb($db, $shinkansen);

header('Location: index.php');