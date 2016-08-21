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
        <link href="../../css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

        <script src="../js/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="../js/jquery.noty.packaged.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/login.js" type="text/javascript"></script>
        <script src="../js/custom.js" type="text/javascript"></script>
        <script src="../js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script></script>
    </head>

    <body>
    <header class="container-fluid">
        <a href="home.php"><img src="../images/krishisujhab.png" style="height: 70px;" title="bakhra-gyan"></a>
        <ul style="list-style: none; float: right; padding-top: 2%; position: relative; margin-right: 2%;">
            <?php
                if(isset($_SESSION['email'])){?>
                    <li style="float: left; margin-right: 20px; cursor: pointer;"><a href="logout.php">बाहिर निस्कनुहोस</a> </li>
               <?php }
            else{?>
                <li style="float: left; margin-right: 20px; cursor: pointer;"><a href="login.php">लग-इन गारनुहोस</a> </li>
            <?php }
            ?>
        </ul>
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
                            </ul>

                            <ul class="nav navbar-nav pull-right" >
                                <li><a>Welcome &nbsp;<?php echo $_SESSION["email"]?></a>

                                </li>
                            </ul>
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
                        </ul>
                        <?php
                    }
                ?>
            </div>
        </div>
    </nav>
    </body>
</html>