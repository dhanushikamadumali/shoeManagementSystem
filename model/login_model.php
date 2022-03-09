<?php
include_once '../commons/dbConnection.php';//include database 
$dbConnObj= new dbConnection();//create object dbconnobj

class Login{///create class login
    public function validateLogin($u_name, $u_pw)//validate login
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM user u , login l WHERE u.user_id=l.user_user_id AND l.login_username='$u_name'AND l.login_password='$u_pw'";
        $result = $con->query($sql);
        return $result;
    }
}

