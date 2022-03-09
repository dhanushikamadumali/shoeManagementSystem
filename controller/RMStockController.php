<?php
include '../model/R_M_Stock_Model.php';///include row material stock model
include '../model/Row_Material_Model.php';///include row material model
include '../model/GRN_Model.php';///include grn model
include '../model/Supplier_Model.php';///include supplier 

$SupplierObj = new supplier();///create supplier object
$RowMaterialObj = new row_material();///create row material object
$RowMaterialstockObj= new row_material_stock();//////create row material stock object
$SupplierResult = $SupplierObj->getAllSupplier();//get all supplier
$grnObj= new add_grn();
$status = $_REQUEST["status"];///get status 
switch ($status){
    case "getRMdetails"://///create case
        $RowMaterialID = $_POST['RMId'];///get row material id
        $getrowmaterial= $RowMaterialObj->getRowMterial($RowMaterialID);
        $rmrow = $getrowmaterial->fetch_assoc();
        if($RowMaterialID>0){///if row material id is greater than
        ?>
            <input type="text" id="unit" name="Unit" class="form-control text-center" readonly="readonly" value="<?php echo " ".$rmrow['unit_name'];?>"></div>
        <?php
        }
    break;
    case 'savestock' :
        try{/////server side validation
            $SupplierID = $_POST['supp_Id'];///get supplier id
            $RmaterialID = $_POST['rMaterial_Id'];///get row material id 
            $Price = $_POST['r_material_price'];///get price 
            $Qty = $_POST['Qty'];///get quantity
           
           
            $Rmaterialid = $_POST['rowmaterialid'];///get row material id 
            $unit = $_POST['unit'];///get unit
            $price = $_POST['price'];///get price 
            $qty = $_POST['qty'];///get quantity
            $CQty = $_POST['qty'];///get quantity
            $SubTotal = $_POST['subtotal'];///get subtotal
      
            if($SupplierID==""){///if supplier id is  empty
                throw  new Exception('Supplier Name can not be empty') ;
            }
            if($RmaterialID ==""){///if row material id is  empty
                throw  new Exception('Row Material Name can not be empty');
            }
            if($Price==""){///if price empty
                throw  new Exception('Price can not be empty'); 
            }
            if($Qty==""){///if quantity empty
                throw  new Exception('Quantity can not be empty'); 
            }
                
            $grnId = $grnObj->AddGRN($SupplierID,1);///insert supplier id for get grn id
            if ($grnId>0){///if grn id greater than zero 
            for($i=0; $i<sizeof($Rmaterialid); $i++){
                $RowMaterialstockObj->addstock($qty[$i],$CQty[$i],$price[$i],$unit[$i],$SupplierID,$Rmaterialid[$i],$grnId,1,$SubTotal[$i]); ///pass value to row material stock model for add row material deatail
            }
            $msg = "Successfully Add Row Material To Stock!!";//////msg variable create
            $msg = base64_encode($msg);//////msg is encode
            ?>
            <script>
            window.location = "../view/view_r_material_stock.php?msg=<?php echo $msg;?>"/////riderected
            </script> 
            <?php 
        }
    }   catch (Exception $ex) {////////catch exeptionn
        $error = $ex->getMessage();/////////get message value
        $error = base64_encode($error);
        ?>
        <script>
        window.location = "../view/add_row_material_stock.php?error=<?php echo $error; ?>"/////riderected
        </script>
        <?php 
    }
   
    break;
  
}


