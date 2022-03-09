<html>
<head>
<?php
include '../model/User_Model.php';//get user model
include '../model/Module_Model.php';//get module model

$UserObj = new user();//create user object
$moduleObj = new module();//get module object
$moduleResult = $moduleObj->getAllModule();//get all module
$RoleResult = $UserObj->getuserRoles();//get user role

?>
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
                    <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">ADD USER</h4>
                    <li class="breadcrumb-item"><a href="user.php" style="color: #000;font-size:20px;text-decoration:none;">USER MANAGE</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row">&nbsp;</div>
        <!--------///////user view table\\\\\\\\\\\-------->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if(isset($_GET["msg"])){
                        ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger">
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
         <!-------//////////add user  //////////------> 
                <form id="User" method="post" action="../controller/UserController.php?status=add_user" enctype="multipart/form-data" >  
                    <div class="row">
                    <div class="col-md-12">
                        <div id="UserAlert"></div>
                    </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-6"><lable class="control-label">First Name :</lable><input type="text" name="user_fname" id="user_fname" class="form-control"></div>
                        <div class="col-md-6"><lable class="control-label">Last Name :</lable><input type="text" name="user_lname" id="user_lname" class="form-control"></div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                    <div class="col-md-6"><lable class="control-label">User Email :</lable><input type="text" name="user_email" id="user_email" class="form-control"></div>
                    <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12"><lable class="control-label">User Gender :</lable></div>
                        <div class="col-md-12">
                            <input type="radio" name="gender" checked="checked" value="1">
                            <lable class="control-label"> Male</lable>
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="0">
                            <lable class="control-label"> Female</lable>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-6"><lable class="control-label">Date of Birth :</lable>                      
                    <div class="input-group"><input id="user_dob" type="date" name="user_dob" class="form-control" min="1960-01-01" max="2002-12-31"><span class="input-group-append"></span></div>
                </div>
                <div class="col-md-6"><lable class="control-label">NIC number :</lable>
                    <input type="text" name="user_nic" id="user_nic" class="form-control">
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-6"><lable class="control-label">Contact number 01 :</lable><input type="text" onkeypress="isInputNumber(event)" name="user_cno1" id="user_cno1" class="form-control"></div>
                <div class="col-md-6"><lable class="control-label">Contact number 02(mobile) :</lable><input type="text" onkeypress="isInputNumber(event)" name="user_cno2" id="user_cno2" class="form-control"></div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-6">
                <!------/////////select user role\\\\\\\\\\------->
                    <label class="control-label">User role :</label>
                    <select name="user_role" id="user_role" class="form-control">
                        <option value="">--</option>
                        <?php
                            while ($RoleRow = $RoleResult->fetch_assoc()){  
                        ?>
                        <option value="<?php echo $RoleRow["role_id"]; ?>">
                            <?php echo $RoleRow["role_name"];?>
                        </option>
                        <?php
                        }
                        ?>      
                    </select>
                <!-----/////////select user role end\\\\\\\\------->
                </div>
                <div class="col-md-6"><label class="control-label">User image :</label>
                    <br/>
                    <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input"  id="user_img" name="user_img" onchange="readURL(this) ">
                        <label class="custom-file-label" for="user_img">Choose file</label>
                    </div>
                    </div>
                    <br/>
                    <img id="prev_img1" />
               </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <div class="container" id="MyFunction"></div>
            <div class="row">
            <div class="col-md-6"> </div>
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-block btn-primary" name="submit" id="submit" style="box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.3), 0 3px 10px 0 rgba(0, 0, 0, 0.19)">
                <i class="fas fa-save">&nbsp;</i> Save
                </button>
            </div>
            <div class="col-md-2">
                <button type="reset" class="btn btn-block btn-danger" name="reset" id="reset" style="box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.3), 0 3px 10px 0 rgba(0, 0, 0, 0.19)">
                <i class="fas fa-sync">&nbsp;</i> Reset
                </button>
            </div>
            </div>
            </form> 
         <!-------///////////add user modal end///////////------>
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
    //change user role function
    $("#user_role").change(function(){
        var url = "../controller/UserController.php?status=getfunctions";
        var x = $("#user_role").val();
        $.post(url,{role_id:x},function (data){
            $("#MyFunction").html(data).show();           
        });
    });
    //select image 
    function readURL(input) {
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
    //input number function
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!/[0-9]/.test(ch)){
        evt.preventDefault();
        }
    }
    // view function model
    function load_data(x){
        var url="../controller/UserController.php?status=viewUser";
            $.post(url,{user_id:x},function(data){
                $("#user_count").html(data).show();
            });
    }
    // upload image
    $(".custom-file-input").on("change",function(){
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</html>


