<?php
include '../model/Product_Model.php';///////include product model

$ProductObj = new product();////////create product object
$ProductResult = $ProductObj->getAllProduct();//////////get all product
?> 
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stock Report</title>
    <link  rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link  rel="stylesheet" type="text/css" href="../bootstrap/fontawesome/css/all.css">
    <link  rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">
</head>
<style>
.view:focus {
    outline-style: none;
}
</style>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
    include_once '../includes/redirect.php';///include redirect
    ?>
    <div class="container">
        <!---------///////////header\\\\\\\\\------------>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row">&nbsp;</div>
        <div class="row">
        <div class="col-md-12">
            <nav aria-label="Breadcrumb" style="height:49px;">
                <ol class="breadcrumb">
                <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">STOCK REPORT</h4>
                <li class="breadcrumb-item"><a href="report.php" style="color: #000;font-size:20px;text-decoration:none;">REPORT MANAGE</a></li>
                </ol>
            </nav>
        </div>
        </div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row">&nbsp;</div>
        <!--------///////user view table\\\\\\\\\\\-------->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if(isset($_GET["msg"])){
                        ?>
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <?php
                                $msg = $_REQUEST["msg"];
                                $msg = base64_decode($msg);
                                echo $msg;
                                ?>    
                            </div>
                        </div>
                        <?php
                        }
                        ?>    
                    </div>
                </div>
                <!-- <div class="row"><div class="col-md-12">&nbsp;</div></div> -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- ALL ORDER PLACE -->
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <button id="available" name="available" class="btn btn-primary">AVAILABLE STOCK REPORT</button>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <button id="outof" name="outof" class="btn btn-primary">OUT OF STOCK REPORT</button>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <button id="reoder" name="outof" class="btn btn-primary">REORDER STOCK REPORT</button>
                                </div>
                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                            <!-- <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <select id="product_Id" name="product_Id" class="form-control">
                                    <option value="">Select Here..</option>
                                    <?php while ($Row = $ProductResult->fetch_assoc()){ ?>
                                    <option value="<?php echo $Row['product_id']; ?>"><?php echo $Row['product_name']; ?></option>
                                    <?php }?>
                                </select> -->
                                <!-- <form  method="post" action="../view/report_customed_order.php" enctype="multipart/form-data" >     -->
                                    <!-- <div class="row">
                                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><label style="font-weight: bold;">FROM :</label></div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><input type="date" class="form-control" id="FromDate" name="FromDate"></div>
                                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><label style="font-weight: bold;">TO :</label></div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><input type="date" class="form-control" id="ToDate" name="ToDate"></div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <button id="cusdate" class="btn btn-primary">GET REPORT </button>
                                    </div> 
                                    </div> -->
                                <!-- </form> -->
                                <!-- </div>  -->
                            </div>
                            <div class="row">
                                &nbsp;
                            </div>
                            <!-- <form  method="post" action="report_available_cus_stock.php" enctype="multipart/form-data" > -->
                            <!-- <div class="row">
                           
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <input type="date" class="form-control" id="FromDate" name="FromDate">
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <input type="date" class="form-control" id="ToDate" name="ToDate">
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <a id="cusdate" class="btn btn-primary">GET REPORT </a>
                                    </div> 
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <div id="report1"></div>
                        </div> 
                            </div>
                            </form>  -->
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <div id="report"></div>
                        </div> 
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div id="select"></div>
                        </div>
                    </div>
                    </div> 
                    <!-- ALL ORDER PLACE END -->
                    </div> 
                    </div>
                </div>
                <div class="row"><div class="col-md-12">&nbsp;</div></div> 
            </div> 
         <!-------/////////user view table end//////////---->
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
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/sweetalert.js"></script>
<script type="text/javascript" src="../js/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/datatable/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $("#available").on('click',function(){
        $.ajax({
            url: "../controller/StockReportController.php?status=getStockReportTable",
            type:'POST',
            success: function(res){
                console.log(res);
                $('#select').html(res);
            },
        }); 
        $.ajax({
            url: "../controller/StockReportController.php?status=getAvailableStockReport",
            type:'POST',
            success: function(res){
                console.log(res);
                $('#report').html(res);    
            }
        });       
        
    });  
    $("#outof").on('click',function(){
        $.ajax({
            url: "../controller/StockReportController.php?status=getoutofStockReportTable",
            type:'POST',
            success: function(res){
                console.log(res);
                $('#select').html(res);
            },
        }); 
        $.ajax({
            url: "../controller/StockReportController.php?status=getoutofStockReport",
            type:'POST',
            success: function(res){
                console.log(res);
                $('#report').html(res);    
            }
        });       
        
    }); 
    $("#reoder").on('click',function(){
        $.ajax({
            url: "../controller/StockReportController.php?status=getReorderStockReportTable",
            type:'POST',
            success: function(res){
                console.log(res);
                $('#select').html(res);
            },
        }); 
        // $.ajax({
        //     url: "../controller/StockReportController.php?status=getoutofStockReport",
        //     type:'POST',
        //     success: function(res){
        //         console.log(res);
        //         $('#report').html(res);    
        //     }
        // });       
        
    });  
    // $("#product_Id").change(function(){
    //     var proid = +$('#product_Id').val(); 
    //     alert(proid);
    //     $.ajax({
    //         url: "../controller/StockReportController.php?status=getAvailableProductStock",
    //         type:'POST',
    //         data:{proid:proid},
    //         success: function(res){
    //             console.log(res);
    //             $('#select').html(res);
    //         },
    //     }); 
    //     $.ajax({
    //         url: "../controller/StockReportController.php?status=getAvailableProductStockReport",
    //         type:'POST',
    //         data:{proid:proid},
    //         success: function(res){
    //             console.log(res);
    //             $('#report').html(res);    
    //         }
    //     });       
        
    // });
    // $("#cusdate").on('click',function(){
    //     var cusFromdate = $('#FromDate').val(); 
    //     var cusTodate = $('#ToDate').val(); 
    //     $.ajax({
    //         url: "../controller/StockReportController.php?status=getCusStockReportTable",
    //         type:'POST',
    //         data:{cusFromdate:cusFromdate,cusTodate:cusTodate},
    //         success: function(res){
    //             console.log(res);
    //             $('#select').html(res);
    //         },
    //     }); 
    //     $.ajax({
    //         url: "../controller/StockReportController.php?status=getAvailableCusStockReport",
    //         type:'POST',
    //         data:{cusFromdate:cusFromdate,cusTodate:cusTodate},
    //         success: function(res){
    //             console.log(res);
    //             $('#report1').html(res);    
    //         }
    //     });       
        
    // });  
    
</script>
</html>


