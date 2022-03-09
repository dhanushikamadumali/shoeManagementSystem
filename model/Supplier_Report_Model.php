<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class supplierReport{
    // get last seven day report
    function getsupplierReport(){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM supplier";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    //get last seven day Active supplier
    function getActiveSupplier(){
        $con =$GLOBALS['con'];
        $sql ="SELECT COUNT(supplier_id) AS ActiveSupplier FROM supplier";
        $result=$con->query($sql)or die($con->error);
        return $result;
    } 
    
}
?>