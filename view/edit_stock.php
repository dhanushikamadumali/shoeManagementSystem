<?php 
include '../model/Stock_Model.php';///////include stock model 
include '../model/Product_Model.php';///////include product model

$stockObj= new stock();//////create stock object
$ProductObj = new  product();////////create product object

$StockId = $_REQUEST["productstock_id"];//////request stock id
$StockId = base64_decode($StockId);//////////decode stock id
$StockResult = $stockObj->getStockDetail($StockId);////////pass stock id to stock model
$Row = $StockResult->fetch_assoc();//make result as an array
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">     
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link href="../bootstrap/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
<title>Edit Stock</title></title>
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
                    <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">EDIT STOCK</h4>
                    <li class="breadcrumb-item"><a href="view_stock.php" style="color: #000;font-size:20px;text-decoration:none;">STOCK MANAGE</a></li>
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
         <!-------//////////add edit stock //////////------> 
         <div class="row"><div class="col-md-12">&nbsp;</div></div>
         <div class="row"><div class="col-md-12">&nbsp;</div></div>
         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <img src="../image/product_image/<?php echo $Row['product_img_name'];?>" alt="" class="product_image" >
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <!-- alert -->
                        <div class="row"><div class="col-md-12"><div id="StockAlert"></div></div></div>
                        <!-- alert end -->
                        <h2 style="font-weight: bold;"><?php echo strtoupper($Row['product_name'])?></h2>
                        
                        <div class="row">&nbsp; </div>
                    <form id="Stock" method="post" action="../controller/StockController.php?status=eidtstock" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="stock_id" id="stock_id" value="<?php echo $StockId;?>">
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><label>SIZE</label></div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><label><?php echo $Row['size'] ?></label></div>
                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><label>QUANTITY</label></div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><label><?php echo $Row['a_quantity'] ?></label></div>
                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><label>PRICE</label></div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><label><?php echo $Row['price'] ?></label></div>
                                <input type="hidden" name="price" id="price" value="<?php echo $Row['price'];?>">
                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><label>DISCOUNT</label></label></div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><input class="form-control" type="text" name="discount" id="discount" value="00" min="0" maxlength="3"></div>
                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><label>NEW PRICE</label></div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><input type="text" class="form-control" name="newprice" id="newprice" value="00"></div>
                            </div>
                            <div class="row">&nbsp;</div>
                            
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">&nbsp;</div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <button type="submit" class="btn btn-block btn-primary" name="submit" id="submit" style="box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.3), 0 3px 10px 0 rgba(0, 0, 0, 0.19)">
                            UPDATE
                            </button>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <button type="reset" class="btn btn-block btn-danger" name="reset" id="reset" style="box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.3), 0 3px 10px 0 rgba(0, 0, 0, 0.19)">
                                RESET
                            </button>
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
                   
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
<!-- including js -->
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script> 
<script type="text/javascript" src="../js/popper.min.js"></script>    
<script type ="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script>  
    //discount change function
    $('#discount').keyup(function(){
        var discount = parseFloat($('#discount').val());
        var price = parseFloat($('#price').val());
        if(discount != null){
            let DisResult = (price * discount)/100;
            DisResult= price - DisResult;
            $('#newprice').val(DisResult.toFixed(2));
        }else{
            $('#discount').val(0);
            $('#newprice').val(price);
            
        }
    });
</script>
</html>


