<?php
include '../model/Product_Model.php';///////include product model\\\\\\\\\\\\\
include '../model/Stock_Model.php';///////include stock model\\\\\\\\\

$stockObj = new stock();///////create stock object\\\\\\\
$ProductObj = new  product();////////create product object \\\\\\\\\

$status = $_REQUEST["status"];
    switch ($status){
       
        case "getSize"://for get size 
            $ProductId = $_POST['productId'];//get product id
            $result = $stockObj->getproductsize($ProductId);///pass value stock module
            if($result->num_rows>0){
            ?>   
            <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="text-align: right;">
                <label>SIZE :</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
            
            <?php
            $count=1;
             while($row =$result->fetch_assoc()){?>
                <input type="hidden" id="barcode<?php echo $row["size_id"].$count;?>" name="barcode" class="form-control" value="5827<?php echo $row["product_product_id"] ?><?php echo $row["size_id"];?>" >
                <input type="hidden" value="<?php echo $row["product_product_id"] ?>" id="product_id">
                <input id="SizeId<?php echo $row["size_id"].$count;?>" name="SizeId" type="radio" onclick="load(<?php echo $row ['size_id'].$count;?>)" value="<?php echo $row["size_id"];?>" >
                <?php  echo ($row["size"]);?>
            <?php
            $count++;
            }
            ?> 
            </div>
            </div>
      
        <?php
         }else{
            echo "not found size";
        }
        break;
        case "getproduct"://for get product detail 
            $ProductId = $_POST['productId'];///get product id
            $result = $stockObj->getproductsize($ProductId);//pass value stock module
           if($result->num_rows>0){
            $row1 =$result ->fetch_assoc();//result get array
            ?>
            <div class="row">&nbsp;</div>
            <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="text-align: right;"><label>NAME :</label></div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
            <input type="text" class="form-control" value="<?php echo $row1['product_name'] ?>" name="pname" id="name">
            </div> 
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="text-align: right;"> <label>PRICE :</label></div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
            <input type="text" class="form-control" value="<?php echo $row1['price'] ?>" name="price" id="price" >
            </div>
            </div>
            <?php

           }else{
               echo "not found data";
           }
        break;
        case "getquntity"://///for get quntity
            $sizeId = $_POST['sizeId'];//get size id
            $productId =$_POST['productId'];//get product id
            $result1 = $stockObj->getquntity( $productId,$sizeId);///pass value stock module
            $row2 =$result1->fetch_assoc();///result get array
            ?>
            <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="text-align: right;">
                <label>QUANTITY :</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
            <input type="text" class="form-control" value="<?php echo $row2['total'] ?>" name="qty" id="qty">
            </div>
            </div>
            <?php
        break;
        // barcode update
        case "updatebarcode":	
            $barcode = $_POST['barcode'];//get barcode
            $productId =$_POST['productId'];//get product id
            $sizeId =$_POST['sizeId'];//get size
            $result = $ProductObj->updatebarcode( $productId,$sizeId,$barcode) ;///pass value product module
        break;
}