<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class supplier{
    //validate email
     function getValidateEmail($Email){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM supplier WHERE supplier_email='$Email'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
        
    }
    // validate contact number 1
    function getValidateCon1($Con1){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM supplier WHERE supplier_con1='$Con1'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
        
    }
    // validate contact number 2
    function getValidateCon2($Con2){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM supplier WHERE supplier_con2='$Con2'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
        
    }
    // validate contact number 1
    function getValidateEditCon1($Con1){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM supplier WHERE supplier_con1='$Con1'";
        $result = $con->query($sql);
        if($result->num_rows>1){
            return false;
        } 
        else {
            return true; 
        }
        
    }
    // validate contact number 2
    function getValidateEditCon2($Con2){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM supplier WHERE supplier_con2='$Con2'";
        $result = $con->query($sql);
        if($result->num_rows>1){
            return false;
        } 
        else {
            return true; 
        }
        
    }
    //Add supplier function
    function AddSupplier($supp_fname,$supp_lname,$supp_email,$supp_address,$supp_con1,$supp_con2,$supp_image,$gender){
       $con = $GLOBALS['con'];
       $sql = "INSERT INTO supplier
       (    supplier_fname,
            supplier_lname,
            supplier_email,
            supplier_address,
            supplier_con1,
            supplier_con2,
            supplier_image,
            supplier_gender
            )
                VALUES( '$supp_fname',
                        '$supp_lname',
                        '$supp_email',
                        '$supp_address',
                        '$supp_con1',
                        '$supp_con2',
                        '$supp_image',
                        '$gender'
                        )";
        $result = $con->query($sql) or die($con->error);
        return $result; 
    }
    // get all supplier
    function getAllSupplier(){
         $con = $GLOBALS['con'];
         $sql = "SELECT * FROM supplier";
         $result = $con->query($sql)or die($con->error);
         return $result;  
    }
    // view supplier
    function ViewSupplier($SuppId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM supplier WHERE supplier_id='$SuppId'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }
    // update supplier
    function updateSupplier($SuppId,
                        $supp_fname,
                        $supp_lname,
                        $supp_email,
                        $supp_addr,
                        $supp_con1,
                        $supp_con2,  
                        $supp_image,
                        $gender                  
                       ){
        $con = $GLOBALS["con"];
        $sql = "UPDATE supplier SET 
                    supplier_fname='$supp_fname',
                    supplier_lname='$supp_lname',
                    supplier_email='$supp_email',
                    supplier_address='$supp_addr',
                    supplier_con1='$supp_con1',
                    supplier_con2='$supp_con2',
                    supplier_image='$supp_image',
                    supplier_gender='$gender'
                    WHERE supplier_id='$SuppId'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    
    
 
    
}


