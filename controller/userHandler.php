<?php
/**
 * Created by PhpStorm.
 * User: Arun Tamang
 * Date: 8/23/2016
 * Time: 10:55 AM
 */

require('../common/Common.php');
require_once('../PHPMailer-master/PHPMailerAutoload.php');

$objCommon = new Common();

if(isset($_POST['mode'])){

    if($_POST['mode']=='delete'){

        $id = $_POST['id'];
        $result = array();
        $result = $objCommon->deleteUser($id);

        echo json_encode($result);
    }

    else if($_POST['mode']=='add'){

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $mobileNumber = $_POST['mobileNumber'];
        $emailAddress = $_POST['emailAddress'];
        $city = $_POST['city'];
        $zone = $_POST['zone'];
        $district = $_POST['district'];
        $role = $_POST['role'];

        $image = $_FILES['profileImage']['name'];
        $image_tmp = $_FILES['profileImage']['tmp_name'];

        move_uploaded_file($image_tmp,"../images/$image");


        $result = array();
        $result = $objCommon->createUser($firstName,$lastName,$mobileNumber,$emailAddress,$city,$zone,$district,$role,$image);

        if($result['message']=='success'){

            $mail = new PHPMailer();
            $mail->CharSet =  "utf-8";
            $mail->Username = "BakhraGyan";
            $mail->Password = "iam@Ktm36";
            $mail->Host = "smtp.gmail.com";
            $mail->From='sanjeev.budha@deerwalk.edu.np';
            $mail->FromName='Bakhra Gyan';
            $mail->AddAddress($emailAddress);
            $mail->Subject  =  'Your user credential created';
            $mail->IsHTML(true);
            $mail->Body    = 'Hello '.$firstName.',\n Your user credential have been created.\n Username: '.$emailAddress.'\nPassword: '.$result['password'].' <br><br>Kind Regards,<br>Bakhra Gyan';
            if($mail->Send())
            {
                $_SESSION['message']='User credential have been sent to user email address';
                header("Location:../views/user.php");
            }
            else
            {
                $_SESSION['message']=$mail->ErrorInfo;
                echo $mail->ErrorInfo;
            }
        }

    }
}