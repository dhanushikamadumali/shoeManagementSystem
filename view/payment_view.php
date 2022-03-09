<html>
<head>
<?php 
include '../model/Payment_Model.php';////////include payment model\\\\\\\\\\\

$PaymentObj= new payment();//////create payment object\\\\\\
$paymentResult = $PaymentObj->getAllPayment(); //////////get all payment result\\\\\\\\\
?>      
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">     
    <title>view payment</title>
    <link  rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link  rel="stylesheet" type="text/css" href="../bootstrap/fontawesome/css/all.css">
    <link  rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">
</head>
<body>
    <!-- include navbar -->
    <?php  include('../includes/navbar.php'); ?>
    <div class="container">
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>      
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
    <!--------///////////title bar\\\\\\\\\\\\\\\-------->
        <div class="row">
        <div class="col-md-12">
            <nav aria-label="Breadcrumb" style="height:49px;">
                <ol class="breadcrumb">
                <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">VIEW PAYMENT</h4>
                <li class="breadcrumb-item"><a href="payment.php" style="color: #000;font-size:20px;text-decoration:none;">PAYMENT MANAGE</a></li>
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
                            <th scope="col">PAYMENT ID</th>
                            <th scope="col">PAY AMOUNT</th>
                            <th scope="col">PAYMENT DATE</th></th>
                            <th scope="col">PAYMENT TYPE</th></th>
                            <th scope="col">COMMENT</th></th>
                            <th scope="col">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=$paymentResult->fetch_assoc()){
                        ?>
                        <tr class="text-center">
                            <td><?php echo $row["payment_id"]?></td>
                            <td><?php echo $row["payment_total_amount"]?></td>
                            <td><?php echo $row["payment_date"]?></td>
                            <td><?php echo $row["payment_type"]?></td>
                            <td><?php echo $row["comment"]?></td>
                            <td> <?php if($row["p_status"]=="1"){ ?>    
                                <label style="color:#000;font-weight:bold">PAID</label>
                                <?php } ?> 
                                <?php if($row["p_status"]=="0") {?>
                                <label style="color:#000">UN PAID</label>
                                <?php }?></a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <!--/////////////////view end  table\\\\\\\\\\\\\\\\  -->
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
        });
</script>
</html>


