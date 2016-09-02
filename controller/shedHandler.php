<?php
/**
 * Created by PhpStorm.
 * User: Arun Tamang
 * Date: 7/22/2016
 * Time: 4:15 PM
 */

require('../common/Common.php');

$objCommon = new Common();


if(isset($_POST['mode'])){

    if($_POST["mode"]=="add"){


        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $description = $_POST['description'];
        $shed_title = $_POST['shedTitle'];
        move_uploaded_file($image_tmp,"../images/$image");

        echo $description;

        $result = $objCommon->createShed($shed_title,$image,$description);

        if($result['message']=='success'){
            $_SESSION['add'] ="success";
        } else {
            $_SESSION['add'] ="error";
        }
        header('Location:../views/shed.php');
    }

    else if($_POST["mode"]=="edit"){

        $id = $_POST['id'];

        $result = array();
        $result = $objCommon->editShed($id);

        echo json_encode($result);
    }

    else if($_POST["mode"]=="update"){

        $s_id = $_POST['shed_id'];
        $shed_title= $_POST['shedTitle'];
        $description = $_POST['description'];

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp,"../images/$image");

        $result = array();

        $result = $objCommon->updateShed($description,$image,$shed_title,$s_id);

        if($result['message']=='success'){

            header("Location:../views/shed.php");
        }
    }

    else if($_POST['mode']=='delete'){

        $id= $_POST['id'];

        $result = array();

        $result = $objCommon->deleteShed($id);

        echo json_encode($result);
    }
}
