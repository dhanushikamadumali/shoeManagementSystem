<?php
include '../model/Product_Model.php';///////include product model

$ProductObj = new product();////////create product object
$ProductResult = $ProductObj->getAllProduct();//////////get all product
?>  
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">     
    <title>Product Manage</title>
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
                <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">PRODUCT MANAGE</h4>
                <li class="breadcrumb-item"><a href="product.php" style="color: #000;font-size:20px;text-decoration:none;">ADD PRODUCT</a></li>
                </ol>
            </nav>
        </div>
        </div>
    <!--------////////title bar end\\\\\\\\\\\\\\\-------->   
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
    <!--//////////////////alert \\\\\\\\\\\\\\\\\\\\\\ -->
    
   <div class="col-md-12">
        <?php
        if(isset($_REQUEST["msg"])||(isset($_REQUEST["error"]))){ ?>
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_REQUEST["msg"])){?>
                <div class="alert alert-success"><?php echo base64_decode($_REQUEST["msg"]);?></div>
                <?php
                }
                else {
                    ?><div class="alert alert-danger"><?php echo base64_decode($_REQUEST["error"]);?></div>
                <?php
                }
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
                        <th scope="col">P_ID</th>
                        <th scope="col">P_IMAGE</th>
                        <th scope="col">P_NAME</th>
                        <th scope="col">P_CATEGORY</th>
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($PRow=$ProductResult->fetch_assoc()){$ProductId = $PRow["product_id"];$ProductId = base64_encode($ProductId)?>  
                    <tr class="text-center">
                        <td><?php echo $PRow["product_id"]; ?></td>
                        <td><img src="../image/product_image/<?php echo $PRow["product_img_name"];?>" style="width:50px;height:50px;margin-left: 5px"/></td>
                        <td><?php echo $PRow["product_name"];?></td>
                        <td><?php echo $PRow["category_name"];?></td>
                        <td>    
                        <a href="../view/edit_product.php?product_id=<?php echo $ProductId;?>"class="btn btn-warning" style="color:#fff" data-toggle="tooltip" title="edit"><i class="far fa-edit"></i></a>
                        <a href="../view/add_stock.php?product_id=<?php echo $ProductId;?>" class="btn btn-info" style="color:#fff" data-toggle="tooltip" title="add stock"><i class="fas fa-search fa-1x"></i></a>
                        </td>
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


