<?php
include '../model/Customer_Model.php';///include customer model

$CustomerObj = new customer();//create customer object
$CustomerResult = $CustomerObj->getAllCustomer();///get all customer

?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Customer view</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
    <link rel="stylesheet" type="text/css" media="All" href="../css/stylesdisplaysupplier.css">  
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
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
        <div class="row">
            <div class="col-md-12">
            <nav aria-label="Breadcrumb" class="breadcrumb" style="height:49px;">
            <h4>CUSTOMER MANAGEMENT</h4>
            </nav>
            </div>
        </div>
           <!----------////////////////button\\\\\\\\\\\\\\\\\----------->
        <div class="row">
            <div class="col-md-12">
                <ul class=" nav nav-pills ">
                    <a href="add_customer.php" class="btn btn-outline-primary ml-auto" ><i class="fas fa-plus"></i> &nbsp; Add Customer</a>
                </ul>    
            </div>
        </div>
           <!----------//////////////////button end\\\\\\\\\\\\\------------------->  
        <!-- <div class="row">&nbsp;</div> -->
            <!---------///////////////////view customer table\\\\\\\\\\\\\\\------------>
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
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <table class="table table-bordered" id="example"  >
                                <thead >
                                    <tr style="color: #fff"  class="bg-primary text-center" >
                                    <th scope="col">CUSTOMER IMAGE</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">&nbsp;</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php while ($Cusrow=$CustomerResult->fetch_assoc()){$CusId = $Cusrow["customer_id"];$CusId = base64_encode($CusId);?>
                                    <tr  class="text-center"> 
                                    <td><img src="../image/customer_image/<?php echo $Cusrow["customer_image"];?>" style="width:50px;height:50px;border-radius:50%;margin-left: 50px" alt=""/></td>
                                    <td><?php echo $Cusrow["customer_fname"]?> <?php echo $Cusrow["customer_lname"]?></td>
                                    <td><?php echo $Cusrow["customer_email"]?></td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#displaycustomer" onclick="load_data(<?php echo $Cusrow["customer_id"]; ?>)">
                                            <i class="fas fa-search"></i>&nbsp;
                                        </button>
                                    </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                              </tbody>
                            </table>
                        </div>
                        <div class="col-md-1">
                    </div>    
                </div> 
         <!-------///////////////////view customer table end\\\\\\\\\\\\\\\\\\---->      
        <!-------////////////////display customer profile modal\\\\\\\\\\\\\\\\\\\\\\\\\\------->
         <div class="modal fade" id="displaycustomer"  role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">VIEW CUSTOMER PROFILE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div id="cus_count"></div>   
                </div>
            </div>
            </div>
        </div>
         <!-------/////////display customer profile modal end\\\\\\\\\\\\\\\\\\\----->
        </div>
        </div> 
       <!-------////////// Content End\\\\\\\\\\\\\\\\\\------>
    </div>
    <!----------/////////////// Flud End\\\\\\\\\\\\\\\\\\\\\\\------>
    </div>
  </div>   
</body>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
<script type="text/javascript"src="../js/popper.min.js"></script>  
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/Customer_Validation.js" ></script>
<script type="text/javascript" src="../js/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/datatable/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
          // dispaly data togal
          $('[data-toggle="tooltip"]').tooltip();
    });
    ////image preview
    function readURL(input) {
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#prev_img')
                .attr('src',e.target.result)
                .height(70)
                .width(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    ////image preview end
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
            if(!/[0-9]/.test(ch)){
                evt.preventDefault();
            }
    }
    function load_data(x){
        var url="../controller/CustomerController.php?status=viewCustomer";
            $.post(url,{customer_id:x},function(data){
                $("#cus_count").html(data).show();
             });
        }   
</script>
</html>


