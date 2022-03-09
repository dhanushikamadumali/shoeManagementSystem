<?php
include '../model/User_Model.php';///get user model
include '../model/Module_Model.php';//get module model

$UserObj = new user();//create user object
$UserResult = $UserObj->getAllUser();//get user deatil
$moduleObj = new module();///
$moduleResult = $moduleObj->getAllModule();
$RoleResult = $UserObj->getuserRoles();
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>View user</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
    <link rel="stylesheet" type="text/css" media="All" href="../css/stylesdisplayuser.css">    
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
</head>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
    include '../includes/redirect.php';///include redirect
    ?>
    <div class="container">
        <!---------///////////header\\\\\\\\\------------>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
            <nav aria-label="Breadcrumb" class="breadcrumb" style="height:49px;">
            <h4>USER MANAGEMENT</h4>
            </nav>
            </div>
        </div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row">
            <div class="col-md-12">
                <ul class=" nav nav-pills ">
                    <a href="add_user.php" class="btn btn-outline-primary ml-auto" ><i class="fas fa-plus"></i> &nbsp; Add User</a>
                </ul>                
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <!--------///////user view table\\\\\\\\\\\-------->
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
                    <div class="col-md-12">
                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr style="color: #fff"  class="bg-primary text-center" >
                                <th scope="col">USER NO</th>
                                <th scope="col">USER IMAGE</th>
                                <th scope="col">NAME</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">USER ROLE</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">&nbsp;</th>  
                                </tr>
                            </thead>
                            <tbody>
                               <?php while ($Urow=$UserResult->fetch_assoc()){$UserId = $Urow["user_id"];$UserId = base64_encode($UserId);?>
                                <tr class="text-center">
                                <td>#<?php echo $Urow["user_no"]?></td>
                                <td><img src="../image/user_image/<?php echo $Urow["user_image"];?>" style="width:50px;height:50px;border-radius:50%;margin-left: 5px" alt=""/></td>
                                <td><?php echo $Urow["user_fname"]?> <?php echo $Urow["user_lname"]?></td>
                                <td><?php echo $Urow["user_email"]?></td>
                                <td><?php echo $Urow["role_name"]?></td>
                                <td>
                                <?php if($Urow["user_status"]=="1"){
                                    echo "Active";
                                    }
                                    else{
                                        echo"Deactive";
                                    }
                                ?>
                                <td>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#userprofile" onclick="load_data(<?php echo $Urow["user_id"]; ?>)">
                                        <i class="fas fa-search fa-1x"></i>&nbsp;
                                    </button>
                                    <a href="../view/edit_user.php?user_id=<?php echo $UserId;?>" class="btn btn-warning" style="color:#fff"  data-toggle="tooltip" title="edit"><i class="far fa-edit"></i>&nbsp;</a>
                                    <!-- <button class="btn btn-warning edit" type="button" style="color:#fff" data-toggle="tooltip" title="edit" ><i class="fas fa-edit fa-1x"></i>&nbsp;</button> -->
                                    <?php if($Urow["user_status"]=="0"){ ?>    
                                    <button  class="btn btn-success" style="color:#fff"  data-toggle="tooltip" title="activate" onclick="active(<?php echo $Urow["user_id"]; ?>)" ><i class="fas fa-sync"></i>&nbsp;</button>
                                    <?php } ?> 
                                    <?php if($Urow["user_status"]=="1") {?>
                                    <button  class="btn btn-danger" style="color:#fff" data-toggle="tooltip" title="deactivate" onclick="deactive(<?php echo $Urow["user_id"]; ?>)" ><i class="fas fa-times"></i>&nbsp;</button>
                                    <?php }?>
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
         <!-------/////////user view table end//////////---->
         <!------//////////view user modal///////////-------->
         <div class="modal fade" id="userprofile"  role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="displaysupplier">VIEW USER PROFILE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                 <div class="modal-body">
                    <div id="user_count"></div>   
                </div>
            </div>
            </div>
        </div>
         <!------////////view user modal end////////-------->
        </div>
        </div> 
       <!------///////// Content End\\\\\\\\------>
    </div>
    <!---------/////////// Flud End\\\\\\\\\\------>
    </div>
    </div> 
    </body>
    <script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script> 
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/sweetalert.js"></script>
    <script type="text/javascript" src="../js/User_Validation.js" ></script>
    <script type="text/javascript" src="../js/datatable/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/datatable/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
              // dispaly data togal
            $('[data-toggle="tooltip"]').tooltip();
        });
        $("#user_role").change(function(){///get module by role id
            var url = "../controller/UserController.php?status=getfunctions";
            var x = $("#user_role").val();
            $.post(url,{role_id:x},function (data){
                $("#MyFunction").html(data).show();           
            });
        });
        function readURL(input) {///view image
            if (input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#prev_img1')
                    .attr('src',e.target.result)
                    .height(70)
                    .width(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function isInputNumber(evt){///input number only
            var ch = String.fromCharCode(evt.which);
            if(!/[0-9]/.test(ch)){
            evt.preventDefault();
            }
        }
        function load_data(x){///view user modal
            var url="../controller/UserController.php?status=viewUser";
                $.post(url,{user_id:x},function(data){
                    $("#user_count").html(data).show();
            });
        }
        function active(x){
        var userId =x;
        swal({
            title: "Active User?",
            text: "Are you sure you want to active user now !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url:  "../controller/UserController.php?status=activateUser",
                    type:'POST',
                    data:{userId:userId},
                    success: function(res){  
                            if(res != "error"){
                            swal("Successfully Activate User!!", "", "success");
                            setTimeout(function(){window.location.reload();  }, 1500);
                        } 
                    }
                });
            } 
            });
        }
        function deactive(x){
        var userId =x;
        swal({
            title: "Deactive User?",
            text: "Are you sure you want to deactive user  now !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url:  "../controller/UserController.php?status=deactivateUser",
                    type:'POST',
                    data:{userId:userId},
                    success: function(res){
                            if(res != "error"){
                            swal("Successfully Deactivate User!!", "", "success");
                            setTimeout(function(){window.location.reload();  }, 1500);
                        } 
                    }
                });
            } 
            });     

        }
    </script>
</html>


