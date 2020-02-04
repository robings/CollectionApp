<?php

require_once 'functions.php';
require_once 'dbConnect.php';

$db = connectdb();
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$query = $db->prepare('SELECT `id`, `series`, `topSpeedKMH`, `topSpeedMPH`, `withdrawn`, `withdrawnYR`, `imgURL` FROM `shinkansens`;');
$query->execute();
$data = $query->fetchAll();

var_dump($data);

//call code that pulls collection from db

?>

<!DOCTYPE html>
<html lang='en-GB'>
<head>
   <title>Shinkansen</title>
    <meta name="viewport" content="width=device-width" />
    <link rel='stylesheet' type='text/css' href='normalize.css' />
    <link rel='stylesheet' type='text/css' href='styles.css' />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
<section>
    <div class='heroImage'>
        <h1>Shinkansen - Japanese Bullet Train Collection</h1>
    </div>
</section>
<section class='collection'>
    <!-- this section will be replaced by a php echo -->
    <?php

    ?>
    <article>
        <div class='item'>
            <h2>N700</h2>
            <img src='images/bullet-train-1918480_1280.jpg' alt='N700 Bullet Train'/>
            <ul>
                <li><span>Introduced:</span> 2007</li>
                <li><span>Top speed:</span> 300km/h (185 mph)</li>
                <li><span>Withdrawn:</span> still in service</li>
            </ul>
        </div>
    </article>
    <article>
        <div class='item'>
            <h2>N700</h2>
            <img src='images/bullet-train-1918480_1280.jpg' alt='N700 Bullet Train'/>
            <ul>
                <li><span>Introduced:</span> 2007</li>
                <li><span>Top speed:</span> 300km/h (185 mph)</li>
                <li><span>Withdrawn:</span> still in service</li>
            </ul>
        </div>
    </article>
    <article>
        <div class='item'>
            <h2>N700</h2>
            <img src='images/bullet-train-1918480_1280.jpg' alt='N700 Bullet Train'/>
            <ul>
                <li><span>Introduced:</span> 2007</li>
                <li><span>Top speed:</span> 300km/h (185 mph)</li>
                <li><span>Withdrawn:</span> still in service</li>
            </ul>
        </div>
    </article>
    <!-- end of php echo section -->
</section>

</body>

</html>
