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
</head>

<body>
<?php
require('../views/Layout/header.php');
?>

<div id="content">
    <button class="btn btn-primary" id="add-breed"> उपचार बारेमा थप्नुहोस </button>
    <?php

    $userList = array();
    $objCommon = new Common();
    $userList = $objCommon->getBreed($connection);


    echo '
                <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>रोगको नाम </th>
                                <th>विवरण तथा लक्षण </th>
                                <th>निवारक हेरविचार</th>
                           

                            </tr>
                        </thead>

                        <tbody>';

    foreach($userList as $user){

        if($user['status']==0){
            $status = "Inactive";
        }
        else {
            $status = "Active";
        }

        echo '
                    <tr>
                        <td><img class="img-circle" src="../images/profile_pictures/' .$user["profile_picture"].'" style="height: 70px;width:70px;" onclick="profileView('.$user["id"].')"></td>
                        <td style="vertical-align: middle;">'.$user["first_name"].'&nbsp;'.$user["last_name"].'</td>
                        <td style="vertical-align: middle;">'.$user["mobile_number"].'</td>
                        <td style="vertical-align: middle;">'.$user["phone_number"].'</td>
                        <td style="vertical-align: middle;">'.$user["email_address"].'</td>
                        <td style="vertical-align: middle;">'.$user["role"].'</td>
                        <td style="vertical-align: middle;">'.$status.'</td>
                    </tr>

                ';
    }

    echo'
                    </tbody>
                </table>
            ';

    ?>
</div>

<?php
require('../views/Layout/footer.php');
?>

<div class="modal fade" id="view_profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog" style="width: auto">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"></h3>
            </div>

            <div class="modal-body">

                <div class="container">

                    <div class="col-md-3" style="border-right: 1px solid #226CB5;" data-spy="affix" data-offset-top="60" data-offset-bottom="200">
                        <div class="row profile-pic">
                            <img style="width: 60%; height: 40%" src="">
                        </div>
                        <div class="row profile-table">
                            <h2 id="fullName"></h2>
                            <hr/>
                            <table cellpadding="1">
                                <tr>
                                    <td><span class="glyphicon glyphicon-home"></span></td>
                                    <td><h5 id="address"></h5></td>
                                </tr>

                                <tr>
                                    <td><span class="glyphicon glyphicon-earphone"></span></td>
                                    <td><h5 id="mobileNumber"></h5></td>
                                </tr>

                                <tr>
                                    <td><span class="glyphicon glyphicon-phone-alt"></span></td>
                                    <td><h5 id="phoneNumber"></h5></td>
                                </tr>

                                <tr>
                                    <td><span class="glyphicon glyphicon-envelope"></span></td>
                                    <td><h5 id="emailAddress"></h5></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-8" style="float: right;">

                        <div class="tab-content">
                            <div id="history" class="tab-pane fade in active">
                                <h3>News History</h3>
                                <table id="newsList" style="text-align: left;" class="table table-bordered table-responsive">
                                    <thead>
                                    <tr>
                                        <td>S.N</td>
                                        <th>News headline</th>
                                        <th>Created Date</th>
                                        <th>Last Updated Date</th>
                                    </tr>
                                    </thead>
                                    <tbody id="newsListBody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
</body>
</html>

