<?php
include '../model/Dilivery_Model.php';///include dilivery model

$DiliveryObj = new dilivery();//dilivery object
$DiliveryResult = $DiliveryObj->getAllDilivery();//get dilivery result

?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dilivery Management</title>
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
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
            <nav aria-label="Breadcrumb" class="breadcrumb" style="height:49px;">
            <h4>DELIVER MANAGEMENT</h4>
            </nav>
            </div>
        </div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row">
        </div>
        <div class="row">&nbsp;</div>
        <!--------///////delivery view table\\\\\\\\\\\-------->
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
                <div class="row"><div class="col-md-12">&nbsp;</div></div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr style="color: #fff"  class="bg-primary text-center" >
                                <th scope="col">D_ID</th>
                                <th scope="col">DELIVER_DATE</th>
                                <th scope="col">DELIVER_NAME</th>
                                <th scope="col">CUSTOMER NAME</th>
                                <th scope="col">CUSTOMER ADDRES</th>
                                <th scope="col">INVOICE NUMBER</th>
                                <th scope="col">STATUS</th> 
                                <!-- <th scope="col">ACTION</th>   -->
                                </tr>
                            </thead>
                            <tbody>
                               <?php while ($row=$DiliveryResult->fetch_assoc()){?>
                                <tr class="text-center">
                                <td><?php echo $row["delivery_id"]?></td>
                                <td><?php echo $row["delivery_date"]?></td>
                                <td><?php echo $row["deliver_name"]?></td>
                                <td><?php echo $row["customer_fname"]?></td>
                                <td><?php echo $row["customer_adrr"]?></td>
                                <td><?php echo $row["invoice_number"]?></td>
                                <td>
                                <?php if($row["delivery_status"]=="1"){
                                     echo"<p class= 'text-uppercase' style='color:#00cc44;font-weight:bold'>Delivered";
                                    }
                                   
                                ?>
                                <!-- <td>
                                    <?php if($row["delivery_status"]=="1"){ ?>    
                                    <a href="../controller/DiliveryController.php?status=DiliverdOrder&delivery_id=<?php echo $row["delivery_id"]; ?>" class="btn btn-danger" style="color:#fff">SHIPPED</a>
                                    <?php } ?> 
                                    <?php if($row["delivery_status"]=="0") {?>
                                    <a href="../controller/DiliveryController.php?status=ShippedOrder&delivery_id=<?php echo $row["delivery_id"];?>" class="btn btn-success" style="color:#fff">DELIVERED</a>
                                    <?php }?>
                                </td> -->
                                </tr>
                                <?php
                                }
                                ?>
                          </tbody>
                        </table>
                    </div>
                </div>    
            </div> 
         <!-------/////////deliovery view table end//////////---->
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


