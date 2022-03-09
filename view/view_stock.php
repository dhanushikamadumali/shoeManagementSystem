<?php 
include '../model/Stock_Model.php';////////include stock model
include '../model/Product_Model.php';////////include product model

$stockObj= new stock();//////create stock object
$ProductObj = new  product(); //////create product object
$stockResult = $stockObj->getAllProductStock(); //////////get all stock result
?>  
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">     
    <title>View Stock</title>
    <link  rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link  rel="stylesheet" type="text/css" href="../bootstrap/fontawesome/css/all.css">
    <link  rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">
</head>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
    include_once '../includes/redirect.php';///include redirect
    ?>
    <div class="container">
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>      
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
    <!--------///////////title bar\\\\\\\\\\\\\\\-------->
        <div class="row">
        <div class="col-md-12">
            <nav aria-label="Breadcrumb" style="height:49px;">
                <ol class="breadcrumb">
                <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">VIEW STOCK</h4>
                <li class="breadcrumb-item"><a href="product_manage.php" style="color: #000;font-size:20px;text-decoration:none;">PRODUCT MANAGE</a></li>
                </ol>
            </nav>
        </div>
        </div>
    <!--------////////title bar end\\\\\\\\\\\\\\\-------->   
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
    <!--//////////////////alert \\\\\\\\\\\\\\\\\\\\\\ -->
        <div class="row ">
        <?php
        if (isset($_REQUEST["msg"])) {
            ?>
            <div class="col-md-12">
                <div class="alert alert-success">
                    <?php $msg = $_REQUEST["msg"];
                    echo $msg = base64_decode($msg)
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
    <!-- ///////////////////alert end\\\\\\\\\\\\\\\\ -->
        <div class="row">
        <div class="col-md-12">
        <div class="col-md-12"><span>&nbsp;</span></div>
        <!--/////////// view stock table \\\\\\\\\\\\\-->
        <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr style="color: #fff"  class="bg-primary text-center" >
                            <th scope="col">STOCK ID</th>
                            <th scope="col">PRODUCT</th>
                            <th scope="col">QUANTITY</th></th>
                            <th scope="col">SIZE</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">EDIT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($Stockrow=$stockResult->fetch_assoc()){
                                $productId=$Stockrow['product_id'];
                                $StockId = $Stockrow["productstock_id"];$StockId = base64_encode($StockId);
                                $productImg =$stockObj->getAllimage($productId);
                                $imgRow=$productImg->fetch_assoc();
                        ?>
                        <tr class="text-center">
                            <td><?php echo $Stockrow["productstock_id"]?></td>
                            <td><img src="../image/product_image/<?php echo $imgRow["product_img_name"];?>" style="width:50px;height:50px;margin-left: 30px" alt=""/>&nbsp; <?php echo $Stockrow["product_name"]?></td>
                            <td><?php echo $Stockrow["a_quantity"]?></td>
                            <td><?php echo $Stockrow["size"]?></td>
                            <td><?php echo $Stockrow["price"]?></td>
                            <td><a href="../view/edit_stock.php?productstock_id=<?php echo $StockId; ?>" class="btn btn-primary" style="color:#fff"  data-toggle="tooltip" title="edit"> <i class="fas fa-pencil-alt fa-1x"></i>&nbsp;</a></td>
                                    
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <!--/////////////////view end stock table\\\\\\\\\\\\\\\\  -->
        </div> 
    </div>
    </div> 
    <!--////////////////// Content End\\\\\\\\\\\\\\\\\\\\\\\\\\\\------>
    </div>
    <!----///////////// Flud End\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\------>
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
        $(document).ready(function() {
            // display data table
            $('#example').DataTable();
             // dispaly data togal
        $('[data-toggle="tooltip"]').tooltip();
        });
</script>
</html>


