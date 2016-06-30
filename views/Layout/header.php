<?php
/**
 * Created by PhpStorm.
 * User: sanjeev-budha
 * Date: 4/21/16
 * Time: 9:44 PM
 */
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>कृषि सुझाब</title>
        <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="../css/news.css" type="text/css" rel="stylesheet">

        <script src="../js/jquery-1.12.0.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/news.js" type="text/javascript"></script>
        <script src="../js/login.js" type="text/javascript"></script>
        <script src="../js/custom.js" type="text/javascript"></script>
        <script></script>
    </head>

    <body>
    <header class="container-fluid">
        <a href="../home.php"><img src="../images/krishisujhab.png" style="height: 70px;" title="DWIT NEWS"></a>
        <ul style="list-style: none; float: right; padding-top: 2%; position: relative; margin-right: 2%;">
            <?php
                if($_SESSION['id']){?>
                    <li style="float: left; margin-right: 20px; cursor: pointer;"><a href="../../controller/logout.php">बाहिर निस्कनुहोस</a> </li>
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
                    if($_SESSION['id']){?>

                            <ul class="nav navbar-nav">
                                <li><a href="../views/dashboard.php">Home</a></li>
                                <li>
                                    <a href="../views/user.php">User Management</a>
                                </li>

                                <li>
                                    <a href="../views/news.php">News Management</a>
                                </li>

                            </ul>

                            <ul class="nav navbar-nav pull-right">
                                <li><a>Welcome &nbsp;<?php echo $_SESSION["first_name"]?>&nbsp<?php echo $_SESSION["last_name"]?></a></li>
                            </ul>
                <?php
                    }
                    else{?>

                            <ul class="nav navbar-nav">
                            <li><a>गृह पृष्ठ</a></li>
                            <li><a>प्रजाति पृष्ठ</a></li>
                            <li><a>आहारा पृष्ठ</a></li>
                            <li><a>रोग पृष्ठ</a></li>
                            <li><a>उपचार पृष्ठ</a></li>
                            <li><a>खोर पृष्ठ</a></li>
                            <li><a>जिज्ञास पृष्ठ</a></li>
                        </ul>
                        <?php
                    }
                ?>
            </div>
        </div>
    </nav>
    </body>
</html>