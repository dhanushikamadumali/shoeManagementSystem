<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class userReport{
    // get last seven day report
    function getuserReport(){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM user WHERE user_status='1'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    //get last seven day Active User
    function getActiveUser(){
        $con =$GLOBALS['con'];
        $sql ="SELECT COUNT(user_id) AS ActiveUser FROM user  WHERE user_status='1'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    } 
     // get last seven day report
     function getDuserReport(){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM user WHERE user_status='0'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    } 
    //get last seven day Active User
    function getDActiveUser(){
        $con =$GLOBALS['con'];
        $sql ="SELECT COUNT(user_id) AS DActiveUser FROM user  WHERE user_status='0'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
     // get last seven day report
     function getDuserDeatail($userId){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM user WHERE user_id='$userId'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    } 
}


?>