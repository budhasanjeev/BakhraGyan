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

//    echo print_r($symptomArray);
    $rvf_probability = '';
    $ppr_probability = '';
    $muaalo_probability = '';

    /*calculating probability for rvf*/
    if($symptomArray[0] == 1 && $symptomArray[1] == 1 && $symptomArray[3] == 1){
        $rvf_probability = '९९.९९';
    }
    else if($symptomArray[0] == 1 && $symptomArray[1] == 1){
        $rvf_probability = '६६.६६';
    }
    else if($symptomArray[1] == 1 && $symptomArray[3] == 1){
        $rvf_probability = '६६.६६';
    }
    else if($symptomArray[0] == 1 && $symptomArray[3] == 1){
        $rvf_probability = '६६.६६';
    }
    else if($symptomArray[0] == 1){
        $rvf_probability = '३३.३३';
    }
    else if($symptomArray[1] == 1){
        $rvf_probability = '३३.३३';
    }
    else if($symptomArray[3] == 1){
        $rvf_probability = '३३.३३';
    }


    if($symptomArray[2] == 1 && $symptomArray[4] == 1 && $symptomArray[5] == 1&& $symptomArray[6] == 1&& $symptomArray[7] == 1&& $symptomArray[8] == 1){
        $ppr_probability = '९९.९६';
    }
    else if($symptomArray[2] == 1 && $symptomArray[4] == 1 && $symptomArray[5] == 1&& $symptomArray[6] == 1&& $symptomArray[7] == 1){
        $ppr_probability = '८३.३';
    }
    else if($symptomArray[2] == 1 && $symptomArray[4] == 1 && $symptomArray[5] == 1&& $symptomArray[6] == 1&& $symptomArray[8] == 1){
        $ppr_probability = '८३.३';
    }
    else if($symptomArray[2] == 1 && $symptomArray[4] == 1 && $symptomArray[5] == 1&& $symptomArray[7] == 1&& $symptomArray[8] == 1){
        $ppr_probability = '८३.३';
    }
    else if($symptomArray[2] == 1 && $symptomArray[5] == 1 && $symptomArray[6] == 1&& $symptomArray[7] == 1&& $symptomArray[8] == 1){
        $ppr_probability = '८३.३';
    }
    else if($symptomArray[4] == 1 && $symptomArray[5] == 1 && $symptomArray[6] == 1&& $symptomArray[7] == 1&& $symptomArray[8] == 1){
        $ppr_probability = '८३.३';
    }

    if($symptomArray[9] == 1 && $symptomArray[10] == 1 && $symptomArray[11] == 1 && $symptomArray[12] == 1){
        $muaalo_probability = '१००';
    }
    else if($symptomArray[9] == 1 && $symptomArray[10] == 1 && $symptomArray[11] == 1){
        $muaalo_probability = '७५';
    }
    else if($symptomArray[9] == 1 && $symptomArray[10] == 1 && $symptomArray[12] == 1){
        $muaalo_probability = '७५';
    }
    else if($symptomArray[10] == 1 && $symptomArray[11] == 1 && $symptomArray[12] == 1){
        $muaalo_probability = '७५';
    }
    else if($symptomArray[9] == 1 && $symptomArray[10] == 1){
        $muaalo_probability = '५०';
    }
    else if($symptomArray[9] == 1 && $symptomArray[11] == 1){
        $muaalo_probability = '५०';
    }
    else if($symptomArray[9] == 1 && $symptomArray[12] == 1){
        $muaalo_probability = '५०';
    }
    else if($symptomArray[10] == 1 && $symptomArray[11] == 1){
        $muaalo_probability = '५०';
    }
    else if($symptomArray[10] == 1 && $symptomArray[12] == 1){
        $muaalo_probability = '५०';
    }
    else if($symptomArray[11] == 1 && $symptomArray[12] == 1){
        $muaalo_probability = '५०';
    }
    else if($symptomArray[9] == 1){
        $muaalo_probability = '२५';
    }
    else if($symptomArray[10] == 1){
        $muaalo_probability = '२५';
    }
    else if($symptomArray[11] == 1){
        $muaalo_probability = '२५';
    }
    else if($symptomArray[12] == 1){
        $muaalo_probability = '२५';
    }

    echo '<br>'.$rvf_probability;


    $_SESSION['rvf_disease'] = '';
    $_SESSION['disease']  = '';
    $_SESSION['ppr_disease'] = '';
    $_SESSION['muaalo_disease'] = '';

    if($rvf_probability == '' && $ppr_probability == '' && $muaalo_probability == ''){
        $_SESSION['disease']='माफ गर्नुहोला, कुनै पनि रोग पत्ता लगाउन सकिएन|';
    }

    if($rvf_probability != '') {
        $_SESSION['rvf_disease']= 'बाख्रालाई '.$rvf_probability.'% सम्भावना रिफ्त भ्याली फिभर लागेको हुनसक्छ';
    }

    if($ppr_probability != ''){
        $_SESSION['ppr_disease'] = 'बाख्रालाई '.$ppr_probability.'% सम्भावना पीपीर लागेको हुनसक्छ';
    }
    
    if($muaalo_probability != ''){
        $_SESSION['muaalo_disease'] = 'बाख्रालाई '.$muaalo_probability.'% सम्भावना मुआलो लागेको हुनसक्छ';
    }

    header("Location:../views/findDisease.php");
}