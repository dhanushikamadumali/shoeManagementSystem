<?php
include '../model/Product_Model.php';///////include product model
include '../model/Stock_Model.php';///////include stock model

$stockObj = new stock();///////create stock object
$ProductObj = new  product();////////create product object 

$status = $_REQUEST["status"];
    switch ($status){
        case "add_Stock"://for add stock
            try {
                $Product_Id=$_POST["product_id"];//get product id
                $Product_name=$_POST["pname"];//get product name
                $Price = $_POST["product_price"];//get product price
                $addSize = $_POST["size"];//get size id
                $StockQty = array_values(array_filter($_POST["qty"]));//get quntity
                $StockQty1 = array_values(array_filter($_POST["qty"]));//get quntity
                $Reorder =array_values(array_filter($_POST["reorder"]));//get quntity

                if($Price==""){///if price not empty
                    throw new Exception("price can't be empty");
                }
                if(empty($addSize)){///if price not empty
                    throw new Exception("size can't be empty");
                }
                if($StockQty==""){///server side validation if qty not empty
                    throw new Exception("quantity can't be empty");
                }
             
                for($i=0; $i < sizeof($addSize); $i++){
                     $stockId= $stockObj->addStock($Product_name,$Product_Id,$addSize[$i],$Price,$StockQty[$i],$StockQty1[$i],$Reorder[$i]); ///pass value to product stock module  
                }
                
                $msg = "Successfully Add product to stock ";//successfuly massage create
                $msg = base64_encode($msg);///massage encode
                ?>
                <!-- Ridirect view stock -->
                 <script>
                 window.location = "../view/view_stock.php?msg=<?php echo $msg;?>"
                 </script>
                <?php  
            
                }catch (Exception $ex) { //////catch exeption
                $error = $ex->getMessage(); /////get message value
                $error = base64_encode($error); /////msg encode
                ?>
                <script>window.location = "../view/product_manage.php?error=<?php echo $error; ?>"</script><?php ////Ridirected
                }
        break;
   
        case "eidtstock"://///for edit stock case
                $Stock_Id =$_POST['stock_id'];///get stock id
                $NewPrice = $_POST['newprice'];///get new price
                
            try {/////start try catch\\\\\\
                $stockObj->updatestockprice($Stock_Id, $NewPrice);///pass value to stock module
                $msg = "Successfully Updated Price"; ///////successsfuly msg
                $msg = base64_encode($msg);  //////mag encode
                ?><script>window.location = "../view/view_stock.php?msg=<?php echo $msg;?>"</script><?php /////riderected 
                
                }catch (Exception $ex) { //////catch exeption
                }

        break;	  
    }