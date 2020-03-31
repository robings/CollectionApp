<?php

require_once 'functions.php';
require_once 'dbConnect.php';

$db = connectdb();

session_start();

?>

<!DOCTYPE html>
<html lang='en-GB'>
<head>
    <title>Shinkansen - Add Train</title>
    <meta name='viewport' content='width=device-width' />
    <link href='https://fonts.googleapis.com/css?family=Roboto&display=swap' rel='stylesheet' />
    <link rel='stylesheet' type='text/css' href='normalize.css' />
    <link rel='stylesheet' type='text/css' href='styles.css' />
</head>

<body>
<header>
    <div class='heroImage'>
        <h1>Shinkansen - Japanese Bullet Train Collection</h1>
        <div class='navLink'><a href='index.php'>Home</a></div>
    </div>
</header>
<section>
    <form action='processForm.php' method='post'>
        <h2>Add Shinkansen</h2>
        <div>
            <label>Series </label>
            <input type='text' name='series' size='10' maxlength='20' required />
            <label>(letters &amp; numbers only, no spaces)</label>
        </div>
        <div>
            <label>Top speed (km/h) </label>
            <input type='text' name='topSpeedKmh' size='5' maxlength='3' required />
            <label>(numbers only)</label>
        </div>
        <div>
            <label>Top speed (mph) </label>
            <input type='text' name='topSpeedMph' size='5' maxlength='3' required />
            <label>(numbers only)</label>
        </div>
        <div>
            <label>Year introduced </label>
            <input type='text' name='introYr' size='5' maxlength='4' required />
            <label>(after 1901)</label>
        </div>
        <div>
            <label>Year withdrawn </label>
            <input type='text' name='withdrawnYr' size='5' maxlength='4' />
            <label>(after 1901, leave blank if still in service)</label>
        </div>
        <div>
            <label>Img url </label>
            <input type='text' name='imgUrl' size='30' maxlength='500' value='images/shinkansen.jpg' required />
            <label>(must be an existing file)</label>
        </div>
        <input type='submit' value='Add' />
    </form>

    <?php
      if (isset($_SESSION['errorMessage'])) {
          echo '<article>' . $_SESSION['errorMessage'] . '</article>';
          unset($_SESSION['errorMessage']);
      }
    ?>
</section>

</body>
</html>
