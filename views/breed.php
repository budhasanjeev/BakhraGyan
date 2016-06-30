<?php
/**
 * Created by PhpStorm.
 * User: sanjeev-budha
 * Date: 4/21/16
 * Time: 11:50 PM
 */
session_start();
require('../config/databaseConnection.php');
require('../common/Common.php');

if(!$_SESSION['email']){
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>कृषि सुझाब</title>
    <script src="../js/breed.js"></script>
</head>

<body>
<?php
require('../views/Layout/header.php');
?>

<div id="content">

    <button class="btn btn-primary" id="add-breed">प्रजाति बारेमा  थप्नुहोस</button>
    <?php

    $breedList = array();
    $objCommon = new Common();
    $breedList = $objCommon->getBreed($connection)?>



    <table class="table table-striped table-responsive" id="breed-table">
        <thead>
        <tr>
            <th>फोटो</th>
            <th>प्रजाति नाम</th>
            <th>विवरण</th>
            <th>वर्ग</th>
            <th>कार्यहरू</th>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach($breedList as $breed){?>


            <tr>
                <td><img class="img-circle" src="../images/<?php echo $breed["image"] ?>" style="height: 70px;width:70px;"></td>
                <td style="vertical-align: middle;"><?php echo $breed["breed_name"] ?></td>
                <td style="vertical-align: middle;"><?php echo $breed["description"]?></td>
                <td style="vertical-align: middle;"><?php echo $breed["category"]?></td>
                <td style="vertical-align: middle;">
                    <button class="btn btn-danger" onclick="return deleteBreed(<?php echo $breed['id']?>)"><span class="glyphicon glyphicon-trash"></span></button>
                    <button class="btn btn-success" onclick="return editBreed(<?php echo $breed['id'] ?>)"><span class="glyphicon glyphicon-edit"></span></button>
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

<div class="modal fade" id="insert-breed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title"></h2>
            </div>

            <div class="modal-body">

                <form class="form-horizontal" role="form" id="breed-form" method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="mode" id="mode">
                    <input type="hidden" name="breed_id" id="breed_id">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="breedName">Breed Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="breedName" name="breedName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="description">Description</label>
                        <div class="col-sm-8">
                            <textarea type="text" class="form-control" id="description" name="description" style="width: 100%;height:250px"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="category">Category</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="category" name="category">
                                <option value="Dairy">Dairy</option>
                                <option value="Meat">Meat</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4" for="search_keyword">Search Keywords</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="search_keyword" name="searchKeyword" placeholder="Enter Search Keywords">
                        </div>
                    </div>

                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4" for="image">image</label>

                        <input type="file" id="image" name="image" >
                    </div>

                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4" for="image"></label>
                        <button type="submit" class="btn btn-default" id="save-breed"></button>
                    </div>
                </form>

            </div>

            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>

<script>
    $('#add-breed').on('click',function(){

        $('#insert-breed').modal('show');
        $('#insert-breed .modal-title').html("Breed");
        $('#insert-breed button[type=submit]').html("Add");
        $('#breed-form').attr('action','../controller/breedHandler.php');
        $('#mode').attr('value','add');

    })


    $(document).ready(function(){
        $('#breed-table').DataTable({

        })
    })
</script>
</body>
</html>

