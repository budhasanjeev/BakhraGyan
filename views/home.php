<?php
/**
 * Created by PhpStorm.
 * User: sanjeev-budha
 * Date: 4/21/16
 * Time: 9:36 PM
 */

require('../config/databaseConnection.php');
require('../common/Common.php');
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
    </head>

    <body>
        <?php
            require('Layout/header.php');
        ?>
        <div id="content">

            <?php

                $newsList = array();
                $objCommon = new Common();
                $newsList = $objCommon->getNews();

                foreach($newsList as $news){

                     $id = $news["id"];

                echo '
                    <div id="left-news-content" class="row">

                        <div class="col-sm-4">
                            <img id="news-image" src="../Images/news_images/' .$news["image"].'" style="width: 50%">
                        </div>

                        <div class="col-md-8">
                            <h1>' .$news["news_headline"].'</h1>
                            <p>'.$news["news_body"].'</p>
                            <button id="news-button" type="button">Read</button>
                        </div>

                    </div>
                ';
                }
            ?>

        </div>
        <?php
            require('Layout/footer.php');
        ?>
    </body>

</html>