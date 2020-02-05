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

if (validateSpeed($_POST['topSpeedKmh'])) {
    echo 'Valid km/h';
} else {
    echo 'invalid km/h';
}
echo '<br />';

if (validateYear($_POST['introYr'])) {
    echo 'Valid year';
} else {
    echo 'invalid year';
}
echo '<br />';



//pull data from form

//validate each piece of data in turn
//if there are messages, add to $_SESSION



//finally send back to either index.php if success or to form page if not