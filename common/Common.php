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

    public function editBreed($connection,$id){

        $select_query = "SELECT *FROM breed WHERE id ='$id'; ";

        $result = mysqli_query($connection,$select_query);

        $data = array();

        while($row = mysqli_fetch_assoc($result))
        {
            $data['id'] = $row["id"];
            $data['image'] = $row["image"];
            $data['breed_name'] = $row["breed_name"];
            $data['description'] = $row["description"];
            $data['category'] = $row["category"];
            $data['search_words'] = $row["search_words"];
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

    public function updateBreed($connection,$category,$breed_name,$description,$image,$searchKeyword,$b_id){

        $update_date = date("Y-m-d");

        $update_breed = "UPDATE breed SET category = '$category',breed_name='$breed_name',description='$description',image='$image',updated_date='$update_date',search_words='$searchKeyword' WHERE id='$b_id' ";
        $result = mysqli_query($connection,$update_breed);

        $data = array();

        if($result){
            $data['message']='success';
        }else{
            $data['message']='fail';
        }

        return $data;
    }

}