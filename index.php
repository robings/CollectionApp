<?php

require_once 'functions.php';
require_once 'dbConnect.php';
require_once 'class.php';

$db = connectdb();
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$shinkansens = fetchData($db);

$display = '';
foreach($shinkansens as $shinkansen) {
    //$shinkansenName='series' . $shinkansen['series'];
    $shinkansenBox = '<article><div class=\'item\'>';
    $shinkansenBox .= '<h2>Series ' . $shinkansen['series'] . '</h2>';
    $shinkansenBox .= '<img src=\'' . $shinkansen['imgURL'] . '\' alt=\'' . $shinkansen['series'] . 'Bullet Train\' />';
    $shinkansenBox .= '<ul>';
    $shinkansenBox .= '<li><span>Introduced:</span> ' . $shinkansen['introducedYR'] . '</li>';
    $shinkansenBox .= '<li><span>Top speed:</span> ' . $shinkansen['topSpeedKMH'] . 'km/h (' . $shinkansen['topSpeedMPH'] . 'mph)</li>';
    if ($shinkansen['withdrawn']==1) {
        $shinkansenBox .= '<li><span>Withdrawn:</span> ' . $shinkansen['withdrawnYR'] . '</li>';
    } else {
        $shinkansenBox .= '<li><span>Withdrawn:</span> still in service</li>';
    }
    $shinkansenBox .= '</ul></div></article>';

    $display .= $shinkansenBox;
}


//var_dumpPre($shinkansens);

//test object instantiation



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
        echo $display;
    ?>

    <!-- end of php echo section -->
</section>

</body>

</html>
