<?php
include '../commons/session.php';//include session
include '../model/Order_Model.php';//include order model

$OrderObj = new order();///include order object

$status = $_REQUEST["status"];//get request status
switch ($status){
    case "updateStatus":
            $InvoiceId = $_POST["InvId"];//get invoice id
            $statusId = $_POST["diliveryStatus"];//get dilivery status
            $mobileNumber = $_POST["mobileNumber"];//get moblile number
            $result=$OrderObj->updateStatus($InvoiceId,$statusId);///pass value update order status
            if($result==1){//if result equl one record send sms customer
                $user = "94764233850";
                $password = "7635";
                $text = urlencode("Your Order has been "." $statusId");
                $to = "$mobileNumber";
                
                $baseurl ="http://www.textit.biz/sendmsg";
                $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
                $ret = file($url);
                
                $res= explode(":",$ret[0]);
                
                if (trim($res[0])=="OK")
                {
                echo "Message Sent - ID : ".$res[1];
                }
                else
                {
                echo "Sent Failed - Error : ".$res[1];
                } 
            }
       
    break;
   
        
   
   
        
        
       
}


