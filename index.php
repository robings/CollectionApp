<?php

require_once 'functions.php';
require_once 'dbConnect.php';

$db = connectdb();


$shinkansens = fetchData($db);

$display = '';
foreach($shinkansens as $shinkansen) {
    $display .= collectionBox($shinkansen);
}

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
<header>
    <div class='heroImage'>
        <h1>Shinkansen - Japanese Bullet Train Collection</h1>
    </div>
</header>
<section class='collection'>
    <!-- this section will be replaced by a php echo -->
    <?php
        echo $display;
    ?>

    <!-- end of php echo section -->
</section>

</body>

</html>

<?php
//vardumps for debugging

//var_dumpPre($shinkansens);
