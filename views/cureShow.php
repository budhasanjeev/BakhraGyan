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

$cureList = array();
$objCommon = new Common();
$cureList = $objCommon->getCure()
?>


<div class="container">

    <?php

    if(count($cureList) >0) {

        foreach ($cureList as $cure) {

            $diseaseName = $objCommon->getDiseaseNameById($cure['disease_id'])
            ?>
<!--            <div class="panel">-->

                <div class="col-sm-8">
                    <h3><?php echo $diseaseName ?></h3>

                    <?php

                    $preventive_careList = explode('->',$cure['preventive_care'])

                    ?>
                    <ul>
                        <?php
                        for($i = 1;$i < count($preventive_careList);$i++){
                            ?>
                            <li><?php echo $preventive_careList[$i] ?></li>

                        <?php } ?>
                    </ul>

                    <!--<p><?php /*echo $cure['preventive_care'] */?></p>-->
                </div>

<!--            </div>-->

        <?php }
    }
    else{
        ?>

        <p>उपचारबारे कुनै पनि जानकारी भेटिएन|</p>
    <?php } ?>
</div>

<?php
require('../views/Layout/footer.php');
?>
</body>
</html>