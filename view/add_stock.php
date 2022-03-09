<?php 
include '../model/Stock_Model.php';///////include stock model 
include '../model/Product_Model.php';///////include product model

$stockObj= new stock();//////create stock object
$ProductObj = new  product();////////create product object

$ProductId = $_GET["product_id"];//////request product id
$ProductId = base64_decode($ProductId);//////////decode product id
$productResultTwo = $ProductObj->getProduct($ProductId);////////pass product id to product model
$pRow = $productResultTwo->fetch_assoc();

?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title>Add Stock</title>  
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../css/styles.css">
</head>
<style>
.product_image{
    /* border: 5px solid #000; */
  border-radius: 4px;
  padding: 5px;
  width: 300px;
  border: 1px solid #000;
  height: 400px;
  
}
</style>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
    include_once '../includes/redirect.php';///include redirect
    ?>
    <div class="container">
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!---------///////////header\\\\\\\\\------------>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Breadcrumb" style="height:49px;">
                    <ol class="breadcrumb">
                    <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">ADD STOCK</h4>
                    <li class="breadcrumb-item"><a href="product_manage.php" style="color: #000;font-size:20px;text-decoration:none;">PRODUCT MANAGE</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row">&nbsp;</div>
        <!--------///////user view table\\\\\\\\\\\-------->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if(isset($_GET["error"])){
                        ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <?php
                                $error = $_REQUEST["error"];
                                $error = base64_decode($error);
                                echo $error;
                                ?>    
                            </div>
                        </div>
                        <?php
                        }
                        ?>    
                    </div>
                </div>
         <!-------//////////add product stock //////////------> 
         <div class="row"><div class="col-md-12">&nbsp;</div></div>
         <div class="row"><div class="col-md-12">&nbsp;</div></div>
         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <img src="../image/product_image/<?php echo $pRow['product_img_name'];?>" alt="" class="product_image" >
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <!-- alert -->
                        <div class="row"><div class="col-md-12"><div id="StockAlert"></div></div></div>
                        <!-- alert end -->
                        <h2 style="font-weight: bold;"><?php echo strtoupper($pRow['product_name'])?></h2>
                        <div class="row">&nbsp; </div>
                    <form id="stock" method="post" action="../controller/StockController.php?status=add_Stock" enctype="multipart/form-data">
                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $ProductId;?>">
                        <input type="hidden" name="pname" id="pName" class="form-control" readonly="readonly" value="<?php echo $pRow["product_name"];?>">
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="text-align: right;"><label class="control-lable" >Price :</label></div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="btnGroupAddon">RS</div>
                                        </div>
                                        <input type="text" id="product_price" name="product_price" class="form-control" aria-describedby="btnGroupAddon" onkeypress="return isNumberKey(event)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">&nbsp;</div>
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <table class="table table-responsive-*">
                                    <thead>
                                        <tr>
                                            <th class="text-left text-muted text-uppercase w-60">size</th>
                                            <th class="text-left text-muted text-uppercase w-200">QUANTITY</th>
                                            <th class="text-left text-muted text-uppercase w-200">REORDER</th>
                                        </tr>
                                    </thead> 
                                <?php 
                                    $getproductSize = $ProductObj->getproductsize($ProductId);
                                    while($row = $getproductSize->fetch_assoc()){
                                ?>              
                                    <tbody>
                                        <tr>
                                            <td><input class="chkbx" type="checkbox" name="size[]" id="sizeId" key="size" value="<?php echo $row['size_id'];?>" > <?php echo " ".$row['size'];?> </td>
                                            <td><input type="text" name="qty[]" id="qty<?php echo $row['size_id'];?>" class="form-control text-center" onkeypress="isInputNumber(event)" style="width: 100px;"></td>
                                            <td><input type="text" name="reorder[]" id="qty<?php echo $row['size_id'];?>" class="form-control text-center"  style="width: 100px;"></td>
                                        </tr>
                                    </tbody>
                                <?php 
                                    }   
                                ?>
                                 </table>
                            </div>  
                            <!-- <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <table class="table table-responsive-*">
                                    <thead>
                                        <tr>
                                            
                                            <th class="text-left text-muted text-uppercase w-200">REORDER</th>
                                        </tr>
                                    </thead> 
                                <?php 
                                    $getproductSize = $ProductObj->getproductreorder($ProductId);
                                    while($row = $getproductSize->fetch_assoc()){
                                ?>              
                                    <tbody>
                                        <tr>
                                           
                                            <td><input type="text" name="qty[]" id="qty<?php echo $row['a_quantity'];?>" class="form-control text-center" value="<?php echo $row['a_quantity'];?>" style="width: 100px;"></td>
                                        </tr>
                                    </tbody>
                                <?php 
                                    }   
                                ?>
                                 </table>
                            </div>       -->
                            </div> 
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">&nbsp;</div> 
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">&nbsp;</div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <button type="submit" class="btn btn-block btn-primary" name="submit" id="submit" style="box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.3), 0 3px 10px 0 rgba(0, 0, 0, 0.19)">
                            Add to stock
                            </button>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <button type="reset" class="btn btn-block btn-danger" name="reset" id="reset" style="box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.3), 0 3px 10px 0 rgba(0, 0, 0, 0.19)">
                                Reset
                            </button>
                            </div>
                        </div>
                        </div>
                        </div>
                    </form>   
                    </div> 
               
                 </div>   
             </div>
         </div>
         <!-------///////////add to stock end///////////------>
        </div>
        </div> 
       <!------///////// Content End\\\\\\\\------>
    </div>
    <!---------/////////// Flud End\\\\\\\\\\------>
    </div>
    </div> 
</body>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>  
<script type ="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/stock_Validation.js"></script>
<script type="text/javascript">  
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }
</script>
</html>


