<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class notifi{
    // get user notification count
    function getUserNotificationCount(){
        $con = $GLOBALS['con'];
        $sql = "SELECT COUNT(user_id) as ucount FROM user WHERE user_status='1'";
        $result = $con->query($sql) or die($con->error);
        $row = $result->fetch_assoc();
        $notificount = $row["ucount"];
        return $notificount;
    }
    // get notifi user id
    function getcountuserid(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM user WHERE user_status='1' ORDER BY user_id DESC LIMIT 10";
        $result = $con->query($sql) or die($con->error);
        return $result;

    }


    
}
