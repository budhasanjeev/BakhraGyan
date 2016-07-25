<?php
/**
 * Created by PhpStorm.
 * User: sanjeev-budha
 * Date: 4/21/16
 * Time: 9:36 PM
 */

require('../common/Common.php');


if(isset($_SESSION['email'])){
    header("Location:dashboard.php");
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>कृषि सुझाब</title>
    </head>

    <body>
        <?php
            require('Layout/header.php');
        ?>
        <div id="content">
            <div class="col-sm-8">
                <h1>Welcome To Bakhragyan</h1><br>
                <h4>Welcome to the world of GoatGyan bringing all information related to goat farming at one point.
                At present we can see that government has now tightened the policy and consolidating action plan
                for the development of small ruminant production in India. XII five year plan clearly pave the
                way for overall upliftment of this sector through the implementation of newer technology.
                Keeping future trends in mind and after assessment of present status of commercial goat
                farming in India this comprehensive knowledge portal is being designed. The main purpose
                of this knowledge forum is to provide first hand scientific information in a lucid and
                easily understandable form to the new entrepreneurs and farmers. Creation of healthy knowledge
                community including emerging entrepreneurs and goat farming experts will add more value to this
                concept. We hope that this goat farming knowledge portal will help in integrating fragmented
                goat industry and create awareness among the people about intensive goat farming.</h4>
            </div>

            <div class="col-sm-4">

                <fieldset>
                    <legend> जिज्ञास </legend>
                </fieldset>
                <form class="form-horizontal" role="form" id="food-form" method="post" action="../controller/queryHandler" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="fullName">Full Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="fullName" name="fullName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="phoneNumber">Phone Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                        </div>
                    </div>

                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4" for="email">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" >
                        </div>
                    </div>

                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4">Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                    </div>
                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4">Query</label>
                        <div class="col-sm-8">
                            <textarea type="text" class="form-control" id="query" name="query" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4"></label>
                        <div class="col-sm-8">
                            <input type="submit" class="btn btn-primary" value="submit"/>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <?php
            require('Layout/footer.php');
        ?>
    </body>

</html>