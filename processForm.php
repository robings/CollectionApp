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
$withdrawn = $_POST['withdrawnYr'];
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

if ($withdrawn != NULL) {
    if (validateYear($withdrawn) == -1) {
        $errorMessage .=  'invalid withdrawn year<br />';
    }
}

if (validateUrl($imgUrl) == 'error') {
    $errorMessage .=  'invalidUrl<br />';
}

//echo $errorMessage;

//finally send back to either index.php if success or to form page if not
if ($errorMessage !='') {
    header('Location: addForm.php');
}

//echo 'success';