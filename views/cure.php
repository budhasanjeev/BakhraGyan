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
    <title>कृषि सुझाब</title>
    <script src="../js/cure.js" type="text/javascript"></script>
</head>

<body>
<?php
require('../views/Layout/header.php');
?>

<div id="content">
    <button class="btn btn-primary" id="add-cure"> उपचार बारेमा थप्नुहोस </button>
    <?php

    $cureList = array();
    $objCommon = new Common();
    $cureList = $objCommon->getCure();
    ?>


    <table class="table table-striped table-responsive" id="cure-table">
        <thead>
        <tr>
            <th>रोगको नाम</th>
            <th>निवारक हेरविचार</th>

        </tr>
        </thead>

        <tbody>
        <?php
        foreach($cureList as $cure){
            $disease = $objCommon->getdiseaseNameById($cure['disease_id']);

        ?>

            <tr>
                <td style="vertical-align: middle;"><?php echo $disease['disease_name'] ?><span class="glyphicon glyphicon-info-sign pull-right" onclick="detail(<?php echo $cure['disease_id'] ?>)"></span> </td>
                <td style="vertical-align: middle;"><?php echo $cure["preventive_care"]?></td>
                <td style="vertical-align: middle;">
                    <button class="btn btn-danger" onclick="return deleteCure(<?php echo $cure['id']?>)"><span class="glyphicon glyphicon-trash"></span></button>
                    <button class="btn btn-success" onclick="return editCure(<?php echo $cure['id'] ?>)"><span class="glyphicon glyphicon-edit"></span></button>
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

<div class="modal fade" id="insert-cure" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title"></h2>
            </div>

            <div class="modal-body">

                <form class="form-horizontal" role="form" id="cure-form" method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="mode" id="mode">
                    <input type="hidden" name="cure_id" id="cure_id">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="breedName">Disease Name</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="diseaseName" name="disease_id">
                                <?php

                                $diseaseList = $objCommon->getDisease();

                                foreach($diseaseList as $disease){
                                    ?>

                                    <option value="<?php echo $disease['id']?>" ><?php echo $disease['disease_name']?></option>

                                <?php } ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="preventive">Preventive measures</label>

                        <div class="col-sm-8">
                            <textarea type="text" class="form-control" id="preventive" name="preventive" style="width: 100%;height:250px"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="image"></label>
                        <button type="submit" class="btn btn-default" id="save-cure"></button>
                    </div>
                </form>

            </div>

            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>

<script>
    $('#add-cure').on('click',function(){

        $('#insert-cure').modal('show');
        $('#insert-cure .modal-title').html("Cure");
        $('#insert-cure button[type=submit]').html("Add");
        $('#cure-form').attr('action','../controller/cureHandler.php');
        $('#mode').attr('value','add');

    })


    $(document).ready(function(){
        $('#cure-table').DataTable({
            "info":true,
            "paging":true,
            "ordering":false,
            "lengthMenu":[[2,4,6,-1],[2,4,6,"All"]]
        })
    })
</script>
</body>
</html>

