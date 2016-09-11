<?php
/**
 * Created by PhpStorm.
 * User: sanjeev-budha
 * Date: 4/23/16
 * Time: 11:11 PM
 */

session_start();
require('../common/Common.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>बाख्रा ज्ञान</title>
    <link rel="icon" href="../images/logo.png" type="image/gif" sizes="16x16">

    <link href="../css/bakhragyan.css" type="text/css" rel="stylesheet">

    <script src="../js/user.js" type="text/javascript"></script>

</head>

<body>
<?php
require('../views/Layout/header.php');
?>

<div id="container-size">


    <button class="btn btn-default" id="add-user"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;प्रयोगकर्ता थप्नुहोस</button>

    <hr>
    <?php

    $userList = array();
    $objCommon = new Common();
    $userList = $objCommon->getUser();

    ?>
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>फोटो</th>
            <th>नाम</th>
            <th>थर</th>
            <th>मोबिल नम्बर</th>
            <th>इमेल</th>
            <th>ठेगाना</th>
            <th>भूमिका</th>
            <th>कार्यहरु</th>
        </tr>
        </thead>

        <tbody>

        <?php

        foreach($userList as $user){

            ?>

            <tr>
                <td style="vertical-align: middle"><img class="img-circle" src="../images/<?php echo $user['image'] ?>" style="height: 70px;width:70px;"></td>
                <td style="vertical-align: middle;"><?php echo $user['first_name'] ?></td>
                <td style="vertical-align: middle;" id="first-name"><?php echo $user['last_name'] ?></td>
                <td style="vertical-align: middle;" id="last-name"><?php echo $user['mobile_number'] ?></td>
                <td style="vertical-align: middle;" id="mobile-number"><?php echo $user['email_address'] ?></td>
                <td style="vertical-align: middle;" id="phone-number"><?php echo $user['city'].', '.$user['district'].','.$user['zone'] ?></td>
                <td style="vertical-align: middle;" id="email-address">
                    <?php
                        if($user['role'] == 'admin'){
                            $role = 'व्यवस्थापक' ;
                        }
                        else{
                            $role = 'बिशेसज्ञ' ;
                        }

                        echo $role
                    ?>
                </td>
                <td style="vertical-align: middle;">
                    <button class="btn btn-default" title="EDIT" onclick="return editUser(<?php echo $user['id'] ?>);" title="EDIT"><i class="glyphicon glyphicon-edit"></i></button>
                    <button class="btn btn-default" title="DELETE" onclick="return deleteUser(<?php echo $user['id'] ?>)"><i class="glyphicon glyphicon-trash"></i></button>
                    <button class="btn btn-default" title="RESET" onclick="return resetPassword(<?php echo $user['id'] ?>)"><i class="glyphicon glyphicon-refresh"></i></button>
                </td>
            </tr>

        <?php } ?>

        </tbody>
    </table>

</div>


<?php
require('../views/Layout/footer.php');
?>


<div class="modal fade" id="insert-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title"></h2>
            </div>

            <div class="modal-body">

                <form class="form-horizontal" role="form" id="user-form" method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="mode" id="modes">
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="first_name">नाम</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="first_name" name="firstName" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="last_name">थर</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="last_name" name="lastName" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="mobile_number">मोबिल नम्बर</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="mobile_number" name="mobileNumber" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email_address">इमेल अड्ड्रेस</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email_address" name="emailAddress" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="city">टोल</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="city" name="city" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="zone">अंचल</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="zone" name="zone" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="city">जिल्ला</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="district" name="district" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="role">भूमिका</label>
                        <div class="col-sm-8">
                            <select id="role" id='role' name="role" class="form-control">
                                <option value="#">--- भूमिका रोज्नुहोस् ---</option>
                                <option value="admin">व्यवस्थापक</option>
                                <option value="expert">विशेषज्ञ</option>
                            </select>
                        </div>
                    </div>

                    <div id="profile-img" class="form-group">
                        <label class="control-label col-sm-4" for="profile-picture">फोटो</label>

                        <div class="col-sm-8">
                            <input type="file" id="profile-picture" name="profileImage" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4"></label>

                        <div class="col-sm-8">
                            <button type="submit"></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
    $('#add-user').click(function(){
        $('#insert-user').modal('show');
        $('#insert-user .modal-title').html("प्रयोगकर्ता थप्नुहोस");
        $('#insert-user button[type=submit]').html("पेश गर्नुहोस्");
        $('#user-form').attr('action','../Controller/userHandler.php');
        $('#modes').attr('value','add');

    });

</script>
</body>
</html>