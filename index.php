<?php

require_once 'functions.php';
require_once 'dbConnect.php';

session_start();


$db = connectdb();

$shinkansens = getAllTrains($db);

$trains = displayTrains($shinkansens);


?>

<!DOCTYPE html>
<html lang='en-GB'>
<head>
   <title>Shinkansen</title>
    <meta name='viewport' content='width=device-width' />
    <link href='https://fonts.googleapis.com/css?family=Roboto&display=swap' rel='stylesheet' />
    <link rel='stylesheet' type='text/css' href='normalize.css' />
    <link rel='stylesheet' type='text/css' href='styles.css' />
</head>

<body>
<header>
    <div class='heroImage'>
        <h1>Shinkansen - Japanese Bullet Train Collection</h1>
        <div class='navLink'><a href='addForm.php'>Add</a></div>
    </div>
</header>
<section class='collection'>
    <?php
    if (isset($_SESSION['errorMessage'])) {
        echo '<article>' . $_SESSION['errorMessage'] . '</article>';
        unset($_SESSION['errorMessage']);
    }

    echo $trains; ?>
</section>

</body>

</html>