<?php
include '../model/Order_Model.php';////include order model

$OrderObj = new order();//create order object
$orderResult = $OrderObj->getAllOrder();///get all order detail
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Management</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/fontawesome/css/all.css">
    <link rel="stylesheet"  type="text/css" href="../css/dataTables.bootstrap4.min.css">
</head>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
    include_once '../includes/redirect.php';///include redirect
    ?>
    <div class="container">
        <!---------///////////header\\\\\\\\\------------>
        <div class="row"><div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div></div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <nav aria-label="Breadcrumb" class="breadcrumb" style="height:49px;">
            <h4>ORDER MANAGEMENT</h4>
            </nav>
            </div>
        </div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row">&nbsp;</div>
        <div class="row">
            <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- alert -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                <!-- end -->
                <div class="row"><div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div></div>
                <div class="row">
                    <!-- view order detail -->
                    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- <form id="productview" method="post" action="DiliveryController.php?status=addDilivery" enctype="multipart/form-data">
                    <input type="hidden"  name="orderId" value="<?php echo  $OrderId  ?>" > -->
                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr style="color: #fff"  class="bg-primary text-center" >
                                <th scope="col">Invoice Id</th>
                                <th scope="col">Invoice Date</th>
                                <th scope="col">Invoice Type</th>
                                <th scope="col">Pay Amount</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php while ($row=$orderResult->fetch_assoc()){
                                   $InvoiceId = $row["invoice_id"];
                                ?>
                                <tr class="text-center">
                                <td><?php echo $row["invoice_id"]?> </td>
                                <td><?php echo $row["invoice_date"]?></td>
                                <td><?php echo $row["invoice_type"]?></td>
                                <td><?php echo $row["invoice_payamount"]?></td>
                                <td><?php echo $row["customer_fname"] ?></td>
                                <td>
                                <?php if($row["order_status"]=="Pending"){
                                        echo "<p class= 'text-uppercase' style='color:#ff1a1a;font-weight:bold'>Pending</p>";
                                    }else if($row["order_status"]=="Shipped"){
                                        echo" <p class= 'text-uppercase' style='color:#1a75ff;font-weight:bold'>Shipped</p>";
                                    }else if($row["order_status"]=="Delivered"){
                                        echo"<p class= 'text-uppercase' style='color:#00cc44;font-weight:bold'>Delivered";
                                    }
                                ?>
                                </td>
                                <td>
                                    <a type="button"  href="order_view.php?status=<?php echo base64_encode($row['invoice_id']);?>" class="btn btn-info" >
                                        MORE DETAILS
                                    </a>
                                </td>
                                </tr>
                                <?php
                                }
                                ?>
                          </tbody>
                        </table>
                    <!-- </form> -->
                    </div>
                    <!-- end -->
                </div>    
            </div> 
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
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</html>


