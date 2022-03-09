<?php
include '../model/R_M_Stock_Model.php';///////include row material stock model

$RowMaterialStockObj = new row_material_stock();////////create row material stock object
$RowMaterialStockResult = $RowMaterialStockObj->getAllRMStockDetails();//////////get all row material stock
?>  
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">     
    <title>Row Material Stock View</title>
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
                <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">VIEW ROW MATERIAL STOCK</h4>
                <li class="breadcrumb-item"><a href="add_row_material_stock.php" style="color: #000;font-size:20px;text-decoration:none;">ADD TO STOCK</a></li>
                <li class="breadcrumb-item"><a href="row_material.php" style="color: #000;font-size:20px;text-decoration:none;">ADD NEW ROW MATERIAL</a></li>
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
                        <th scope="col">ROW MATERIAL STOCK ID</th>
                        <th scope="col">SUPPLIER</th>
                        <th scope="col">ROW MATERIAL NAME</th>
                        <th scope="col">UNIT</th>
                        <th scope="col">AVAILABLE QUANTITY</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">SUB TOTAL</th>
                        <th scope="col">STOCK DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($RRow=$RowMaterialStockResult->fetch_assoc()){$stockId = $RRow["r_m_stock_id"];$stockId = base64_encode($stockId)?>  
                    <tr class="text-center">
                        <td><?php echo $RRow["r_m_stock_id"];?></td>
                        <td><?php echo $RRow["supplier_fname"]; ?> <?php echo $RRow["supplier_lname"]; ?></td>
                        <td><?php echo $RRow["r_material_name"];?></td>
                        <td><?php echo $RRow["unit_name"];?></td>
                        <td><?php echo $RRow["r_m_stock_a_quantity"];?></td>
                        <td><?php echo $RRow["unit_price"];?></td>
                        <td><?php echo $RRow["sub_total"];?></td>
                        <td><?php echo $RRow["stock_date"];?></td>
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


