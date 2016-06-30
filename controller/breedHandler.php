<?php
/**
 * Created by PhpStorm.
 * User: sanjeev-budha
 * Date: 4/24/16
 * Time: 2:31 AM
 */

require('../common/Common.php');
require('../config/databaseConnection.php');

$objCommon = new Common();

if($_POST["mode"]=="add"){

    $breed_name = $_POST['breedName'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $searchKeyword = $_POST['searchKeyword'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_tmp,"../images/$image");

    $result;

    $result = $objCommon->createBreed($connection,$category,$breed_name,$description,$image,$searchKeyword);

    if($result['message']='success'){
        $_SESSION['add'] ="success";
    } else {
        $_SESSION['add'] ="error";
    }

    echo $result;
    /*header('Location:../views/breed.php');*/
}

if($_POST["mode"]=="edit"){

    $id = $_POST['user_id'];
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $mobile_number = $_POST['mobileNumber'];
    $phone_number = $_POST['phoneNumber'];
    $address = $_POST['addresses'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $email_address = $_POST['emailAddress'];

    $result = array();
    $result = $objCommon->updateUser($first_name,$last_name,$mobile_number,$phone_number,$address,$role,$status,$email_address,$id);

    if($result['message']=='success'){
        $_SESSION['edit'] ="success";
    } else {
        $_SESSION['edit'] ="error";
    }

    header('Location:../views/user.php');
}

if($_POST["mode"]=="delete"){

    $id = $_POST['id'];

    $responseArray = array();

    $responseArray = $objCommon->deleteUser($id);

   /* if($result){
        $responseArray['message'] ="success";
    } else {
        $responseArray['message'] ="error";
    }*/

    echo json_encode($responseArray);
}
if($_POST["mode"]=="view"){

    $id = $_POST['id'];

    $responseArray = array();

    $responseArray["user"] = $objCommon->viewProfile($id);

    $responseArray["news"] = $objCommon->selectNewsByUser($id);

    echo json_encode($responseArray);

}