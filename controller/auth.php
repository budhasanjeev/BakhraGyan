<?php
/**
 * Created by PhpStorm.
 * User: sanjeevbudha
 * Date: 6/30/16
 * Time: 12:32 PM
 */
require("../config/databaseConnection.php");
require("../common/Common.php");

session_start();

if(isset($_POST['login'])){

    $objCommon = new Common();

    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);

    $result = array();

    $result = $objCommon->login($connection,$email,$password);

    if($result['message']=='success'){
        $_SESSION['email']=$email;
        header('Location:../views/dashboard.php');
    }
    else{
        header('Location:../views/login.php');
    }

}
else{

    echo "<script>alert('hello')</script>";
}