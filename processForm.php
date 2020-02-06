<?php

require_once 'functions.php';
require_once 'dbConnect.php';

session_start();

$db = connectdb();

if (!isset($_POST['series'])) {
    echo 'no post data';
    //send this back to the index page instead
}
echo 'there is post data';
echo '<br />';
$series = $_POST['series'];
$topKph = $_POST['topSpeedKmh'];
$topMph = $_POST['topSpeedMph'];
$introYr = $_POST['introYr'];
$withdrawn = $_POST['withdrawnYr'];
$imgUrl = $_POST['imgUrl'];

if (validateStringOnlyAlphaNumeric($series) == 'error') {
    echo 'invalid series';
}

echo '<br />';

if (validateSpeed($topKph) == -1) {
    echo 'invalid km/h';
}

echo '<br />';

if (validateSpeed($topMph) == -1) {
    echo 'invalid mph';
}

echo '<br />';

if (validateYear($introYr) == -1) {
    echo 'invalid intro year';
}

echo '<br />';

if ($withdrawn != NULL) {
    if (validateYear($withdrawn) == -1) {
        echo 'invalid withdrawn year';
    }
}

echo '<br />';

if (validateUrl($imgUrl) == 'error') {
    echo 'invalidUrl';
}

echo '<br />';





//finally send back to either index.php if success or to form page if not