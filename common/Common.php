<?php
/**
 * Created by PhpStorm.
 * User: sanjeev-budha
 * Date: 4/21/16
 * Time: 9:24 PM
 */

require('../config/databaseConnection.php');

class Common {

    public function login($email,$pwd){

        global $connection;

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

    public function getBreed(){

        global $connection;

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

    public function createBreed($category,$breed_name,$description,$image,$searchKeyword){

        global $connection;

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

    public function deleteBreed($id){

        global $connection;

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

    public function updateBreed($category,$breed_name,$description,$image,$searchKeyword,$b_id){

        global $connection;

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


    public function getFood(){

        global $connection;

        $result = mysqli_query($connection,"SELECT  *FROM feed");
        $data = array();
        $i = 0;

        while($row = mysqli_fetch_assoc($result))
        {
            $data[$i]['id'] = $row["id"];
            $data[$i]['title'] = $row["title"];
            $data[$i]['description'] = $row["description"];
            $data[$i]['image'] = $row["image"];
            $i++;
        }
        return $data;
    }

    public function createFood($foodName,$description,$image){

        global $connection;

        $created_date = date("Y-m-d");

        $create_food = "INSERT INTO feed(title,description,image,created_date) VALUES('$foodName','$description','$image','$created_date')";

        $result = mysqli_query($connection,$create_food);

        $data = array();

        if($result){
            $data['message']='success';
        }
        else{
            $data['message']='fail';
        }

        return $data;
    }

    public function deleteFood($id){

        global $connection;

        $delete_food = "DELETE FROM feed WHERE id='$id' ";

        $result = mysqli_query($connection,$delete_food);

        $data = array();

        if($result){
            $data['message']='success';
        }else{
            $data['message']='error';
        }

        return $data;
    }

    public function editFood($id){

        global $connection;

        $select_query = "SELECT *FROM feed WHERE id ='$id'; ";

        $result = mysqli_query($connection,$select_query);

        $data = array();

        while($row = mysqli_fetch_assoc($result))
        {
            $data['id'] = $row["id"];
            $data['title'] = $row["title"];
            $data['description'] = $row["description"];
            $data['image'] = $row["image"];
        }

        return $data;
    }

    public function updateFood($food_name,$description,$image,$f_id){

        global $connection;

        $update_date = date("Y-m-d");

        $update_feed = "UPDATE feed SET title = '$food_name',description='$description',image='$image',updated_date='$update_date' WHERE id='$f_id' ";

        $result = mysqli_query($connection,$update_feed);

        $data = array();

        if($result){
            $data['message'] = 'success';
        }
        else{
            $data['message'] = 'fail';
        }

        return $data;

    }

    public function getDisease(){

        global $connection;

        $result = mysqli_query($connection,"SELECT  *FROM disease");
        $data = array();
        $i = 0;

        while($row = mysqli_fetch_assoc($result))
        {
            $data[$i]['id'] = $row["id"];
            $data[$i]['disease_name'] = $row["disease_name"];
            $data[$i]['description'] = $row["description"];
            $data[$i]['picture'] = $row["picture"];
            $i++;
        }
        return $data;

    }

    public function createDisease($disease_name,$description,$image){

        global $connection;

        $created_date = date("Y-m-d");

        $create_disease = "INSERT INTO disease(disease_name,description,picture,created_date) VALUES('$disease_name','$description','$image','$created_date')";

        $result = mysqli_query($connection,$create_disease);

        $data = array();

        if($result){
            $data['message']='success';
        }
        else{
            $data['message']='fail';
        }

        return $data;
    }

    public function getCure(){

        global $connection;

        $result = mysqli_query($connection,"SELECT  *FROM cure");
        $data = array();
        $i = 0;

        while($row = mysqli_fetch_assoc($result))
        {
            $data[$i]['id'] = $row["id"];
            $data[$i]['disease_id'] = $row["disease_id"];
            $data[$i]['preventive_care'] = $row["preventive_care"];
            $i++;
        }
        return $data;

    }

    public function createCure($id,$preventive){

        global $connection;

        $created_date = date("Y-m-d");

        $create_cure = "INSERT INTO cure(disease_id,preventive_care,created_date) VALUES('$id','$preventive','$created_date') ";

        $result = mysqli_query($connection,$create_cure);

        $data = array();

        if($result){
            $data['message']='success';
        }
        else{
            $data['message']='fail';
        }

        return $data;

    }

    public function getDiseaseNameById($id){

        global $connection;

        $result = mysqli_query($connection,"SELECT disease_name from disease WHERE id = '$id' ");

        $data = array();

        while($row = mysqli_fetch_assoc($result))
        {
            $data['disease_name'] = $row["disease_name"];
        }

        return $data;

    }

    public function deleteCure($id){

        global $connection;

        $delete_cure = "DELETE FROM cure WHERE id='$id' ";

        $result = mysqli_query($connection,$delete_cure);

        $data = array();

        if($result){
            $data['message']='success';
        }else{
            $data['message']='error';
        }

        return $data;
    }

    public function editCure($id){

        global $connection;

        $select_query = "SELECT *FROM cure WHERE id ='$id'; ";

        $result = mysqli_query($connection,$select_query);

        $data = array();

        while($row = mysqli_fetch_assoc($result))
        {
            $data['id'] = $row["id"];
            $data['disease_id'] = $row["disease_id"];
            $data['preventive_care'] = $row["preventive_care"];
        }

        return $data;

    }

    public function updateCure($disease_id,$preventive,$id){

        global $connection;

        $update_date = date("Y-m-d");

        $update_cure = "UPDATE cure SET disease_id = '$disease_id',preventive_care='$preventive',updated_date='$update_date' WHERE id='$id' ";

        $result = mysqli_query($connection,$update_cure);

        $data = array();

        if($result){
            $data['message'] = 'success';
        }
        else{
            $data['message'] = 'fail';
        }

        return $data;
    }

    public function getShed(){

        global $connection;

        $result = mysqli_query($connection,"SELECT  *FROM shed");
        $data = array();
        $i = 0;

        while($row = mysqli_fetch_assoc($result))
        {
            $data[$i]['id'] = $row["id"];
            $data[$i]['title'] = $row["shed_title"];
            $data[$i]['photo'] = $row["photo"];
            $data[$i]['description'] = $row["description"];
            $i++;
        }
        return $data;
    }

    public function createShed($shed_title,$image,$description){

        global $connection;

        $created_date = date("Y-m-d");

        $create_shed = "INSERT INTO shed(shed_title,description,photo,created_date) VALUES('$shed_title','$description','$image','$created_date')";

        $result = mysqli_query($connection,$create_shed);

        $data = array();

        if($result){
            $data['message']='success';
        }
        else{
            $data['message']='fail';
        }

        return $create_shed;
    }

    public function deleteShed($id){

        global $connection;

        $delete_shed = "DELETE FROM shed WHERE id='$id' ";

        $result = mysqli_query($connection,$delete_shed);

        $data = array();

        if($result){
            $data['message']='success';
        }else{
            $data['message']='error';
        }

        return $data;

    }

    public function editShed($id){

        global $connection;

        $select_query = "SELECT *FROM shed WHERE id ='$id'; ";

        $result = mysqli_query($connection,$select_query);

        $data = array();

        while($row = mysqli_fetch_assoc($result))
        {
            $data['id'] = $row["id"];
            $data['image'] = $row["photo"];
            $data['shed_title'] = $row["shed_title"];
            $data['description'] = $row["description"];

        }
        return $data;

    }

    public function updateShed($description,$image,$shed_title,$s_id){

        global $connection;

        $update_date = date("Y-m-d");

        $update_shed = "UPDATE shed SET description='$description',photo='$image',update_date='$update_date',shed_title='$shed_title' WHERE id='$s_id' ";
        $result = mysqli_query($connection,$update_shed);

        $data = array();

        if($result){
            $data['message']='success';
        }else{
            $data['message']='fail';
        }

        return $data;
    }

}