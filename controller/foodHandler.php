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

    $food_name = $_POST['feedName'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_tmp,"../images/$image");

    $result = array();
    $result = $objCommon->createFood($connection,$food_name,$description,$image);

    if($result['message']=='success'){
       header("Location:../views/food.php");
    }

    echo $result;
}

if($_POST["mode"]=="edit"){

    $id = $_POST['user_id'];
    $news_headline = $_POST['newsHeadline'];
    $news_body = $_POST['newsBody'];
    $category = $_POST['category'];

    $result = $objCommon->updateNews($news_headline,$news_body,$category,$id);

    if($result){
        $_SESSION['edit'] ="success";
    } else {
        $_SESSION['edit'] ="error";
    }

    header('Location:../views/news.php');
}

if($_POST["mode"]=="delete"){

    $id = $_POST['id'];

    $result = array();

    $result = $objCommon->deleteFood($connection,$id);

    echo json_encode($result);
}