<?php
include '../commons/session.php';
include '../model/Notifi_Model.php';

$NotifiObj = new notifi();
$countResult=$NotifiObj->getcountuserid();
?> 
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/stylesdashboard.css">       
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/fontawesome/css/all.css">
</head>
<body> 
    <div class="container-fluid">
        <div class="row" >
            <!----side bar start----->
            <div class="bg-dark" id="menu">
                <nav class="siderbar" >
                <ul class="navbar-nav">
                <a  class=" bg-secondary list-group-item list-group-item-action  text-white">  
                    <span style="font-weight: bold;font-size: 20px"  >H.K.ENTERPRISES</span>   
                </a>
                <?php if($_SESSION["user"]["role_id"] == 1 ){ ?>
                <a href="dashboard.php"  class="bg-dark list-group-item list-group-item-action text-white" style="height: 70px" >    
                    <i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;<span style=" font-size: 18px" >Dashboard</span>  
                </a>
                <?php
                }
                ?>
              
                <!-------product management start------->
                <?php if($_SESSION["user"]["role_id"] == 1 || $_SESSION["user"]["role_id"] == 5){ ?>
                <a href="product.php"  class="bg-dark list-group-item list-group-item-action text-white" style="height: 70px">
                    <i class="fas fa-shoe-prints "></i><span style=" font-size: 18px" >Product Management</span>    
                </a>
                <?php
                }
                ?>
                <!------product management end--------->
                <?php if($_SESSION["user"]["role_id"] == 1 || $_SESSION["user"]["role_id"] == 3 ||$_SESSION["user"]["role_id"] == 5 ){?>
                <!---------stock management start-------->
                  <a href="stock.php"  class="bg-dark list-group-item list-group-item-action text-white"  style="height: 70px">  
                    <i class="fas fa-store-alt"></i><span style=" font-size: 18px"  >Stock Management</span>
                </a>   
                <!---------stock management end-------->
                <?php
                }
                ?>
                <!-------order management start-------->
                <?php if($_SESSION["user"]["role_id"] == 1 || $_SESSION["user"]["role_id"] == 4 ){?>
                <a href="order.php"  class="bg-dark list-group-item list-group-item-action text-white" style="height: 70px">   
                    <i class="fas fa-shopping-cart"></i><span style=" font-size: 18px" >Order Management</span>     
                </a>
                <!--------order management end-------->
                <?php
                }
                ?>
                <!-------deliver management start-------->
                <?php if($_SESSION["user"]["role_id"] == 1 || $_SESSION["user"]["role_id"] == 4 ){?> 
                <a href="dilivery.php"  class="bg-dark list-group-item list-group-item-action text-white" style="height: 70px"> 
                    <i class="fas fa-truck-moving"></i><span style=" font-size: 18px" >Deliver Management</span>
                </a>
                <!---------deliver management end--------->
                <?php
                }
                ?>
                <!---------payment management start------->
                <?php if($_SESSION["user"]["role_id"] == 1){?>
                <a href="payment.php"  class="bg-dark list-group-item list-group-item-action text-white" style="height: 70px"> 
                    <i class="fas fa-money-check-alt"></i><span  style=" font-size: 18px" >Payment Management</span> 
                </a>
                <!--------payment management end-------->
                <?php
                }
                ?>
                <?php if($_SESSION["user"]["role_id"] == 1 || $_SESSION["user"]["role_id"] == 2 || $_SESSION["user"]["role_id"] == 3 || $_SESSION["user"]["role_id"] == 4 || $_SESSION["user"]["role_id"] == 5 ){?>
                <!-- user management  -->
                <a href="user.php"  class="bg-dark list-group-item list-group-item-action text-white" style="height: 70px" >
                    <i class="fas fa-users" ></i><span style=" font-size: 18px" >User Management</span>
                </a>
                <!-------user management end------>
                <?php
                }
                ?>
                <!-------customer management start----->
                <?php if($_SESSION["user"]["role_id"] == 1){?>
                <a href="customer.php"  class="bg-dark list-group-item list-group-item-action text-white" style="height: 70px">  
                    <i class="far fa-id-card"></i><span style="font-size: 18px">Customer Management</span>  
                </a>
                <?php
                }
                ?>
                <!-------customer management end------->
                <?php if($_SESSION["user"]["role_id"] == 1){?>
                <!--------supplier management start------>
                <a href="supplier.php"  class="bg-dark list-group-item list-group-item-action text-white" style="height: 70px">  
                    <i class="fas fa-user-tie"></i><span style=" font-size: 18px" >Supplier Management</span>
                </a>
                <?php
                }
                ?>
                <!---------supplier management end-------->
                <!---------report management start-------->
                <?php if($_SESSION["user"]["role_id"] == 1 || $_SESSION["user"]["role_id"] == 5){?>
                <a href="report.php"  class="bg-dark list-group-item list-group-item-action text-white" style="height: 70px">  
                    <i class="fas fa-chart-bar"></i><span style=" font-size: 18px" >Report Management</span>
                </a>
                <?php
                }
                ?>   
                <!----------report management end--------->
                <!---------option-------->
                <a href=""  class="bg-dark list-group-item list-group-item-action text-white" style="height: 70px">  
                    <span style=" font-size: 18px" >Option</span>
                </a>   
                <!----------option--------->
                 <!---------option-------->
                 <?php if($_SESSION["user"]["role_id"] == 1 || $_SESSION["user"]["role_id"] == 5){?>
                 <a href="barcode_genarate.php"  class="bg-dark list-group-item list-group-item-action text-white" style="height: 70px">  
                 <i class="fas fa-barcode 1x-fa"></i><span style=" font-size: 18px" >Barcode Genarate</span>
                </a>  
                <?php
                }
                ?>  
                <!----------option--------->
                </ul>
                </nav>
            </div>
            <!----/////////sidebar end\\\\\\\\\\\\\-------->
            <!-----///////////header nav start\\\\\\\\\\---->
            <div id="content">
            <nav class="navbar navbar-expand-md bg-secondary navbar-secondary" style="height:57px">
                <!-- <ul class="navbar-nav" style="color:#fff"> -->
                <!-- <li class="nav-item active"> -->
                <a href="#"  id="toggle"  class="navbar-toggler-icon" >
                <i class="fas fa-bars" style="color:#fff; font-size:26px;"></i>
                </a>
                <!-- </li> -->
                <!-- <li class="d-flex" >  
                </li> -->
                <!-- </ul> -->
                <?php if($_SESSION["user"]["role_id"] == 1 || $_SESSION["user"]["role_id"] == 2){?>
                <a href="pos.php" style="padding-left:20px;color:#fff; font-size:23px;text-decoration: none" ><li class="fas fa-th " style="color:#fff; font-size:22px;text-decoration: none"></li>&nbsp;POS</a>
                <?php
                }
                ?> 
                <!-- <div class="wrapper">   
                    <input  name="search" type="text" placeholder="search" id="icon">
                    <span id="search-btn"><i class="fas fa-search"></i></span> 
                </div> -->
                <a href="" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-bell ml-auto"  style="font-size:26px;padding-left:920px;color:#fff"></i></a>
                <a style="border-radius:50%;margin-left:-8px;margin-top:-28px;font-size:14px;background-color:#f9041b;padding:0px 4px 0px 4px; color:#FFF;vartical-align:top;"><?php echo $NotifiObj->getUserNotificationCount();  ?></a>
                <div class="image ml-auto"><img src="../image/user_image/<?php echo $_SESSION["user"]["user_image"] ?>" style="width:50px;height:50px;border-radius:50%"></div>
                <a  type="button" id="logout"><i class="fas fa-sign-out-alt ml-auto" style="padding-left:20px;font-size:26px;color:#fff"></i></a> 
                <!-----/////// notification modal\\\\\\\\\\\\\------>
                <div  role="dialog" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header" style="background-color: #4d94ff">
                        <h5 class="modal-title" style="font-weight: bold">NOTIFICATION</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 p-0">
                        <div class="card">
                                <div class="card-body" style="height:60vh; position:inherit; overflow-y:scroll">                        
                                    <div class="row">
                                        <?php
                                        while($row=$countResult->fetch_assoc()){
                                        ?> 
                                        <div class="row">                             
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <img src="../image/user_image/<?php echo $row["user_image"];?>" style="width:50px;height:50px;border-radius:50%;margin-left: 30px">   
                                            </div>
                                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9  P-2">
                                            On <?php echo "<b>" .$row["user_updated_date"] .","."</b>" ?> <?php echo "<b>" .$row["user_fname"]?> <?php echo $row["user_lname"] . "</b>"?> Was Added. 
                                            </div>
                                        </div>                           
                                    </div>
                                    <hr>
                                    <div class="row"> 
                                        <?php 
                                        } ?>                   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
                <!-----//////////////notification modal end\\\\\\\\\\\\\\\\---------->
            </nav>
            <!-----///////////////header nav end\\\\\\\\\\\------->
<!-- js including -->
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script> 
<script type="text/javascript" src="../js/popper.min.js"></script>   
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/dashboard_validation.js"></script> 
<script type="text/javascript" src="../js/sweetalert.js"></script>
<script>
    $(document).ready(function(){
        // dispaly data togal
        $('[data-toggle="tooltip"]').tooltip();
        // logout page redirect index
        $('#logout').on('click',function(){
            swal({
                title: "Logout?",
                text: "Are you sure you want to logout now !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "../controller/loginController.php?status=logOut",
                        success: function(res){
                            swal("Successfully Log Out!!", "", "success");
                            setTimeout(function(){ window.location.href="../index.php?>";  }, 5000);
                        }
                    });
                } 
                });       
        });
    });
</script>
</body>   
</html>


