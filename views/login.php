<?php
/**
 * Created by PhpStorm.
 * User: sanjeev-budha
 * Date: 4/21/16
 * Time: 11:25 PM
 */


?>
<!DOCTYPE html>
<html>

<head>
    <title>बाख्रा ज्ञान</title>
    <meta charset="utf-8">
    <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="../css/bakhragyan.css" type="text/css" rel="stylesheet">

    <script src="../js/jquery-1.12.0.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/news.js" type="text/javascript"></script>
    <script src="../js/login.js" type="text/javascript"></script>
    <script src="../js/custom.js" type="text/javascript"></script>
</head>

<body>


<header class="container-fluid">
    <a href="home.php"><img src="../images/krishisujhab.png" style="height: 70px;" title="DWIT NEWS"></a>
</header>

<nav class="navbar navbar-inverse" style="border: none;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

    </div>
</nav>

<div class="container" style="width: 60%;margin-top: 5%">

    <fieldset>
    <legend style="margin-left: 10%">लग-इन गारनुहोस</legend>
    <form class="form-horizontal" role="form" id="login-form" action="../controller/auth.php" method="post">

        <input type="hidden" name="login" value="login">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email"><span class="glyphicon glyphicon-envelope"/></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" placeholder="इमेल प्रविष्ट गर्नुहोस्">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd"><span class="glyphicon glyphicon-lock"/></label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pwd" name="password" placeholder="पासवर्ड प्रविष्ट गर्नुहोस्">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-check"/>थिच्नुहोस</button>
            </div>
        </div>
    </form>

</div>

<div style="margin-left: 27%">
    <p class="news-text">पासवर्ड भुल्नु भयो?ठीक छ &nbsp;&nbsp;<button class="btn btn-success">यहाँ पुन: प्राप्त</button></p>
</div>
</fieldset>
</div>
<?php
require('Layout/footer.php');
?>
</body>
</html>
