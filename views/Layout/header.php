<?php
/**
 * Created by PhpStorm.
 * User: sanjeev-budha
 * Date: 4/21/16
 * Time: 9:44 PM
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <title>बाख्रा-ज्ञान</title>
        <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="../css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

        <script src="../js/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="../js/jquery.noty.packaged.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/login.js" type="text/javascript"></script>
        <script src="../js/custom.js" type="text/javascript"></script>
        <script src="../js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script></script>
    </head>

    <body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><img src="../images/logo.png" style="height: 58px;" title="bakhra-gyan"></a>
            </div>

            <div class="collapse navbar-collapse" id="menu">
                <?php
                    if(isset($_SESSION['email'])){?>

                            <ul class="nav navbar-nav">
                                <li><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span></a></li>
                                <li><a href="breed.php">प्रजाति</a></li>
                                <li><a href="food.php">आहारा </a></li>
                                <li><a href="disease.php">रोग </a></li>
                                <li><a href="cure.php">उपचार </a></li>
                                <li><a href="shed.php">खोर </a></li>
                                <?php
                                if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){

                                    if($_SESSION['role'] == 'admin'){
                                        $role = 'व्यवस्थापक';
                                    }
                                    else{
                                        $role = 'विशेषज्ञ';
                                    }
                                    ?>
                                    <li><a href="../views/user.php">प्रयोगकर्ता </a></li>

                                <?php } ?>
                            </ul>

<!--                        <div class="dropdown">-->
                            <ul class="nav navbar-nav pull-right dropdown">

                                    <li><a data-toggle="dropdown">स्वागत छ &nbsp;<?php echo $_SESSION["user_name"].' ['.$role.' ]'?> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="logout.php">लगआउट</a></li>
                                            <li><a href="javascript:changePassword()">पावोर्ड परिवर्तन गर्नुहोस्</a></li>
                                        </ul>
                                    </li>
                            </ul>
<!--                        </div>-->
                <?php
                    }
                    else{?>

                            <ul class="nav navbar-nav">
                            <li><a href="../views/home.php">गृह पृष्ठ</a></li>
                            <li><a href="../views/breedShow.php">प्रजाति पृष्ठ</a></li>
                            <li><a href="../views/foodShow.php">आहारा पृष्ठ</a></li>
                            <li><a href="../views/diseaseShow.php">रोग पृष्ठ</a></li>
                            <li><a href="../views/cureShow.php">उपचार पृष्ठ</a></li>
                            <li><a href="../views/shedShow.php">खोर पृष्ठ</a></li>
                            <li><a href="../views/qa.php">प्रश्नोत्तर</a></li>
                            <li><a href="../views/findDisease.php">रोग पत्ता लगाउनुहोस्</a></li>

                        </ul>
                        <?php
                    }
                ?>
                <ul class="nav navbar-nav pull-right">
                    <?php
                    if(!isset($_SESSION['email'])){?>
                        <li style="float: left; margin-right: 20px; cursor: pointer;"><a href="login.php">लग-इन गर्नुहोस्</a> </li>
                    <?php }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div style="height: 100px;"></div>
    </body>

<script>
    function changePassword(email) {
        alert(email);
    }
</script>
</html>