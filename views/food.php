<?php
/**
 * Created by PhpStorm.
 * User: sanjeev-budha
 * Date: 4/21/16
 * Time: 11:50 PM
 */
session_start();
require('../common/Common.php');

if(!isset($_SESSION['email'])){
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>बाख्रा ज्ञान</title>
    <meta charset="utf-8">
    <link rel="icon" href="../images/logo.png" type="image/gif" sizes="16x16">

    <script src="../js/feed.js"></script>
    <link href="../css/bakhragyan.css" type="text/css" rel="stylesheet">

</head>

<body>
<?php
require('../views/Layout/header.php');
?>

<div id="container-size">
    <button class="btn btn-primary" id="add-food">आहारा बारेमा थप्नुहोस </button>
    <hr>
    <?php

    $foodList = array();
    $objCommon = new Common();
    $foodList = $objCommon->getFood();?>


    <table class="table table-striped table-responsive" id="food-table">
        <thead>
        <tr>
            <th>खानाको नाम </th>
            <th>विवरण</th>
            <th>फोटो</th>
            <th>कार्यहरू</th>
        </tr>
        </thead>

        <tbody>

        <?php
        foreach($foodList as $food){?>

        <tr>
            <td><img class="img-circle" src="../images/<?php echo $food["image"] ?>" style="height: 70px;width:70px;" ></td>
            <td style="vertical-align: middle;"><?php echo $food["title"]?></td>
            <td style="vertical-align: middle;"><?php echo $food["description"]?></td>
            <td style="vertical-align: middle;">
                <button class="btn btn-danger" onclick="return deleteFood(<?php echo $food['id']?>)"><span class="glyphicon glyphicon-trash"></span></button>
                <button class="btn btn-success" onclick="return editFood(<?php echo $food['id'] ?>)"><span class="glyphicon glyphicon-edit"></span></button>
            </td>
        </tr>

        <?php
        }
?>
        </tbody>
    </table>
</div>

<?php
require('../views/Layout/footer.php');
?>

<div class="modal fade" id="insert-food" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title"></h2>
            </div>

            <div class="modal-body">

                <form class="form-horizontal" role="form" id="food-form" method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="mode" id="mode">
                    <input type="hidden" name="food_id" id="food_id">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="feedName">खानाको नाम</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="feedName" name="feedName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="description">विवरण</label>
                        <div class="col-sm-8">
                            <textarea type="text" class="form-control" id="description" name="description" style="width: 100%;height:250px"></textarea>
                        </div>
                    </div>

                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4" for="image">फोटो</label>

                        <input type="file" id="image" name="image" >
                    </div>

                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4"></label>
                        <button type="submit" class="btn btn-default" id="save-food"></button>
                    </div>
                </form>

            </div>

            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>

<script>
    $('#add-food').on('click',function(){

        $('#insert-food').modal('show');
        $('#insert-food .modal-title').html("आहारा थप्नुहोस");
        $('#insert-food button[type=submit]').html("पेश गर्नुहोस्");
        $('#food-form').attr('action','../controller/foodHandler.php');
        $('#mode').attr('value','add');

    });


    $(document).ready(function(){
        $('#food-table').DataTable({
            "info":true,
            "paging":true,
            "ordering":false,
            "lengthMenu":[[3,6,9,-1],[3,6,9,"All"]]
        })
    })

</script>
</body>
</html>

