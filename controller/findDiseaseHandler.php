<?php
/**
 * Created by PhpStorm.
 * User: Arun Tamang
 * Date: 8/23/2016
 * Time: 11:25 AM
 */

session_start();
if(isset($_POST['mode'])){

    $symptomList = implode(',',$_POST['symptoms']);

    $symptomListArray = explode(',',$symptomList);

    $flag = 0;

    for($i = 0; $i < count($symptomListArray); $i++){

        if($symptomListArray[$i]=='1'){

            $flag = $flag + 10;
        }
        else if($symptomListArray[$i]=='2'){
            $flag = $flag + 20;
        }
        else if($symptomListArray[$i] == '3'){
            $flag = $flag + 30;
        }
        else if($symptomListArray[$i] == '4'){
            $flag = $flag + 10;
        }
        else if($symptomListArray[$i] == '5'){
            $flag = $flag + 15;
        }
        else if($symptomListArray[$i] == '6'){
            $flag = $flag + 10;
        }
        else if($symptomListArray[$i] == '7'){
            $flag = $flag + 10;
        }
        else if($symptomListArray[$i] == '8'){
            $flag = $flag + 10;
        }
        else if($symptomListArray[$i] == '9'){
            $flag = $flag + 10;
        }
        else if($symptomListArray[$i] == '10'){
            $flag = $flag + 10;
        }
        else if($symptomListArray[$i] == '11'){
            $flag = $flag + 10;
        }
        else if($symptomListArray[$i] == '12'){
            $flag = $flag + 10;
        }
        else if($symptomListArray[$i] == '13'){
            $flag = $flag + 10;
        }

        if($flag == 60){
            $_SESSION['disease']='बाख्रालाई रिफ्त भ्याली फिभर लागेको छ ';
        }
        else if($flag == 35) {
            $_SESSION['disease']='';
        }
        else if($flag == 40){

        }
        else{
            $_SESSION['disease']='माफ गर्नुहोला, कुनै पनि रोग पत्ता लगाउन सकिएन|';
        }
    }

    header("Location:../views/findDisease.php");
}