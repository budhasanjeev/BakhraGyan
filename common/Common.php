<?php
/**
 * Created by PhpStorm.
 * User: sanjeev-budha
 * Date: 4/21/16
 * Time: 9:24 PM
 */

class Common {

    public function login($connection,$email,$pwd){

        $pwd = md5($pwd);

        $login_query = "SELECT *FROM user WHERE email_address = '$email' and password='$pwd' ";

        $result = mysqli_query($connection,$login_query);

        $data = array();

        if(mysqli_num_rows($result)>0){

            $data['message']='success';
        }
        else{
            $data['message']='fail';
        }

        return $data;

    }

    public function getBreed($connection){

        $result = mysqli_query($connection,"SELECT  *FROM breed");
        $data = array();
        $i = 0;

        while($row = mysqli_fetch_assoc($result))
        {
            $data[$i]['id'] = $row["id"];
            $data[$i]['image'] = $row["image"];
            $data[$i]['breed_name'] = $row["breed_name"];
            $data[$i]['description'] = $row["description"];
            $data[$i]['category'] = $row["category"];
            $i++;
        }
        return $data;
    }

    public function createBreed($connection,$category,$breed_name,$description,$image,$searchKeyword){

        $created_date = date("Y-m-d");

        $create_breed = "INSERT INTO breed(category,breed_name,description,image,created_date,search_words) VALUES('$category','$breed_name','$description','$image','$created_date','$searchKeyword')";

        $result = mysqli_query($connection,$create_breed);

        $data = array();

        if(mysqli_num_rows($result)>0){
            $data['message']='success';
        }else{
            $data['message']='error';
        }

        return $data;
    }

    public function editBreed($id){

        global $connection;

        $select_query = "SELECT *FROM user WHERE id ='$id'; ";

        $result = mysqli_query($connection,$select_query);

        $data = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result))
        {
            $data[$i]['id'] = $row["id"];
            $data[$i]['email_address'] = $row["email_address"];
            $data[$i]['status'] = $row["status"];
            $data[$i]['role'] = $row["role"];
            $data[$i]['first_name'] = $row["first_name"];
            $data[$i]['last_name'] = $row["last_name"];
            $data[$i]['mobile_number'] = $row["mobile_number"];
            $data[$i]['phone_number'] = $row["phone_number"];
            $data[$i]['address'] = $row["address"];
            $data[$i]['profile_picture'] = $row["profile_picture"];
            $i++;
        }
        return $data;

    }

    public function deleteBreed($connection,$id){

        $delete_breed = "DELETE FROM breed WHERE id='$id' ";

        $result = mysqli_query($connection,$delete_breed);

        $data = array();

        if($result){
            $data['message']='success';
        }else{
            $data['message']='error';
        }

        return $data;

    }

    public function updateBreed($fName,$lName,$mNumber,$pNumber,$address,$role,$status,$email_address,$id){

        global $connection;

        $password = md5('123');

        $update_date = date("Y-m-d");
        if($status=='active'){
            $status=1;
        }
        else{
            $status=0;
        }
        $update_user = "UPDATE user SET first_name = '$fName',last_name='$lName',mobile_number='$mNumber',phone_number='$pNumber',address='$address',role='$role',email_address='$email_address',status='$status',last_updated='$update_date' WHERE id='$id'; ";
        $result = mysqli_query($connection,$update_user);

        $data = array();

        if($result){
            $data['message']='success';
        }else{
            $data['message']='error';
        }

        return $data;
    }

}