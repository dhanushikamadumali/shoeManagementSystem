<?php
include '../commons/session.php';//include session
include '../model/Dilivery_Model.php';//include dilivery model

$DiliveryObj = new dilivery();//dilivery object

$status = $_REQUEST["status"];//get request
switch ($status){
      case "addDilivery":///for add dilivery
            
            $user_fname = $_SESSION["user"]["fname"];///sessin user fname
            $user_lname = $_SESSION["user"]["lname"];///session user lname
            $invoice_Id = $_POST['InvId'];//get invoice id
            $invoice_Date =$_POST['InvDate'];///get invoice date
            $customer_Name =$_POST['CusName'];///get customer name
            $customer_Adrr =$_POST['CusAddr'];///get customer addresss
            $pay_Amount =$_POST['InvPayAmount'];///get pay amount
          
            $DiliveryObj->addDilivery(1,$user_fname,$customer_Adrr,$invoice_Id,);/////pass value to dilivery model for add delivery
            $msg = "Successfully Add Order Request !!!!";//msg variable create
            $msg = base64_encode($msg);///msg encode
            ?><script>window.location = "../view/dilivery.php?msg=<?php echo $msg;?>"</script><?php ///ridirected
      break;
      case "ShippedOrder":///shipped order
        
            // echo $deliveryId = $_REQUEST["delivery_id"];////request delivery id
            // $DiliveryObj->ShippedOrder($deliveryId);///pass dilivery id user module
            // $msg = "Successfully Shipped Order Request !!!!";//msg variable create
            // $msg = base64_encode($msg);///msg encode
            ?><script>
            // window.location = "../view/dilivery.php?msg=<?php echo $msg;?>"
            </script><?php ///ridirected
        
      break; 
      case "DiliverdOrder":///dilivered order

            // echo $deliveryId = $_REQUEST["delivery_id"];///request delivery id
            // $DiliveryObj->DiliveredOrder($deliveryId);///pass delivery id user module
            // $msg = "Successfully Delivered Order Request !!!!";///msg variable create
            // $msg = base64_encode($msg);///msg encode
            ?><script>
            // window.location = "../view/dilivery.php?msg=<?php echo $msg;?>"
            </script><?php ///ridirected
        
      break;     
        
       
}


