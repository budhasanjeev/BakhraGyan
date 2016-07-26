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
</head>

<body>
<?php
require('../views/Layout/header.php');
?>

<?php

$foodList = array();
$objCommon = new Common();
$foodList = $objCommon->getFood()
?>


<div class="container">

    <?php
    foreach($foodList as $food){
        ?>
        <div class="panel">
            <div class="col-sm-4">
                <img class="img-thumbnail" src="../images/<?php echo $food["image"] ?>" style="height: 200px;width:200px;">
            </div>

            <div class="col-sm-8">
                <h3><?php echo $food['title'] ?></h3>
                <p><?php echo $food['description']?></p>
                <!--<p>Category :- <?php /*echo $breed['category'] */?></p>-->
            </div>
        </div>
        <br>

    <?php } ?>
</div>

<?php
require('../views/Layout/footer.php');
?>
</body>
</html>