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
                </form>

            </div>
        </div>
        <?php
            require('Layout/footer.php');
        ?>
    </body>

</html>