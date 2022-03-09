<?php
include '../model/Supplier_Model.php';///include supplier model

$SupplierObj = new supplier();///create supplier object
$SupplierResult = $SupplierObj->getAllSupplier();//get all supplier
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Supplier view</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="All" href="../css/stylesdisplaysupplier.css">    
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
</head>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
    include_once '../includes/redirect.php';///include redirect
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <!--------/////////////title bar\\\\\\\\\\\-------->
        <div class="row">&nbsp;</div>
        <div class="row">
        <div class="col-md-12">
            <nav aria-label="Breadcrumb" style="height:45px;">
                <ol class="breadcrumb">
                <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">SUPPLIER MANAGEMENT</h4>
                </ol>
            </nav>
        </div>
        </div>
        <!--------//////////title bar end \\\\\\\\\\\\------------>
        <div class="row">&nbsp;</div>
       <div class="row">
            <div class="col-md-12">
                <ul class=" nav nav-pills ">
                    <a href="add_supplier.php" class="btn btn-outline-primary ml-auto" ><i class="fas fa-plus"></i> &nbsp; Add Supplier</a>
                </ul>    
            </div>
        </div>
        <div class="row">
            &nbsp;
        </div>
        <!--------/////////view customer table\\\\\\\\\------------>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
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
                                    ?>
                                    <div class="alert alert-danger"><?php echo base64_decode($_REQUEST["error"]);?></div>
                                <?php 
                                }
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
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <table class="table table-bordered " id="example">
                            <thead >
                                <tr style="color: #fff"  class="bg-primary text-center" >
                                <th scope="col">Supplier Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">&nbsp;</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($Supprow=$SupplierResult->fetch_assoc()){$SuppId = $Supprow["supplier_id"];$SuppId = base64_encode($SuppId);?>
                                <tr class="text-center">
                                <td><img src="../image/supplier_image/<?php echo $Supprow["supplier_image"];?>" style="width:50px;height:50px;border-radius:50%;margin-left: 35px" alt=""/></td>
                                <td><?php echo $Supprow["supplier_fname"];?> <?php echo $Supprow["supplier_lname"];?></td>
                                <td><?php echo $Supprow["supplier_email"];?></td>
                                <td>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#displaysupplier" onclick="load_data(<?php echo $Supprow["supplier_id"]; ?>)">
                                        <i class="fas fa-search"></i>&nbsp;
                                    </button>
                                    <a href="../view/edit_supplier.php?supplier_id=<?php echo $SuppId;?>" class="btn btn-warning" style="color:#fff"  data-toggle="tooltip" title="edit"><i class="far fa-edit"></i>&nbsp;</a>
                                </td>
                                </tr>
                                <?php
                                }
                                ?>
                          </tbody>
                        </table>
                    </div>
                    <div class="col-md-1"></div>
                </div>    
            </div> 
        </div> 
         <!-------////////////view supplier table end\\\\\\\\\----------->
         <!-------///////////display supplier profile modal\\\\\\\\\----->
         <div class="modal fade" id="displaysupplier"  role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="displaysupplier">VIEW SUPPLIER PROFILE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                 <div class="modal-body">
                    <div id="supp_count"></div>   
                </div>
            </div>
            </div>
        </div>
         <!-------///////////display supplier profile modal end\\\\\\\\\----->
       </div> 
       <!--------///////////////// Content End\\\\\\\\\\\\\\\\\\\\----------->
    </div>
    <!-----------//////////////// Flud End\\\\\\\\\\\\\\\\\\\\\\\\\\\\------>
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
<script type="text/javascript" src="../js/Supplier_Validation.js" ></script>
<script>
     //display data table
    $(document).ready(function() {
        $('#example').DataTable();
    // dispaly data togal
        $('[data-toggle="tooltip"]').tooltip();
    });
    //input number only
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!/[0-9]/.test(ch)){
        evt.preventDefault();
    }
    }
    ///view modal
    function load_data(x){
        var url="../controller/SupplierController.php?status=viewSupplier";
            $.post(url,{supplier_id:x},function(data){
            $("#supp_count").html(data).show();
        });
    }  
</script>
</html>



