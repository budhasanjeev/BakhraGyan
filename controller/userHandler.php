<?php
/**
 * Created by PhpStorm.
 * User: Arun Tamang
 * Date: 8/23/2016
 * Time: 10:55 AM
 */

require('../common/Common.php');

$objCommon = new Common();

if(isset($_POST['mode'])){

    if(isset($_POST['mode'])=='delete'){

        $id = $_POST['id'];
        $result = array();
        $result = $objCommon->deleteUser($id);

        echo json_encode($result);
    }
}