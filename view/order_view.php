<?php
include '../model/Order_Model.php';////include order model

$OrderObj = new order();//create order object
$invoice_id =$_GET['status'];///get invoice id
$invoice_id = base64_decode($invoice_id);//decode invoice id
$orderResult = $OrderObj->getAllOrderProduct($invoice_id);//get all order product detail
$invoiceResult = $OrderObj->getInvoiceDetail($invoice_id);//get all invoice detail
$row1 = $invoiceResult->fetch_assoc();///get result to array value
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
                    <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">ORDER DETAILS</h4>
                    <li class="breadcrumb-item"><a href="order.php" style="color: #000;font-size:20px;text-decoration:none;">ORDER MANAGE</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
                <!-- alert -->
                <div class="row">
                    <div class="col-md-12" id="productContent">
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
                <!-- alert end -->
                <div class="row"><div class="col-md-12">&nbsp;</div></div>
                <div class="row"> 
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form  method="post" action="../controller/DiliveryController.php?status=addDilivery" enctype="multipart/form-data">
                        <div class="row">
                            <!-- invoice detail view -->
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <label style="font-weight: bold;">CHANGE ORDER STATUS :</label>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <select class="form-control" id="statusId" name="dilivery_sta">
                                                <option value="">SELECT STATUS</option>
                                                <option value="Pending">PENDING</option>
                                                <option value="Delivered">DELIVERED</option>
                                                <option value="Shipped">SHIPPED</option>
                                            </select> 
                                        </div>
                                        </div>
                                        <div class="row">&nbsp;</div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><label>INVOICE NUMBER :</label></div>
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                <input name="InvNo"  type="text" class="form-control" value="<?php echo $row1["invoice_number"] ?>" readonly>
                                                <input name="InvId"  id="InvId" type="hidden" class="form-control" value="<?php echo $invoice_id ?>" readonly>
                                                <input name="MoNumber"  id="MoNumber" type="hidden" class="form-control" value="<?php echo $row1["mobile_number"] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">&nbsp;</div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><label>INVOICE DATE :</label></div>
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                <input name="InvDate" type="text" class="form-control" value="<?php  echo $row1["invoice_date"]?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">&nbsp;</div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><label>CUSTOMER NAME :</label></div>
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                <input name="CusName" type="text" class="form-control" value="<?php echo $row1["customer_fname"]?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">&nbsp;</div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><label>CUSTOMER ADDRESS :</label></div>
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                <input name="CusAddr" type="text" class="form-control" value="<?php echo $row1["customer_address"] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">&nbsp;</div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><label>PAY AMOUNT :</label></div>
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                <input name="InvPayAmount" type="text" class="form-control" value="<?php echo $row1["invoice_payamount"] ?>" readonly>
                                            </div>
                                        </div>  
                                </div>
                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">&nbsp;</div>
                            <div class="row"> 
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <button type="submit" class="btn btn-primary">DELIVERED</button>
                                </div>   
                            </div>
                            </div>
                            <!-- invoice detail view end -->
                            <!-- invoice product detail -->
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <table class="table table-bordered" id="example">
                                <thead>
                                    <tr style="color: #fff"  class="bg-primary text-center" >
                                    <th scope="col">Product name</th>
                                    <th scope="col">Quntity</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Product price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while ($row=$orderResult->fetch_assoc()){?>
                                    <tr class="text-center">
                                    <td><?php echo $row["product_name"]?> </td>
                                    <td><?php echo $row["quntity"]?></td>
                                    <td><?php echo $row["size_id"]?></td>
                                    <td><?php echo $row["price"]?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            </div>
                            <!-- view end -->
                        </form>
                    </div>
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
    $('#statusId').change( function(){       
        let InvId = $('#InvId').val();
        let diliveryStatus = $('#statusId').val();
        let mobileNumber = $('#MoNumber').val();
            $.ajax({
                url: "../controller/OrderController.php?status=updateStatus",
                type:'POST',
                data:{InvId:InvId, diliveryStatus:diliveryStatus,mobileNumber:mobileNumber},
                success: function(res){
                    if(res != "error"){
                        swal("Successfully Send Massage To Customer", "", "success");
                        setTimeout(function(){window.location.reload();  }, 1500);
                    }
                    // window.location.href="dilivery.php";   
                    console.log(res);
                },
            });
        });
</script>
</html>


