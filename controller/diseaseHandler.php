<?php
/**
 * Created by PhpStorm.
 * User: sanjeevbudha
 * Date: 7/1/16
 * Time: 2:13 AM
 */
require('../common/Common.php');

$objCommon = new Common();

if(isset($_POST['mode'])){

    if($_POST["mode"]=="add"){

        $disease_name = $_POST['diseaseName'];
        $description = $_POST['description'];

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp,"../images/$image");

        $result = array();
        $result = $objCommon->createDisease($disease_name,$description,$image);

        if($result['message']=='success'){
            header("Location:../views/disease.php");
        }

    }

    else if($_POST["mode"]=="edit"){

        $id = $_POST['id'];

        $result = array();
        $result = $objCommon->editDisease($id);

        echo json_encode($result);

    }

    else if($_POST["mode"]=="delete"){

        $id = $_POST['id'];

        $result = array();

        $result = $objCommon->deleteDisease($id);

        echo json_encode($result);
    }

    else if($_POST['mode']=="update"){

        $id = $_POST['disease_id'];
        $disease_name = $_POST['diseaseName'];
        $description = $_POST['description'];

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp,"../images/$image");

        $result = array();
        $result = $objCommon->updateDisease($disease_name,$description,$image,$id);

        if($result['message']=='success'){
            header("Location:../views/disease.php");
        }

    }

    else if($_POST['mode']=='check'){

        $input_txt= $_POST['input_txt'];
        $column_name = 'disease_name';
        $table_name = 'disease';

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