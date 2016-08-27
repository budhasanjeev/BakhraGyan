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
    <link href="../css/bakhragyan.css" type="text/css" rel="stylesheet">

    <script src="../js/user.js" type="text/javascript"></script>

</head>

<body>
<?php
require('../views/Layout/header.php');
?>

<div id="container-size">


    <button class="btn btn-default" id="add-user"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Add User</button>

    <hr>
    <?php

    $userList = array();
    $objCommon = new Common();
    $userList = $objCommon->getUser();

    ?>
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>Photo</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Mobile Number</th>
            <th>Email Address</th>
            <th>Address</th>
            <th>Role</th>
            <th>Actions</th>
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
                        <td style="vertical-align: middle;" id="email-address"><?php echo $user['role']?></td>
                        <td style="vertical-align: middle;">
                            <button class="btn btn-primary" onclick="return editUser(<?php echo $user['id'] ?>);" title="EDIT"><i class="glyphicon glyphicon-edit"></i></button>
                            <button class="btn btn-danger" title="DELETE" onclick="return deleteUser(<?php echo $user['id'] ?>)"><i class="glyphicon glyphicon-trash"></i></button>
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
                    <input type="hidden" name="mode" id="mode">
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="first_name">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="first_name" name="firstName" placeholder="Enter First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="last_name">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="last_name" name="lastName" placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="mobile_number">Mobile Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mobile_number" name="mobileNumber" placeholder="Enter Mobile Number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email_address">Email Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email_address" name="emailAddress" placeholder="Enter Email Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="city">City</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="zone">Zone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="zone" name="zone" placeholder="Enter Zone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="city">District</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="district" name="district" placeholder="Enter district">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="role">Role</label>
                        <div class="col-sm-8">
                            <select id="role" name="role" class="form-control">
                                <option value="#">---Select Role---</option>
                                <option value="admin">ADMIN</option>
                                <option value="expert">EXPERT</option>
                            </select>
                        </div>
                    </div>

                    <div id="profile-img" class="form-group">
                        <label class="control-label col-sm-4" for="profile-picture">Profile Picture</label>

                        <div class="col-sm-8">
                            <input type="file" id="profile-picture" name="profileImage">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4"></label>

                        <div class="col-sm-8">
                            <input type="submit" value="Submit">
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
        $('#insert-user .modal-title').html("Add New User");
        $('#insert-user button[type=submit]').html("Save User");
        $('#user-form').attr('action','../Controller/userHandler.php');
        $('#mode').attr('value','add');

    });

</script>
</body>
</html>