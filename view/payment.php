<?php
include '../model/GRN_Model.php';///get user model
include '../model/Payment_Model.php';///get payment model

$grnObj = new add_grn();//create grn object
$PaymentObj = new payment();//create payment object
$GRNResult = $grnObj->getAllGRN();//get pos paymnet income deatil
$posResult = $PaymentObj->getallpospaymentincome();//get pos paymnet income deatil
$onlineResult = $PaymentObj->getallonlinepaymentincome();//get online payment deatil
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>view payment</title>
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
        <!---------///////////header\\\\\\\\\------------>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Breadcrumb" style="height:49px;">
                    <ol class="breadcrumb">
                    <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">PAYMENT MANAGE</h4>
                    <!-- <li class="breadcrumb-item"><a href="payment_view.php" style="color: #000;font-size:20px;text-decoration:none;">VIEW PAYMENT</a></li> -->
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row">&nbsp;</div>
        <div class="row">
        <div class="col-md-12">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link show active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"  aria-controls="nav-home" >ONLINE PAYMENT</a>
                <a class="nav-item nav-link " id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" >POS PAYMENT</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" >PAID PAYMENT</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
        <!---------------------------------online payment  ---------------->
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row">
            <div class="col-md-12">
                <div class="row"><div class="col-md-12">&nbsp;</div></div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr style="color: #fff"  class="bg-primary text-center" >
                                <th scope="col">INVOICE ID</th>
                                <th scope="col">INVOICE NUMBER</th>
                                <th scope="col">INVOICE DATE</th>
                                <th scope="col">INCOME</th>
                                <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php while ($Orow=$onlineResult->fetch_assoc()){$INVId = $Orow["invoice_id"];$INVId = base64_encode($INVId);?>
                                <tr class="text-center">
                                <td><?php "#" ?> <?php echo $Orow["invoice_id"]?></td>
                                <td><?php echo $Orow["invoice_number"]?></td>
                                <td><?php echo $Orow["invoice_date"]?></td>
                                <td><?php echo $Orow["invoice_payamount"]?></td>
                                <td><a href="../view/get_online_invoice.php?inv_id=<?php echo $INVId; ?>" class="btn btn-secondary" type="button" >GET INVOICE</a>&nbsp;
                                </tr>
                                <?php
                                }
                                ?>
                          </tbody>
                        </table>
                    </div>
                </div>    
            </div> 
        </div> 
        </div>
        <!-----------------------------online payment end ----------------->
        <!----------------------------- pos payment ----------------------->
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row">
            <div class="col-md-12">
                <div class="row"><div class="col-md-12">&nbsp;</div></div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="example2">
                            <thead>
                                <tr style="color: #fff"  class="bg-primary text-center" >
                                <th scope="col">INVOICE ID</th>
                                <th scope="col">INVOICE NUMBER</th>
                                <th scope="col">INVOICE DATE</th>
                                <th scope="col">INCOME</th>
                                <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php while ($Prow=$posResult->fetch_assoc()){$INVId = $Prow["invoice_id"];$INVId = base64_encode($INVId);?>
                                <tr class="text-center">
                                <td><?php "#" ?> <?php echo $Prow["invoice_id"]?></td>
                                <td><?php echo $Prow["invoice_number"]?></td>
                                <td><?php echo $Prow["invoice_date"]?></td>
                                <td><?php echo $Prow["invoice_payamount"]?></td>
                                <td><a href="../view/get_pos_invoice.php?inv_id=<?php echo $INVId; ?>" class="btn btn-secondary" type="button" >GET INVOICE</a>&nbsp;
                                </tr>
                                <?php
                                }
                                ?>
                          </tbody>
                        </table>
                    </div>
                </div>    
            </div> 
        </div> 
        
        </div>
        <!-------------------------------pos payment end  ---------------->
        
        <!---------------------- paid payment ---------------------------->
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row">
            <div class="col-md-12">
                <div class="row"><div class="col-md-12">&nbsp;</div></div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="example3">
                            <thead>
                                <tr style="color: #fff"  class="bg-primary text-center" >
                                <th scope="col">GRN_ID</th>
                                <th scope="col">GRN_NO</th>
                                <th scope="col">S_NAME</th>
                                <th scope="col">S_ADDRESS</th>
                                <th scope="col">CREATE DATE</th>
                                <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php while ($row=$GRNResult->fetch_assoc()){$GRNId = $row["grn_id"];$GRNId = base64_encode($GRNId);?>
                                <tr class="text-center">
                                <td><?php echo $row["grn_id"]?></td>
                                <td><?php echo $row["grn_no"]?></td>
                                <td><?php echo $row["supplier_fname"]?> <?php echo $row["supplier_lname"]?></td>
                                <td><?php echo $row["supplier_address"]?></td>
                                <td><?php echo $row["create_date"]?></td>
                                <td><a href="../view/get_grn.php?grn_id=<?php echo $GRNId; ?>" class="btn btn-secondary" type="button" >PRINT GRN</a>&nbsp;
                                <a href="../view/pay_bill.php?grn_id=<?php echo $GRNId; ?>" class="btn btn-success" type="button">PAID</a>
                                </td>
                                </tr>
                                <?php
                                }
                                ?>
                          </tbody>
                        </table>
                    </div>
                </div>    
            </div> 
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
<!-- script call -->
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../js/popper.min.js"></script> 
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/User_Validation.js" ></script>
<script type="text/javascript" src="../js/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/datatable/dataTables.bootstrap4.min.js"></script>
<script>
        $(document).ready(function() {
            $('#example1').DataTable();
            $('#example2').DataTable();
            $('#example3').DataTable();
              // dispaly data togal
            $('[data-toggle="tooltip"]').tooltip();
        }); 
</script>
</html>


