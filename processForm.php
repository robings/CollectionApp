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
    }
}

if (validateUrl($imgUrl) == 'error') {
    $errorMessage .=  'invalidUrl<br />';
}

if ($errorMessage !='') {
    header('Location: addForm.php');
}

//build an array
$shinkansen = [ $series, $topKph, $topMph, $introYr, $withdrawnYr, $imgUrl ];


//call function to put stuff in the db
addTraintoDb($db, $shinkansen);

//return to index page
//header('Location: index.php');