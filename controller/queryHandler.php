<?php
/**
 * Created by PhpStorm.
 * User: Arun Tamang
 * Date: 8/21/2016
 * Time: 7:10 PM
 */

require('../common/Common.php');
session_start();
$objCommon = new Common();

if(isset($_POST['mode'])){







    if($_POST['mode'] == 'farmerQuestion'){
        $fullName = $_POST['fullName'];
        $phoneNumber = $_POST['phoneNumber'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $query = $_POST['query'];

        $result = array();
        $result = $objCommon->createQuery($fullName,$phoneNumber,$email,$address,$query);

        $_SESSION['farmerQuery']  = $result['message'];
        header("Location:../views/home.php");
    }

    if($_POST['mode']=='delete'){

        $id = $_POST['id'];

        $result = array();

        $result = $objCommon->deleteQuery($id);

        echo json_encode($result);
        
    }

    if($_POST['mode']=='reply'){

        $id = $_POST['query_id'];
        $reply= $_POST['reply'];

        $replyFrom = $_SESSION['email'];
        $result = array();

        $result = $objCommon->replyQuery($id,$reply,$replyFrom);
        
        if($result['message']=='success'){
            header('Location:../views/dashboard.php');
        }
    }

    if($_POST['mode']=='show'){

        $id = $_POST['id'];

        $result = array();

        $result = $objCommon->getReplyList($id);

        echo json_encode($result);
    }
}