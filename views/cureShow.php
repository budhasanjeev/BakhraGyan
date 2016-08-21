<?php
/**
 * Created by PhpStorm.
 * User: Arun Tamang
 * Date: 7/25/2016
 * Time: 3:27 PM
 */


require('../common/Common.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>बाख्रा ज्ञान </title>
    <meta charset="utf-8">
</head>

<body>
<?php
require('../views/Layout/header.php');
?>

<?php

$cureList = array();
$objCommon = new Common();
$cureList = $objCommon->getCure()
?>


<div class="container">

    <?php

    if(count($cureList) >0) {

        foreach ($cureList as $cure) {
            ?>
            <div class="panel">

                <div class="col-sm-8">
                    <h3><?php echo $cure['disease_id'] ?></h3>

                    <p><?php echo $cure['preventive_care'] ?></p>
                </div>

            </div>

        <?php }
    }
    else{
        ?>

        <p>No records found</p>
    <?php } ?>
</div>

<?php
require('../views/Layout/footer.php');
?>
</body>
</html>