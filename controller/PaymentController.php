<?php
include '../model/Payment_Model.php';//////include payment model
include '../model/GRN_Model.php';//////include grn model

$PaymentObj = new payment();//////create payment object
$grnObj = new add_grn();//////create grn object

$status = $_REQUEST["status"];
switch ($status){
    case "add_payment":////////for add payment 
       
        $grnId = $_POST["grnid"];/////get grn id
        $payamount = $_POST["pay"];////////get payment fname
        $paymentType = $_POST["type"];////////get payment email
        $comment = $_POST["text"];////////get payment email
  
        $payId=$PaymentObj->addPayment($payamount,$paymentType,"SUCCESS",$comment,$grnId);//////pass value to payment module
        echo $payId;
        $grnObj->updategrnstatus($grnId);/////update grn table
    break; 
}   
    
