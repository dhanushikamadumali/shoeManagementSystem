<?php 
include '../model/Stock_Model.php';///////include stock model \\\\\\\\\\\\\\\
include '../model/Product_Model.php';///////include product model\\\\\\\\\\\\\

$stockObj= new stock();//////create stock object\\\\\\\\\\
$ProductObj = new  product();////////create product object \\\\\\\\\
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Barcode Genarate</title></title>     
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../css/styles.css">
</head>
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
                    <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">BARCODE GENARATE</h4>
                    <!-- <li class="breadcrumb-item"><a href="product_manage.php" style="color: #000;font-size:20px;text-decoration:none;">PRODUCT MANAGE</a></li> -->
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
                <div class="row">
                    <div class="col-md-12">
                        <div id="Alert"></div>
                    </div> 
                    </div>
         <!-------//////////add product stock //////////------> 
         <div class="row"><div class="col-md-12">&nbsp;</div></div>
         <div class="row"><div class="col-md-12">&nbsp;</div></div>
         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                    <!-- <div class="card shadow" > -->
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="row">&nbsp; </div>
                    <form id="barcode"  method="post" action="barcode.php" enctype="multipart/form-data">
                        <div class="row">
                        <div class="card"> 
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card-body"  style="height:50vh; position:inherit;">
                            <div class="row">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="text-align: right;"><label class="control-lable" >PRODUCT ID :</label></div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                    <input type="text" id="product_id" name="product_id" class="form-control" >
                                    <input type="hidden" id="rno" name="rno" class="form-control" value="5827" >
                                </div>
                            </div>
                            <div  id="getproduct"></div>
                            <div class="row">&nbsp;</div>
                            <div id="size"></div>
                            <div class="row">&nbsp;</div>
                            <div id="quntity"></div>
                            <div class="row">&nbsp;</div>
                        <div class="row">
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">&nbsp;</div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <button type="submit" class="btn btn-primary" id="submit"><i class="fas fa-print"></i>PRINT</button>
                        </button>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    </form>  
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">&nbsp;</div>
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
<!-- script call -->
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
<script  type="text/javascript" src="../js/popper.min.js"></script>   
<script type ="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/barcode_Validation.js"></script>
<script > 
    $('#product_id').keyup(function(){
        // get product 
        let productId = parseFloat($('#product_id').val());
        $.ajax({
                url: "../controller/BarcodeController.php?status=getproduct",
                type:'POST',
                data:{productId:productId},
                success: function(res){
                    if(res != "error"){
                        console.log(res);
                        $('#getproduct').html(res);
                    }     
                },
               	
            });
        // end
        // get size
        $.ajax({
            url: "../controller/BarcodeController.php?status=getSize",
            type:'POST',
            data:{productId:productId},
            success: function(res){
                console.log(res);
                $('#size').html(res);    
            }
        });
        // end   
    });
    function load(y){
        let sizeId = $('#SizeId' + y).val();
        let productId = $('#product_id').val();
        let barcode =$('#barcode' + y).val();
            
        // get quntity
        $.ajax({
            url: "../controller/BarcodeController.php?status=getquntity",
            type:'POST',
            data:{productId:productId,sizeId:sizeId},
            success: function(res){
                console.log(res);
                $('#quntity').html(res);
            }
        });
        // end
        // for barcode update
        $.ajax({
            url: "../controller/BarcodeController.php?status=updatebarcode",
            type:'POST',
            data:{productId:productId,sizeId:sizeId,barcode:barcode},
            success: function(data){
               
            },
        });
        // end
    }     
</script>
</html>


