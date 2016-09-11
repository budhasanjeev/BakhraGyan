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

    <div class="panel panel-primary" style="width: 80%;margin: auto;margin-bottom: 10%;z-index: 99999">
        <div class="panel panel-default">
            <h4 style="text-align: center"><b> लक्षण  टिक लगानुहोस</b></h4>

        </div>

        <div class="panel panel-body">
            <form method="post" action="../controller/findDiseaseHandler.php">
                <input type="hidden" name="mode" value="find">
                <input type="checkbox" name="symptoms[]" value="1">&nbsp;ज्वरो<br>
                <input type="checkbox" name="symptoms[]" value="2">&nbsp;बाख्राले खाना खान छोड्छ<br>
                <input type="checkbox" name="symptoms[]" value="3">&nbsp;१०६ देखी १०८ डिग्री फरेन्हाईटसम्मको ज्वरो आउँछ।<br>
                <input type="checkbox" name="symptoms[]" value="4">&nbsp;बाख्रा छायातिर जान खोज्छ<br>
                <input type="checkbox" name="symptoms[]" value="5">&nbsp;घाँसपानी खान छोड्छ र आँखा राता देखिन्छन। <br>
                <input type="checkbox" name="symptoms[]" value="6">&nbsp;गिजा र जिब्रोबाट घाऊ आउन सुरु गर्छ र बिस्तारइ मुखतिर फैलिन्छ। <br>
                <input type="checkbox" name="symptoms[]" value="7">&nbsp;छेरौटी लाग्छ। <br>
                <input type="checkbox" name="symptoms[]" value=8>&nbsp;आँखाबाट चिप्राहरु आउने र नाकबाट बाक्लो पहेंलो सिंगान बग्छ। <br>
                <input type="checkbox" name="symptoms[]" value=8>&nbsp;खोकिरहन्छ <br>
                <input type="checkbox" name="symptoms[]" value=8>&nbsp;यो रोग लाग्दा मुख वारीपरी घाऊ आँउदछ र पछी पाप्रा बन्दछ। <br>
                <input type="checkbox" name="symptoms[]" value=8>&nbsp;मुखको चेपबाट प्राय: सुरु हुने यस्तो घाऊ क्रमस मुख वरीपरी, जिब्रोतिर, कान वरीपरी, खुट्टाको छालातिर, अण्डकोस, कल्छौडा, सुत आदिको वरीपरी समेत अंउछन।<br>
                <input type="checkbox" name="symptoms[]" value=8>&nbsp;मुख वरीपरी घाऊ आउने हुँदा घाँस पानी खानमा समस्या आँुछ र पशुहरु क्रमस दुब्लाउदै जान्छ।  <br>
                <input type="checkbox" name="symptoms[]" value=8>&nbsp;कहिलेकाँही ३-४ हप्तामा यो घाऊ आँफै निको भएर जान्छ। <br>
                <br>
                <button class="btn btn-default" type="submit">पेश गर्नुहोस्</button>
            </form>
        </div>

        <?php if(isset($_SESSION['disease'])){
            ?>
            <div class="panel panel-footer" style="width: 80%;margin: auto">
                <b><?php echo $_SESSION['disease'] ?></b>
            </div>
        <?php } ?>
    </div>
<br><br>

</div>

<?php
require('../views/Layout/footer.php');
?>
</body>
</html>