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
    <script src="../js/shed.js"></script>
    <link rel="icon" href="../images/logo.png" type="image/gif" sizes="16x16">

    <link href="../css/bakhragyan.css" type="text/css" rel="stylesheet">

</head>

<body>
<?php
require('../views/Layout/header.php');
?>

<div id="container-size">

    <button class="btn btn-primary" id="add-shed"> खोर बारेमा थप्नुहोस  </button>
    <hr>
    <?php

    $shedList = array();
    $objCommon = new Common();
    $shedList = $objCommon->getShed();
    ?>
    <table class="table table-striped table-responsive" id="shed-table">
        <thead>
        <tr>
            <th>फोटो</th>
            <th>शीर्षक </th>
            <th>विवरण</th>
            <th>कार्यहरू</th>
        </tr>
        </thead>


    <tbody>
        <?php
        foreach($shedList as $shed){?>


            <tr>
                <td><img class="img-circle" src="../images/<?php echo $shed["photo"] ?>" style="height: 70px;width:70px;">
                <td style="vertical-align: middle;"><?php echo $shed["title"]?></td>
                <td style="vertical-align: middle;"><?php echo $shed["description"]?></td>
                <td style="vertical-align: middle;">
                    <button class="btn btn-default" onclick="return deleteShed(<?php echo $shed['id'] ?>)"><span class="glyphicon glyphicon-trash"></span></button>
                    <button class="btn btn-default" onclick="return editShed(<?php echo $shed['id'] ?>)"><span class="glyphicon glyphicon-edit"></span></button>
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

<div class="modal fade" id="insert-shed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title"></h2>
            </div>

            <div class="modal-body">

                <form class="form-horizontal" role="form" id="shed-form" method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="mode" id="modes">
                    <input type="hidden" name="shed_id" id="shed_id">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="shedTitle">शिर्षक</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="shedTitle" name="shedTitle" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="description"> विवरण </label>

                        <div class="col-sm-8">
                            <textarea type="text" class="form-control" id="description" name="description" style="width: 100%;height:250px" required=""></textarea>
                        </div>
                    </div>

                    <div id="shed-img" class="form-group">
                        <label class="control-label col-sm-4" for="image"> फोटो </label>

                        <input type="file" id="image" name="image" required="">
                    </div>

                    <div class="form-group">
                        <label  class="control-label col-sm-4"></label>
                        <button type="submit" class="btn btn-default" id="save-shed"></button>
                    </div>
                </form>

            </div>

            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>

<script>
    $('#add-shed').on('click',function(){

        $('#insert-shed').modal('show');
        $('#insert-shed .modal-title').html("खोर थप्नुहोस");
        $('#insert-shed button[type=submit]').html("पेश गर्नुहोस्");
        $('#shed-form').attr('action','../controller/shedHandler.php');
        $('#modes').attr('value','add');

    })


    $(document).ready(function(){
        $('#shed-table').DataTable({
            "info":true,
            "paging":true,
            "ordering":false,
            "lengthMenu":[[3,6,9,-1],[3,6,9,"All"]]
        })
    })
</script>
</body>
</html>

