<?php
/**
 * Created by PhpStorm.
 * User: Arun Tamang
 * Date: 7/25/2016
 * Time: 3:27 PM
 */


require('../common/Common.php');

session_start();
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

    <div class="panel panel-primary" style="width: 80%;margin: auto">
        <div class="panel panel-heading">
            <p>लक्ष्यण टिक लगाउनुहोस</p>

        </div>

        <div class="panel panel-body">
            <form method="post" action="../controller/findDiseaseHandler.php">
                <input type="hidden" name="mode" value="find">
                <input type="checkbox" name="symptoms[]" value="1">Fever<br>
                <input type="checkbox" name="symptoms[]" value="2">Lambs refuse to eat<br>
                <input type="checkbox" name="symptoms[]" value="3">Emaciation<br>
                <input type="checkbox" name="symptoms[]" value="4">Animals seek to a shaded area because of photophobia<br>
                <input type="checkbox" name="symptoms[]" value="5">mild to severe lameness<br>
                <input type="checkbox" name="symptoms[]" value="6">Pneumonia in feeder lambs<br>
                <input type="checkbox" name="symptoms[]" value="7">animals are reluctant to walk<br>
                <input type="checkbox" name="symptoms[]" value=8>associated with a foul smell<br>

                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>

    </div>
<br><br>
    <?php if(isset($_SESSION['disease'])){
    ?>
        <div class="panel panel-success" style="width: 80%;margin: auto">
            <b><?php echo $_SESSION['disease'] ?></b>
        </div>
    <?php } ?>
</div>

<?php
require('../views/Layout/footer.php');
?>
</body>
</html>