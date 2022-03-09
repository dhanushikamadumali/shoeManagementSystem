<?php
include_once '../commons/DbConnection.php';///include database 
$DbConnObj = new DbConnection();//.create dbconn object

class add_grn{
   
    // add grn details to grn table
    function addGRN($SupplierID,$status){
        $con = $GLOBALS['con'];
        date_default_timezone_set('Asia/Colombo');
        $toDay = date("Y-m-d", time());
        $sql ="SELECT count(grn_no) FROM grn  WHERE create_date='$toDay'";
        $result = $con->query($sql)or die($con->error);
        $row=$result->fetch_array();
        $count = $row[0];
        $count++;
        $newId = "GRN" . str_replace("-", "", $toDay) ."_". str_pad($count, 4, "0", STR_PAD_LEFT);
        $sql2 = "INSERT INTO grn(grn_no,supplier_id,create_date,status) VALUES('$newId','$SupplierID','$toDay','$status')";
        $con->query($sql2)or die($con->error);
        $grnId = $con->insert_id;
        return $grnId;
    }
    
    
     // get all grn details
    function getAllGRN(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM grn g,supplier s WHERE g.supplier_id=s.supplier_id AND g.status='1' ORDER BY g.grn_id ASC ";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
     // get all grn 
     function getgrn($grnId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM grn g,supplier s WHERE g.supplier_id=s.supplier_id AND g.grn_id='$grnId'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    function getGrnRowMaterialOrderDetails($grnId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM r_m_stock rs,r_material r WHERE rs.r_material_id=r.r_material_id AND rs.grn_grn_id='$grnId'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    function gettotalAmount($grnId){
        $con = $GLOBALS['con'];
        $sql = "SELECT SUM(sub_total) AS Amount FROM r_m_stock WHERE grn_grn_id='$grnId'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
     // update status in r_m_order table
     function updategrnstatus($grnId){
        $con = $GLOBALS['con'];
        $sql = "UPDATE grn SET status='0' WHERE grn_id='$grnId'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }

   
 
   
  
}

   