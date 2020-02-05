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

if (validateStringOnlyAlphaNumeric(trim($_POST['series']))) {
    echo 'Valid series';
} else {
    echo 'invalid series';
}
echo '<br />';

if (validateSpeed(trim($_POST['topSpeedKmh']))) {
    echo 'Valid km/h';
} else {
    echo 'invalid km/h';
}
echo '<br />';

if (validateYear(trim($_POST['introYr']))) {
    echo 'Valid year';
} else {
    echo 'invalid year';
}
echo '<br />';

if (validateUrl(trim($_POST['imgUrl']))) {
    echo 'validUrl';
} else {
    echo 'invalid url';
}
echo '<br />';





//finally send back to either index.php if success or to form page if not