<?php
include_once '../commons/DbConnection.php';///include database 
$DbConnObj = new DbConnection();//.create dbconn object

class row_material_stock{
    // add r_m_order to stock table
    function addstock($qty,$cqty,$uPrice,$unit,$suppid,$itemId,$grnId,$status,$tPrice){
        $con = $GLOBALS['con'];
        date_default_timezone_set('Asia/Colombo');
        $toDay = date("Y-m-d", time());
        $sql = "INSERT INTO r_m_stock(r_m_stock_a_quantity,c_quantity,unit_price,unit_name,supplier_id,r_material_id,stock_date,grn_grn_id,status,sub_total) 
        VALUES('$qty','$cqty','$uPrice','$unit','$suppid','$itemId','$toDay','$grnId','$status','$tPrice')";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // get row material detail by supplier id
    function getAllRMStockDetails(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM r_m_stock rms,r_material r,supplier s WHERE r.r_material_id=rms.r_material_id AND rms.supplier_id=s.supplier_id ORDER BY rms.r_m_stock_id ASC";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // // delete item by product id
    // function deleteRM($rowmaterialId,$supplierId){
    //     $con = $GLOBALS['con'];
    //     $sql = "DELETE FROM r_m_order WHERE r_material_id ='$rowmaterialId' AND supplier_id='$supplierId'";
    //     $result = $con->query($sql)or die($con->error);
    //     return $result;
    // }
 
}

   