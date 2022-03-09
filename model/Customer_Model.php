<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class customer{
    // validate email
    function getValidateEmail($Email){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM customer WHERE customer_email='$Email'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
        
    }
    // validate nic
    function getValidateNIC($NIC){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM customer WHERE customer_nic='$NIC'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
        
    }
    // validate contact number
    function getValidateCon1($Con1){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM customer WHERE customer_con1='$Con1'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
        
    }
    // validate mobile number
    function getValidateCon2($Con2){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM customer WHERE customer_con2='$Con2'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
        
    }
    // add customer
    function AddCustomer($cus_fname,$cus_lname,$cus_email,$cus_nic,$cus_address,$cus_con1,$cus_con2,$cus_image,$gender,$c_status){
       $con = $GLOBALS['con'];
       $sql = "INSERT INTO customer
       (    customer_fname,
            customer_lname,
            customer_email,
            customer_nic,
            customer_address,
            customer_con1,
            customer_con2,
            customer_image,
            customer_gender,
            c_status
            )
                VALUES( '$cus_fname',
                        '$cus_lname',
                        '$cus_email',
                        '$cus_nic',
                        '$cus_address',
                        '$cus_con1',
                        '$cus_con2',
                        '$cus_image',
                        '$gender',
                        '$c_status'
                            )";
        $result = $con->query($sql)or die($con->error);
        $CusId = $con->insert_id;
        return $CusId;
       
    }
    // add login customer
    function AddLogin($login_username,$login_password,$Cus_id){
        $con = $GLOBALS["con"];
        $sql = "INSERT INTO customer_login(customer_login_username,customer_login_password,customer_customer_id)VALUES('$login_username','$login_password','$Cus_id')";
        $con->query($sql);
        $LoginId = $con->insert_id;
        return $LoginId;  
    }
    // get all customer
    function getAllCustomer(){
         $con = $GLOBALS['con'];
         $sql = "SELECT * FROM customer WHERE c_status='0'";
         $result = $con->query($sql)or die($con->error);
         return $result;
    }
    // view customer
    public function ViewCustomer($CusId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM customer WHERE customer_id='$CusId'";
        $result = $con->query($sql)or die($con->error);
        return $result;
        
    }

    
}

