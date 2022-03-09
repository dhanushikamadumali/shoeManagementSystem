<?php
include '../model/Invoice_Model.php';//include invoice model
include '../model/Pos_Model.php';//include pos model

$invoiceObj = new invoice();//create invoice object
$posObj = new pos();////create pos objec

$status = $_REQUEST['status'];
switch ($status){
    case  'addInvoice':///for add invoice deatil

            $pTotal = $_POST["Total"];///get total value
            $discount = $_POST["discount"];///get discount
            $alltotal = $_POST["alltotal"];//get all total
            $ramount = $_POST["Receiveamount"];///get receiveamount
            $pamount = $_POST["payamount"];//get payamount
            $balance = $_POST["Balanceamount"];//get balance amount 
            $customerType ="genaral";//customer type
            $customerName = $_POST["customerId"];///get customer id 
            $productId = $_POST["productId"];//get product id
            $productname = $_POST["productname"];//get product name
            $qty = $_POST["qty"];///get quntity
            $price = $_POST["price"];//get price
            $size = $_POST["size"];///get size
            $subtotal = $_POST["subtotal"];//get sub total
            
          // pass value to invoice model for add invoice
            $invoiceId = $invoiceObj->addinvoice($customerType,$alltotal,$pamount,$ramount,$discount,$balance,1,$customerName);
            echo $invoiceId;
            if($invoiceId>0){////if invoice id greater than zero
                    for($i=0; $i<sizeof($productId); $i++){
                        $invoiceObj->addoderitem($qty[$i],$size[$i],$price[$i],$subtotal[$i],$invoiceId,$productId[$i]); ///pass value to order model for add order deatail
                        $result =$invoiceObj->getorder($size[$i],$productId[$i]);//get value order table
                          while($row = $result->fetch_assoc()){//make a result as an array value
                            // print_r($row);
                                if($row['a_quantity']>$qty[$i] ) {///if result quntity greater than order quantity
                                //  echo $qty[$i];
                                  // echo "<br>";
                                $invoiceObj->updatequntity($row['productstock_id'],$qty[$i]);///update stock table relavent record
                                  // exit();
                                break;
                                }elseif($row['a_quantity']==$qty[$i]){//else result quantity equal order quantity
                                  // echo $qty[$i];
                                 $invoiceObj->updatequntity1($row['productstock_id'],$qty[$i]);///update stock table relavent record
                                break;
                                }elseif($row['a_quantity']<$qty[$i] ){//else if result quantity less than order quantity
                                  $qty[$i]=$qty[$i]-$row['a_quantity'];///order quantity equal order quantity minus result quantity
                                  $invoiceObj->updatequntity1($row['productstock_id'],$qty[$i]);  ////update stock table relavent record                     
                                  
                                }
                          }
                          
                    }
              }
         
             
    break;
}

