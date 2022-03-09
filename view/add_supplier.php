<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add supplier</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
    <link rel="stylesheet" type="text/css"  href="../css/stylesdisplayuser.css">    
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
                    <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">ADD SUPPLIER</h4>
                    <li class="breadcrumb-item"><a href="supplier.php" style="color: #000;font-size:20px;text-decoration:none;">SUPPLIER MANAGE</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row">&nbsp;</div>
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
                <div class="row">
                <div class="col-md-12">
                    <div id="SupplierAlert"></div>
                </div> 
                </div>
         <!-------//////////add supplier  //////////------> 
            <form id="AddSupplier" method="post" action="../controller/SupplierController.php?status=add_supplier" enctype="multipart/form-data" >
                <div class="row">
                <div class="col-md-6"><lable class="control-label">First Name :</lable><input type="text" name="supp_fname" id="supp_fname" class="form-control"></div>
                <div class="col-md-6"><lable class="control-label">Last Name :</lable><input type="text" name="supp_lname" id="supp_lname" class="form-control"></div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-md-6"><lable class="control-label">Email : </lable><input type="text" name="supp_email" id="supp_email" class="form-control"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12"><lable class="control-label">Gender :</lable></div>
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
                <div class="col-md-6"><lable class="control-label">Contact number 01 :</lable><input type="text" name="supp_cno1" id="supp_cno1" class="form-control" onkeypress="isInputNumber(event)"></div>
                <div class="col-md-6"><lable class="control-label">Contact number 02(mobile) :</lable><input type="text" name="supp_cno2" id="supp_cno2" class="form-control" onkeypress="isInputNumber(event)"></div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-md-6"> 
                    <label class="control-label">Address :</label>
                    <input type="text" name="supp_address" id="supp_address" class="form-control">   
                </div>
                <div class="col-md-6"><label class="control-label">User image :</label>
                    <br/>
                    <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input"  id="supp_img" name="supp_img" onchange="readURL(this) ">
                        <label class="custom-file-label" for="supp_img">Choose file</label>
                    </div>
                    </div>
                    <br/>
                    <img id="prev_img" />
               </div>
               </div>
                <div class="row">&nbsp;</div>
                <div class="row">&nbsp;</div>
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
<script type="text/javascript" src="../js/Supplier_Validation.js" ></script>
<script>
      //display data table
    $(document).ready(function() {
        $('#example').DataTable();
    });
     //select image 
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
    ///input number 
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!/[0-9]/.test(ch)){
        evt.preventDefault();
        }
    }
    // upload image
    $(".custom-file-input").on("change",function(){
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</html>


