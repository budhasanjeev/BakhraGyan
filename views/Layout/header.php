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
        <link href="/css/news.css" rel="stylesheet" type="text/css">
    </head>

    <body>
    <header class="container-fluid">
        <img src="../images/krishisujhab.png" style="height: 70px;" title="DWIT NEWS">
        <ul style="list-style: none; float: right; padding-top: 2%; position: relative; margin-right: 2%;">
            <?php
                if($_SESSION['id']){
                    echo'<li style="float: left; margin-right: 20px; cursor: pointer;"><a href="../controller/logout.php">बाहिर निस्कनुहोस</a> </li>';
                }
            else{
                echo' <li style="float: left; margin-right: 20px; cursor: pointer;"><a data-toggle="modal" data-target="#login">लग-इन गारनुहोस</a> </li>';
            }
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
                    if($_SESSION['id']){
                        echo '
                            <ul class="nav navbar-nav">
                                <li><a href="../views/dashboard.php">Home</a></li>
                                <li>
                                    <!--<div class="dropdown">
                                        <a href="#"><button class="dropbtn">User Management</button></a>
                                        <div class="dropdown-content">
                                        <a href="#">Add User</a>
                                        <a href="#">Admin</a>
                                        <a href="#">Editor</a>
                                        <a href="#">Reporter</a>
                                      </div>
                                    </div>-->
                                    <a href="../views/user.php">User Management</a>
                                </li>
                                <li><!--<div class="dropdown">
                                        <button class="dropbtn">News Management</button>
                                        <div class="dropdown-content">
                                        <a href="#">Add News</a>
                                        <a href="#">Sports</a>
                                        <a href="#">Social News</a>
                                        <a href="#">Club Activities</a>
                                      </div>
                                    </div>-->
                                    <a href="../views/news.php">News Management</a>
                                </li>

                            </ul>

                            <ul class="nav navbar-nav pull-right">
                                <li><a>Welcome &nbsp;'.$_SESSION["first_name"].'&nbsp;'.$_SESSION["last_name"].'</a></li>
                            </ul>
                            ';


                    }
                    else{
                        echo'
                            <ul class="nav navbar-nav">
                            <li><a>गृह पृष्ठ</a></li>
                            <li><a>प्रजाति पृष्ठ</a></li>
                            <li><a>आहारा पृष्ठ</a></li>
                            <li><a>रोग पृष्ठ</a></li>
                            <li><a>उपचार पृष्ठ</a></li>
                            <li><a>खोर पृष्ठ</a></li>
                            <li><a>जिज्ञास पृष्ठ</a></li>
                        </ul>
                        ';
                    }
                ?>
            </div>
        </div>
    </nav>


    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header" style="background-color: #0F5288">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="news-text">लग - इन</h3>
                </div>

                <div class="modal-body">

                    <form class="form-horizontal" role="form" id="login-form">

                        <div class="alert alert-danger" id="error-login" hidden="true"><p>Invalid username or/and password</p></div>

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
                                <button class="btn btn-default" onclick="return loginCheck()"><span class="glyphicon glyphicon-check"/>थिच्नुहोस</button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="modal-footer" style="background-color: #0F5288">
                    <p class="news-text">पासवर्ड भुल्नु भयो?ठीक छ &nbsp;&nbsp;<button class="btn btn-success">यहाँ पुन: प्राप्त</button></p>
<!--                    <p class="news-text">Don't Have an account?<button class="btn btn-danger">Register Now</button></p>-->
                </div>

            </div>
        </div>
    </div>

    </body>
</html>