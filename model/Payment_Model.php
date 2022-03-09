<?php
include_once '../commons/DbConnection.php';///include database 
$DbConnObj = new DbConnection();//.create dbconn object

class payment{
    // add payment function
    function addPayment($payamount,$paymentType,$pstatus,$comment,$grnid){
        $con = $GLOBALS['con'];
        date_default_timezone_set('Asia/Colombo');
        $toDay = date("Y-m-d", time());
        $sql ="SELECT count(paybill_no) FROM payment  WHERE payment_date='$toDay'";
        $result = $con->query($sql)or die($con->error);
        $row=$result->fetch_array();
        $count = $row[0];
        $count++;
        $newId = "PBILL" . str_replace("-", "", $toDay) ."_". str_pad($count, 4, "0", STR_PAD_LEFT);
        $sql2 = "INSERT INTO payment(paybill_no,payment_total_amount,payment_date,payment_type,p_status,comment,grn_id) 
                VALUES('$newId','$payamount',' $toDay','$paymentType','$pstatus','$comment','$grnid')";
        $con->query($sql2)or die($con->error);
        $payId = $con->insert_id;
        return $payId;
    }
     // select all payment function
     function getallpaymentdetails($payId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM payment p,grn g,supplier s WHERE p.grn_id=g.grn_id AND g.supplier_id=s.supplier_id AND p.payment_id='$payId'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
     // select all payment function
     function getallpospaymentincome(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM invoice WHERE invoice_type='genaral'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
     // select all payment function
     function getallonlinepaymentincome(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM invoice WHERE invoice_type='online'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
}