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
    <link rel="icon" href="../images/logo.png" type="image/gif" sizes="16x16">

</head>

<body>
<?php
require('../views/Layout/header.php');
?>

<?php
$breedList = array();
$objCommon = new Common();
$breedList = $objCommon->getBreed()
?>


<div class="container">

    <?php

    if(count($breedList)>0){

        foreach($breedList as $breed){
            ?>
<!--            <div class="panel panel-default">-->
                <div class="col-sm-4">
                    <img  class="img-thumbnail" src="../images/<?php echo $breed["image"] ?>" style="height: 200px;width:200px;">
                </div>

                <div class="col-sm-8">
                    <h3><?php echo $breed['breed_name'] ?></h3>
                    <p><?php echo $breed['origin_distribution']?></p>
                    <p><?php echo $breed['character'] ?></p>
                    <p><?php echo $breed['utility'] ?></p>
                </div>
<!--            </div>-->

            <?php
        }
    }
    else{ ?>
        <p>प्रजतिबारे कुनै पनि जानकारी भेटिएन|</p>
    <?php } ?>
</div>

<?php
require('../views/Layout/footer.php');
?>
</body>
</html>