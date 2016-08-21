<?php
/**
 * Created by PhpStorm.
 * User: Arun Tamang
 * Date: 8/21/2016
 * Time: 7:10 PM
 */

require('../common/Common.php');

if(isset($_POST['mode'])){

    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $query = $_POST['query'];

    $result = array();
    $result = $objCommon->createQuery($fullName,$phoneNumber,$email,$address,$query);

    echo json_encode($result);
}