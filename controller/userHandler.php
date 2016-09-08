<?php
/**
 * Created by PhpStorm.
 * User: Arun Tamang
 * Date: 8/23/2016
 * Time: 10:55 AM
 */

require('../common/Common.php');
require_once('../PHPMailer-master/PHPMailerAutoload.php');

$objCommon = new Common();

if(isset($_POST['mode'])){

    if($_POST['mode']=='delete'){

        $id = $_POST['id'];
        $result = array();
        $result = $objCommon->deleteUser($id);

        echo json_encode($result);
    }

    else if($_POST['mode']=='add'){

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $mobileNumber = $_POST['mobileNumber'];
        $emailAddress = $_POST['emailAddress'];
        $city = $_POST['city'];
        $zone = $_POST['zone'];
        $district = $_POST['district'];
        $role = $_POST['role'];

        $image = $_FILES['profileImage']['name'];
        $image_tmp = $_FILES['profileImage']['tmp_name'];

        move_uploaded_file($image_tmp,"../images/$image");


        $result = array();
        $result = $objCommon->createUser($firstName,$lastName,$mobileNumber,$emailAddress,$city,$zone,$district,$role,$image);

        if($result['message']=='success'){

            header('Location:../views/user.php');
        }

    }

    else if($_POST['mode']=='edit'){

        $id = $_POST['id'];

        $result = array();
        $result = $objCommon->editUser($id);

        echo json_encode($result);
    }

    else if($_POST['mode']=='update') {

        $id = $_POST['user_id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $mobileNumber = $_POST['mobileNumber'];
        $emailAddress = $_POST['emailAddress'];
        $city = $_POST['city'];
        $zone = $_POST['zone'];
        $district = $_POST['district'];
        $role = $_POST['role'];

        $image = $_FILES['profileImage']['name'];
        $image_tmp = $_FILES['profileImage']['tmp_name'];

        move_uploaded_file($image_tmp, "../images/$image");


        $result = array();
        $result = $objCommon->updateUser($firstName, $lastName, $mobileNumber, $emailAddress, $city, $zone, $district, $role, $image,$id);

        if($result['message'] == 'success') {
            header("Location:../views/user.php");
        }
    }
    
    else if(isset($_POST['mode'])=='resetPassword'){
        
        $id = $_POST['id'];
        
        $result = array();
        
        $result = $objCommon->resetPassword($id);

        echo json_encode($result);
    }
}