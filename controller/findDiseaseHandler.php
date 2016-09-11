<?php
/**
 * Created by PhpStorm.
 * User: Arun Tamang
 * Date: 8/23/2016
 * Time: 11:25 AM
 */

include '../common/Common.php';

session_start();
$objCommon = new Common();

if(isset($_POST['mode'])){

    $symptomList = implode(',',$_POST['symptoms']);

    $symptomListArray = explode(',',$symptomList);

    $flag = 0;

    $symptomArray = array('0','0','0','0','0','0','0','0','0','0','0','0','0');

    $result = array();

    $diseaseList = $objCommon->getDiseaseList();

    for($i = 0; $i < count($symptomListArray); $i++) {

        if($symptomListArray[$i] == 's1'){
            $symptomArray[0] = 1;
        }
        else if($symptomListArray[$i] == 's2'){
            $symptomArray[1] = 1;
        }
        else if($symptomListArray[$i] == 's3'){
            $symptomArray[2] = 1;
        }
        else if($symptomListArray[$i] == 's4'){
            $symptomArray[3] = 1;
        }
        else if($symptomListArray[$i] == 's5'){
            $symptomArray[4] = 1;
        }
        else if($symptomListArray[$i] == 's6'){
            $symptomArray[5] = 1;
        }
        else if($symptomListArray[$i] == 's7'){
            $symptomArray[6] = 1;
        }
        else if($symptomListArray[$i] == 's8'){
            $symptomArray[7] = 1;
        }
        else if($symptomListArray[$i] == 's9'){
            $symptomArray[8] = 1;
        }
        else if($symptomListArray[$i] == 's10'){
            $symptomArray[9] = 1;
        }
        else if($symptomListArray[$i] == 's11'){
            $symptomArray[10] = 1;
        }
        else if($symptomListArray[$i] == 's12'){
            $symptomArray[11] = 1;
        }
        else if($symptomListArray[$i] == 's13'){
            $symptomArray[12] = 1;
        }

    }

    echo print_r($symptomArray);
    $rvf_probability = 0;
    $ppr_probability = 0;
    $muaalo_probability = 0;

    /*calculating probability for rvf*/
    if($symptomArray[0] == 1 && $symptomArray[1] == 1 && $symptomArray[3] == 1){
        $rvf_probability = 99.99;
    }
    else if($symptomArray[0] == 1 && $symptomArray[1] == 1){
        $rvf_probability = 66.66;
    }
    else if($symptomArray[1] == 1 && $symptomArray[3] == 1){
        $rvf_probability = 66.66;
    }
    else if($symptomArray[0] == 1 && $symptomArray[3] == 1){
        $rvf_probability = 66.66;
    }
    else if($symptomArray[0] == 1){
        $rvf_probability = 33.33;
    }
    else if($symptomArray[1] == 1){
        $rvf_probability = 33.33;
    }
    else if($symptomArray[3] == 1){
        $rvf_probability = 33.33;
    }


    if($symptomArray[2] == 1 && $symptomArray[4] == 1 && $symptomArray[5] == 1&& $symptomArray[6] == 1&& $symptomArray[7] == 1&& $symptomArray[8] == 1){
        $ppr_probability = 99.96;
    }
    else if($symptomArray[2] == 1 && $symptomArray[4] == 1 && $symptomArray[5] == 1&& $symptomArray[6] == 1&& $symptomArray[7] == 1){
        $ppr_probability = 99.96-16.66;
    }
    echo '<br>'.$rvf_probability;


    if($flag == 60){
        $_SESSION['disease']='बाख्रालाई रिफ्त भ्याली फिभर लागेको छ ';
    }
    else if($flag == 35) {
        $_SESSION['disease']='';
    }
    else if($flag == 40){
        $_SESSION['disease']='';
    }
    else{
        $_SESSION['disease']='माफ गर्नुहोला, कुनै पनि रोग पत्ता लगाउन सकिएन|';
    }
//    }

//    header("Location:../views/findDisease.php");
}