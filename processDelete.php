<?php

require_once 'functions.php';
require_once 'dbConnect.php';

if (!isset($_POST['delete'])) {
    header ('Location: index.php');
}

session_start();

$db = connectdb();

$idToDelete = $_POST['delete'];
$errorMessage = '';

if (validateId($idToDelete) == 0) {
    $errorMessage .= 'Invalid id - unable to delete<br />';
}

if ($errorMessage !='') {
    if (isset($_SESSION)) {
        $_SESSION['errorMessage'] = $errorMessage;
    }
    header('Location: index.php');
    exit;
}

deleteTrainFromDb($db, $idToDelete);

header('Location: index.php');