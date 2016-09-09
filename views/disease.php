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
    <link rel="icon" href="../images/logo.png" type="image/gif" sizes="16x16">
    <meta charset="utf-8">
    <script src="../js/disease.js"></script>
    <link href="../css/bakhragyan.css" type="text/css" rel="stylesheet">

</head>

<body>
<?php
require('../views/Layout/header.php');
?>

<div id="container-size">
    <button class="btn btn-default" id="add-disease">रोगको बारेमा थप्नुहोस </button>
    <hr>
    <?php

        $diseaseList = array();
        $objCommon = new Common();
        $diseaseList = $objCommon->getDisease();

    ?>


    <table class="table table-striped table-responsive" id="disease-table">
        <thead>
        <tr>
            <th> फोटो </th>
            <th> नाम </th>
            <th> विवरण </th>
            <th>कार्यहरू</th>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach($diseaseList as $disease){?>


            <tr>
                <td><img class="img-circle" src="../images/<?php echo $disease["picture"]?>" style="height: 70px;width:70px;"></td>
                <td style="vertical-align: middle;"><?php echo $disease["disease_name"] ?></td>
                <td style="vertical-align: middle;"><?php echo $disease["description"] ?></td>
                <td style="vertical-align: middle;">
                    <button class="btn btn-default" onclick="return deleteDisease(<?php echo $disease['id']?>)"><span class="glyphicon glyphicon-trash"></span></button>
                    <button class="btn btn-default" onclick="return editDisease(<?php echo $disease['id'] ?>)"><span class="glyphicon glyphicon-edit"></span></button>
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

<div class="modal fade" id="insert-disease" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title"></h2>
            </div>

            <div class="modal-body">

                <form class="form-horizontal" role="form" id="disease-form" method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="mode" id="disease_mode">
                    <input type="hidden" name="disease_id" id="disease_id">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="diseaseName" >रोगको नाम</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="diseaseName" name="diseaseName" onchange="checkDuplicate('diseaseName','diseaseHandler.php','diseaseName_span')" required="">
                            <span id="diseaseName_span" style="display: none">रोगको नाम पहिला नै राखिएको छ</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="description">विवरण</label>
                        <div class="col-sm-8">
                            <textarea type="text" class="form-control" id="description" required="" name="description" style="width: 100%;height:250px"></textarea>
                        </div>
                    </div>

                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4" for="image">फोटो</label>

                        <input type="file" id="image" name="image" required="">
                    </div>

                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4"></label>
                        <button type="submit" class="btn btn-default" id="save-disease"></button>
                    </div>
                </form>

            </div>

            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>

<script>
    $('#add-disease').on('click',function(){

        $('#insert-disease').modal('show');
        $('#insert-disease .modal-title').html("रोग थप्नुहोस");
        $('#insert-disease button[type=submit]').html("पेश गर्नुहोस्");
        $('#disease-form').attr('action','../controller/diseaseHandler.php');
        $('#disease_mode').attr('value','add');

    });


    $(document).ready(function(){
        $('#disease-table').DataTable({
            "info":true,
            "paging":true,
            "ordering":false,
            "lengthMenu":[[3,6,9,-1],[3,6,9,"All"]]
        })
    })

</script>
</body>
</html>

