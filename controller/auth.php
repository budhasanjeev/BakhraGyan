<?php
/**
 * Created by PhpStorm.
 * User: sanjeevbudha
 * Date: 6/30/16
 * Time: 12:32 PM
 */
require("../common/Common.php");

session_start();
$objCommon = new Common();

if(isset($_POST['login'])){

    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);

    $result = array();

    $result = $objCommon->login($email,$password);

    if($result['message']=='success'){
        $_SESSION['id'] = $result['id'];
        $_SESSION['email']=$email;
        $_SESSION['user_name'] = $result['first_name'].' '.$result['last_name'];
        $_SESSION['role'] = $result['role'];
        header('Location:../views/dashboard.php');
    }
    else{
        header('Location:../views/login.php');
    }


}
else if(isset($_POST['mode'])){

    $password = $_POST['newPassword1'];
    $user_id = $_SESSION['id'];

    $result = array();
        
    $result = $objCommon->changePassword($password,$user_id);

   if($result){
       header('Location:../views/login.php');
   }else{
       header('Location:../views/dashboard.php');
   }
    
}