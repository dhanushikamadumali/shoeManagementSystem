<?php
include '../model/User_Model.php';//include user model
include '../model/Module_Model.php';///include model module

$UserObj = new user();//create user object
$RoleResult = $UserObj->getuserRoles();//get user role result
$moduleObj = new module();///create module object
$moduleResult = $moduleObj->getAllModule();///get module result
$UserId = $_REQUEST["user_id"];///get user id
$UserId = base64_decode($UserId);///user id decode
$UserResult = $UserObj->ViewUser($UserId);///get the specific user information
$Urow = $UserResult->fetch_assoc();///make a result as an array
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title>Edit user</title>   
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../css/styles.css">
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
        <!--------////////title bar\\\\\\\\\\\-------->
        <div class="row">
        <div class="col-md-12">
            <nav aria-label="Breadcrumb"  style="height:49px;">
                <ol class="breadcrumb">
                <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">EDIT PROFILE</h4>
                <li class="breadcrumb-item"><a href="user.php" style="color: #000;font-size:20px;text-decoration:none;">USER MANAGE</a></li>
                </ol>
            </nav> 
            </nav>
        </div>
        </div>
        <!--------//////////////////title bar end\\\\\\\\\\\-------->  
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!-------- ////////////alert view\\\\\\\\\\\\\\\\--------->
        <div class="col-md-12" ><div id="UserAlert"></div></div>
        <!----------- alert view end\\\\\\\\\\\\\\\\\\ ----------->
        <div class="row">
        <div class="col-md-12">
        <div class="col-md-12">&nbsp;</div>
        <!--------/////////////form start\\\\\\\\\\\\----------->
        <form id="User">
            <input type="hidden" name="user_id" value="<?php echo $UserId;?>">
        <div class="row">
            <div class="col-md-6"><lable class="control-label">First Name</lable><input type="text" name="FirstName" id="user_fname" class="form-control" value="<?php echo ($Urow["user_fname"]); ?>"></div>
            <div class="col-md-6"><lable class="control-label">Last Name</lable><input type="text" name="LastName" id="user_lname" class="form-control" value="<?php echo ($Urow["user_lname"]); ?>"></div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-6"><lable class="control-label">User Email</lable><input type="text" name="Email" id="user_email" class="form-control" value="<?php echo ($Urow["user_email"]); ?>" readonly="readonly"></div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12"><lable class="control-label">User Gender</lable></div>
                    <div class="col-md-12">
                        <input type="radio" name="gender"  value="1" <?php if($Urow["user_gender"]==1){?> checked="checked" <?php }?> >
                        <lable class="control-label"> Male</lable>
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="gender" value="0" <?php if($Urow["user_gender"]==0){?> checked="checked" <?php }?> >
                        <lable class="control-label"> Female</lable>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-6"><lable class="control-label">Date of Birth</lable>                      
                <div class="input-group"><input id="user_dob" type="date" name="user_dob" class="form-control" value="<?php echo ($Urow["user_dob"]); ?>" readonly="readonly"><span class="input-group-append"></span></div>
            </div>
            <div class="col-md-6"><lable class="control-label">NIC number</lable>
                <input type="text" name="user_nic" id="user_nic" class="form-control" value="<?php echo ($Urow["user_nic"]); ?>" readonly="readonly">
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-6"><lable class="control-label">Contact number 01</lable><input type="text" name="ContactNumber" id="user_cno1" class="form-control" onkeypress="isInputNumber(event)" value="<?php echo ($Urow["user_con1"]);?>" ></div>
            <div class="col-md-6"><lable class="control-label">Contact number 02(mobile)</lable><input type="text" name="MobileNumber" id="user_cno2" class="form-control" onkeypress="isInputNumber(event)" value="<?php echo ($Urow["user_con2"]);?>"></div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-6">
            <!------////////select user role\\\\\\\\\\\------->
                <label class="control-label">User role</label>
                <select name="user_role" id="user_role" class="form-control">
                    <option value="" >--</option>
                    <?php
                        while ($RoleRow = $RoleResult->fetch_assoc()){  
                    ?>
                    <option value="<?php echo $RoleRow["role_id"]; ?>" <?php if($RoleRow["role_id"]==$Urow["role_role_id"]){?>selected="selected"<?php }?> >
                    <?php echo $RoleRow["role_name"];?>
                    </option>
                    <?php
                    }
                    ?>      
                </select>
            <!------////////////select user role end\\\\\\\\\------->
            </div>
            <div class="col-md-6"><label class="control-label">User image</label>
                <br/>
                <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input"  id="user_img" name="user_img" onchange="readURL(this) ">
                    <label class="custom-file-label" for="user_img">Choose file</label>
                </div>
                </div>
                <br/>
                <img id="prev_img" src="../image/user_image/<?php echo $Urow["user_image"];?>"width="75px" height="65px"/>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="container" id="MyFunction">
                <?php
                $RoleID = $Urow["role_role_id"];
                $ModuleResult = $UserObj->getModulesByRole($RoleID);
                ?>
                <div class="row">
                    <?php
                    $Mcounter=0;
                    while ($Mrow = $ModuleResult->fetch_assoc()){
                    $Mcounter++;
                    ?>
                    <div class="col-md-3">
                        <label class="control-label" style="font-size: 20px;font-weight: bold"><?php echo $Mrow["module_name"];?></label>
                        <br/> 
                    </div>
                        <?php
                        if($Mcounter % 4==0){
                        ?>        
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                                    <?php
                                }
                            ?>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6"> </div>
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <button type="submit" id="submit" class="btn btn-block btn-primary" style="box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.3), 0 3px 10px 0 rgba(0, 0, 0, 0.19);color:#fff">
                <i class="fas fa-save">&nbsp;</i> Update
                </button>
            </div>
            <div class="col-md-2">
                <button type="reset" class="btn btn-block btn-danger" name="reset" id="reset" style="box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.3), 0 3px 10px 0 rgba(0, 0, 0, 0.19)">
                <i class="fas fa-sync">&nbsp;</i> Reset
                </button>
            </div>
            </div>
            </form>
        <!----///////form end\\\\\\-------->
        </div>
        </div> 
        </div>
        </div> 
       <!--/////// Content End\\\\\\\------>
    </div>
    <!----////// Flud End\\\\\\\\\\\\------>
    </div>
</body>
<!-- including js -->
<script type="text/javascript" src="../js/popper.min.js"></script>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>  
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/sweetalert.js"></script>
<!-- <script type="text/javascript" src="../js/User_Validation.js" ></script> -->
<script>
     
     $("#user_role").change(function(){//change user role function
        var url = "../controller/UserController.php?status=getfunctions";
        var x = $("#user_role").val(); 
        $.post(url,{role_id:x},function (data){
            $("#MyFunction").html(data).show();           
        });
    });
    function readURL(input) {///img preview
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
    $(".custom-file-input").on("change",function(){// upload image
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    function isInputNumber(evt){////only number type function
        var ch = String.fromCharCode(evt.which);
        if(!/[0-9]/.test(ch)){
        evt.preventDefault();
        }
    } 
    ////user update function
    $("#User").on('submit', function(e){
        e.preventDefault(e);// Prevent the default behaviour
        var userfname = $('#user_fname').val();
        var userlname = $('#user_lname').val();
        var nic = $('#user_nic').val();
        var con1 = $('#user_cno1').val();
        var con2 = $('#user_cno2').val(); 
        var patCno2mobile = /^07[0-9]{8}$/;
        var patCno1 = /^[0-9]{10}$/;
        if (userfname==""){
        $("#UserAlert").html('Please Enter Your First Name').addClass("alert alert-danger");
        setTimeout(function() {$("#UserAlert").removeClass('alert').empty()}, 8000);
        }else if (userlname==""){
        $("#UserAlert").html('Please Enter Your last Name').addClass("alert alert-danger");
        setTimeout(function() {$("#UserAlert").removeClass('alert').empty()}, 8000);  
        }else if (con1==""){
        $("#UserAlert").html('Please Enter Your Contact Number').addClass("alert alert-danger");
        setTimeout(function() {$("#UserAlert").removeClass('alert').empty()}, 8000);
        }else if(!con1.match(patCno1)){
        $("#UserAlert").html('Please Enter Your Valid Contact Number 1').addClass("alert alert-danger");
        setTimeout(function() {$("#UserAlert").removeClass('alert').empty()}, 8000);
        }else if (con2==""){
        $("#UserAlert").html('Please Enter Your Mobile Number').addClass("alert alert-danger");
        setTimeout(function() {$("#UserAlert").removeClass('alert').empty()}, 8000);
        }else if (!con2.match(patCno2mobile)){
        $("#UserAlert").html('Please Enter Your Valid Mobile Contact Number 2').addClass("alert alert-danger");
        setTimeout(function() {$("#UserAlert").removeClass('alert').empty()}, 8000);
        }
        else{
            swal({
            title: "Edit User?",
            text: "Are you sure, you want to edit user now !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "../controller/UserController.php?status=update_user",
                    type:'POST', 
                    data: new FormData(this),
                    enctype: 'multipart/form-data',
                    cache:false,
                    processData:false,
                    contentType:false,
                    dataType:'json',
                    success: function(data){
                        console.log(data);
                        if(data[0]==1){
                            $("#UserAlert").html(data[1]).removeClass('alert alert-danger').addClass("alert alert-success");
                            setTimeout(function(){window.location.href="../view/user.php?>";}, 5000);
                        }
                        if(data[0]==0){
                            $("#UserAlert").html(data[1]).addClass("alert alert-danger");
                            setTimeout(function(){$("#UserAlert").removeClass('alert').empty()}, 8000);
                        }
                    },
                    error:function(data){
                        console.error(data);
                    }

                });
            } 
            }); 
        }
    }); 
</script>
</html>


