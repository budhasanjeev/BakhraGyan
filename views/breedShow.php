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
            $breedList = array();
            $objCommon = new Common();
            $breedList = $objCommon->getBreed()
        ?>


        <div class="container">

            <?php
                foreach($breedList as $breed){
            ?>
            <div class="panel">
                <div class="col-sm-4">
                    <img class="img-thumbnail" src="../images/<?php echo $breed["image"] ?>" style="height: 200px;width:200px;">
                </div>

                <div class="col-sm-8">
                    <h3><?php echo $breed['breed_name'] ?></h3>
                    <p><?php echo $breed['description']?></p>
                    <p>Category :- <?php echo $breed['category'] ?></p>
                </div>
            </div>

            <?php } ?>
        </div>

        <?php
            require('../views/Layout/footer.php');
        ?>
    </body>
</html>