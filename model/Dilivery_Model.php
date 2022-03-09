<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class dilivery{
    // add dilivery details
    function addDilivery($dilivery_Sta,$user_fname,$customer_Adrr,$invoice_Id){
        $con = $GLOBALS['con'];
        date_default_timezone_set('Asia/Colombo');
        $Date = date("Y-m-d", time());
        $sql = "INSERT INTO delivery(delivery_date,delivery_status,deliver_name,customer_adrr,invoice_id) VALUE('$Date','$dilivery_Sta','$user_fname','$customer_Adrr','$invoice_Id')";
        $result=$con->query($sql) or die($con->error);
        return  $result;
    }
    // get all dilivery
    function getAllDilivery(){
        $con = $GLOBALS['con'];
        $sql ="SELECT * FROM delivery d,invoice i WHERE d.invoice_id=i.invoice_id";
        $result=$con->query($sql) or die($con->error);
        return  $result;
    }
    // shipped order
    function ShippedOrder($deliveryId){
        $con = $GLOBALS["con"];
        $sql = "UPDATE delivery SET delivery_status='1' WHERE  delivery_id='$deliveryId'";
        $result = $con->query($sql);
    }
    // deliver order
    function DiliveredOrder($deliveryId){
        $con = $GLOBALS["con"];
        $sql = "UPDATE delivery SET delivery_status='0' WHERE  delivery_id='$deliveryId'";
        $result = $con->query($sql);
      
    }

}