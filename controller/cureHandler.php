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
        $result = $objCommon->editFood($id);

        echo json_encode($result);

    }

    else if($_POST["mode"]=="delete"){

        $id = $_POST['id'];

        $result = array();

        $result = $objCommon->deleteFood($id);

        echo json_encode($result);
    }

    else if($_POST['mode']=="update"){

        $f_id = $_POST['food_id'];
        $food_name = $_POST['feedName'];
        $description = $_POST['description'];

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp,"../images/$image");

        $result = array();
        $result = $objCommon->updateFood($food_name,$description,$image,$f_id);

        if($result['message']=='success'){
            header("Location:../views/food.php");
        }

        echo json_encode($result);

    }
}
