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

$shedList = array();
$objCommon = new Common();
$shedList = $objCommon->getShed()
?>


<div class="container">

    <?php

    if(count($shedList) >0) {

        foreach ($shedList as $shed) {
            ?>
            <div class="panel">

                <div class="col-sm-8">
                    <h3><?php echo $shed['title'] ?></h3>

                    <p><?php echo $shed['description'] ?></p>
                </div>

                <div class="col-sm-4">
                    <img class="img-thumbnail" src="../images/<?php echo $shed["photo"] ?>"
                         style="height: 200px;width:200px;">
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