<?php
/**
 * Created by PhpStorm.
 * User: sanjeevbudha
 * Date: 7/20/16
 * Time: 2:20 PM
 */

require('../common/Common.php');

$objCommon = new Common();

if(isset($_POST['mode'])){

    if($_POST["mode"]=="add"){

        $disease_id = $_POST['disease_id'];
        $preventive = $_POST['preventive'];


        $result = array();
        $result = $objCommon->createCure($disease_id,$preventive);

        if($result['message']=='success'){
            header("Location:../views/cure.php");
        }

    }

    else if($_POST["mode"]=="edit"){

        $id = $_POST['id'];

        $result = array();
        $result = $objCommon->editCure($id);

        echo json_encode($result);

    }

    else if($_POST["mode"]=="delete"){

        $id = $_POST['id'];

        $result = array();

        $result = $objCommon->deleteCure($id);

        echo json_encode($result);
    }

    else if($_POST['mode']=="update"){

        $id = $_POST['cure_id'];
        $disease_id = $_POST['disease_id'];
        $preventive = $_POST['preventive'];


        $result = array();
        $result = $objCommon->updateCure($disease_id,$preventive,$id);

        if($result['message']=='success'){
            header("Location:../views/cure.php");
        }
    }
    
    else if($_POST['mode']=='details'){
        
        $id = $_POST['id'];

        $result = array();
        $result = $objCommon->getDiseaseById($id);

        echo json_encode($result);
    }

    else if($_POST['mode']=='check'){

        $input_txt= $_POST['input_txt'];
        $column_name = '';
        $table_name = 'feed';

        $result = array();

        $result = $objCommon->checkDuplicate($input_txt,$column_name,$table_name);

        $data = array();

        if($result){
            $data['message'] = 'success';
        }else{
            $data['message']  = 'fail';
        }

        echo json_encode($data);

    }

}
