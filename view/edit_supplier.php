<?php
include '../model/Supplier_Model.php';///include supplier model

$SupplierObj = new supplier();///create supplier 
$SuppId = $_REQUEST["supplier_id"];///get supplier id
$SuppId = base64_decode($SuppId);///supplier id decode
$SupplierResult = $SupplierObj->ViewSupplier($SuppId);///get specific supplier information
$Supprow = $SupplierResult->fetch_assoc();//make a result as an array
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">     
<title>Edit Supplier</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
    <link rel="stylesheet"  type="text/css" href="../css/styles.css">  
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
        <!--------///////////title bar\\\\\\\\\\\-------->
            <div class="row">    
                <div class="col-md-12">
                <nav aria-label="Breadcrumb"  style="height:49px;">
                <ol class="breadcrumb">
                <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">EDIT PROFILE</h4>
                <li class="breadcrumb-item"><a href="supplier.php" style="color: #000;font-size:20px;text-decoration:none;">SUPPLIER MANAGE</a></li>
                </ol>
                </nav> 
                </nav>
                </div>
            </div>
            <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!------//////title bar end\\\\\\\\\\\\\\\\\\\\-------->   
        <!------//////alert\\\\\\\\\\\\\\\\\\\\\\\\\----------->  
            <div class="row">
                <?php
                if (isset($_REQUEST["error"])) {
                    ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <?php $error = $_REQUEST["error"];
                            echo $error = base64_decode($error)
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="col-md-12">
                    <div id="SupplierAlert"></div>
                </div> 
            </div>
            <div class="col-md-12">&nbsp;</div>
        <!-----------/////alert end\\\\\\\\\\\\\\\\----------->  
        <!-------/////////form start\\\\\\\\\\\\\\\----------->
        <div class="row">
        <div class="col-md-12">
        <form id="Supplier">
                <input type="hidden" name="supp_id" value="<?php echo $SuppId;?>">
            <div class="row">
                <div class="col-md-6"><lable class="control-label">First Name</lable><input type="text" name="supp_fname" id="supp_fname" class="form-control" value="<?php echo ($Supprow["supplier_fname"]); ?>"></div>
                <div class="col-md-6"><lable class="control-label">Last Name</lable><input type="text" name="supp_lname" id="supp_lname" class="form-control" value="<?php echo ($Supprow["supplier_lname"]); ?>"></div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-6"><lable class="control-label">Email</lable><input type="text" name="supp_email" id="supp_email" class="form-control" value="<?php echo ($Supprow["supplier_email"]); ?>" readonly="readonly"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12"><lable class="control-label">Gender</lable></div>
                        <div class="col-md-12">
                            <input type="radio" name="gender"  value="1" <?php if($Supprow["supplier_gender"]==1){?> checked="checked" <?php }?> >
                            <lable class="control-label"> Male</lable>
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="0" <?php if($Supprow["supplier_gender"]==0){?> checked="checked" <?php }?> >
                            <lable class="control-label"> Female</lable>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-6"><lable class="control-label">Contact number 01</lable><input type="text" name="supp_cno1" id="supp_cno1" class="form-control" onkeypress="isInputNumber(event)" value="<?php echo ($Supprow["supplier_con1"]);?>" ></div>
                <div class="col-md-6"><lable class="control-label">Contact number 02(mobile)</lable><input type="text" name="supp_cno2" id="supp_cno2" class="form-control" onkeypress="isInputNumber(event)" value="<?php echo ($Supprow["supplier_con2"]);?>"></div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-6"><label class="control-label">Address</label><input type="text" name="supp_addr" id="supp_addr" class="form-control" value="<?php echo ($Supprow["supplier_address"]);?>" ></div>
                <div class="col-md-6"><label class="control-label">Supplier image</label>
                    <input type="file" id="supp_img" name="supp_img" onchange="readURL(this)" class="form-control">
                    <br/>
                    <img id="prev_img" src="../image/supplier_image/<?php echo $Supprow["supplier_image"];?>"width="75px" height="65px"/>
               </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
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
        </div>
        </div>
        <!---------///////form end\\\\\\\\\\\\\\\\\\\------------->       
        </div>
    </div>
       <!--///////////////// Content End\\\\\\\\\\\\\\\\\\\------>
    </div>
    <!------////// Flud End\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\------>
    </div>
</body>
<!-- including js -->
<script type="text/javascript" src="../js/popper.min.js"></script>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>  
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/sweetalert.js"></script>
<script>
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
    function isInputNumber(evt){////only number type function
        var ch = String.fromCharCode(evt.which);
        if(!/[0-9]/.test(ch)){
        evt.preventDefault();
    }
    }
    ///supplier updatee
    $("#Supplier").on('submit', function(e){
        e.preventDefault(e);// Prevent the default behaviour
        var suppfname = $('#supp_fname').val();
        var supplanme = $('#supp_lname').val();
        var cno1 = $('#supp_cno1').val();
        var cno2 = $('#supp_cno2').val();
        var addr = $('#supp_addr').val();
        var patCno1 = /^[0-9]{10}$/;
        var patCno2mobile = /^07[0-9]{8}$/;

        if (suppfname==""){
        $("#SupplierAlert").html('Please Enter First Name').addClass("alert alert-danger");
        setTimeout(function() {$("#SupplierAlert").removeClass('alert').empty()}, 8000);
        }else if (supplanme==""){
        $("#SupplierAlert").html('Please Enter last Name').addClass("alert alert-danger");
        setTimeout(function() {$("#SupplierAlert").removeClass('alert').empty()}, 8000);  
        }else if (cno1==""){
        $("#SupplierAlert").html('Please Enter contact number').addClass("alert alert-danger");
        setTimeout(function() {$("#SupplierAlert").removeClass('alert').empty()}, 8000);
        }else if(!cno1.match(patCno1)){
        $("#SupplierAlert").html('Please Enter valid Contact Number 1').addClass("alert alert-danger");
        setTimeout(function() {$("#SupplierAlert").removeClass('alert').empty()}, 8000);
        }else if (cno2==""){
        $("#SupplierAlert").html('Please Enter mobile number').addClass("alert alert-danger");
        setTimeout(function() {$("#SupplierAlert").removeClass('alert').empty()}, 8000);
        }else if (!cno2.match(patCno2mobile)){
        $("#SupplierAlert").html('Please Enter valid Mobile Contact Number 2').addClass("alert alert-danger");
        setTimeout(function() {$("#SupplierAlert").removeClass('alert').empty()}, 8000);
        }else if (addr==""){
        $("#SupplierAlert").html('Please Enter Address').addClass("alert alert-danger");
        setTimeout(function() {$("#SupplierAlert").removeClass('alert').empty()}, 8000);
        }
        else{
            swal({
            title: "Edit Supplier?",
            text: "Are you sure, you want to edit supplier now !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "../controller/SupplierController.php?status=edit_supplier",
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
                            $("#SupplierAlert").html(data[1]).removeClass('alert alert-danger').addClass("alert alert-success");
                            setTimeout(function() {window.location.href="../view/supplier.php?>";}, 5000);
                        }
                        if(data[0]==0){
                            $("#SupplierAlert").html(data[1]).addClass("alert alert-danger");
                            setTimeout(function() {$("#SupplierAlert").removeClass('alert').empty()}, 8000);
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



