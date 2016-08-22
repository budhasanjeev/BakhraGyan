<?php
/**
 * Created by PhpStorm.
 * User: sanjeev-budha
 * Date: 4/21/16
 * Time: 11:50 PM
 */
session_start();
require('../common/Common.php');

if(isset($_SESSION['email'])){
    header("Location:dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>बाख्रा ज्ञान</title>
    <meta charset="utf-8">
    <link href="../css/bakhragyan.css" type="text/css" rel="stylesheet">

</head>

<body>
<?php
require('../views/Layout/header.php');
?>

<div id="container-size">
    <?php

        $queryList = array();
        $objCommon = new Common();
        $queryList = $objCommon->getQuery();

        foreach ($queryList as $query) {
    ?>

    <div class="panel panel-primary">

        <div class="panel panel-body">
            <?php echo $query['full_name'] .$query['query'] ?>?

            <hr>
        </div>
    </div>

    <?php } ?>

</div>

<?php
require('../views/Layout/footer.php');
?>

</body>
</html>

