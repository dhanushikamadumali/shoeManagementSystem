<?php 
include '../model/MCategory_Model.php';///include m category model
include '../model/MSub_Category_Model.php';//include m sub category model
include '../model/Row_Material_Model.php';//include row material model
include '../model/MCollection_Model.php';//include m collection model

$McatObj = new  Category();///create m category object
$MSubCatObj = new subCategory();//creta m sub category object
$McolleObj = new collection();//create  m collection object
$RMaterialObj = new row_material(); //create row material object
$RowMaterialId = $_REQUEST["row_material_id"];//get row material id
$RowMaterialId = base64_decode($RowMaterialId);//row material id decode
$RMaterialResult = $RMaterialObj->getRowMterial($RowMaterialId);///get row material detail by row material id
$RRow = $RMaterialResult->fetch_assoc();///make a result as an array 
$collectionResult = $McolleObj->getAllCollection();//get all collection
$categoryResult = $McatObj->getmAllCategory();//get all collection
$subcategoryResult = $MSubCatObj->getAllMsubCategory();///get all sub category

$RowMaterailImageResult = $RMaterialObj->getImage($RowMaterialId);//get specific image
$riRow = $RowMaterailImageResult->fetch_assoc();//make a result as an array value
?>  
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Row Material</title>     
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
</head>
<style>
/* #ProductAlert{
    background-color: #000;
    width: 80px;
    height: 50px;
    color: #fff;
} */

</style>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
    include_once '../includes/redirect.php';///include redirect
    ?>
    <div class="container">
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!--------/////////////title bar\\\\\\\\\\\\\\\\\\\\\\\-------->
            <div class="row">
            <div class="col-md-12">
                <nav aria-label="Breadcrumb" style="height:49px;">
                    <ol class="breadcrumb">
                    <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">EDIT ROW MATERIAL</h4>
                    <li class="breadcrumb-item"><a href="row_material_manage.php" style="color: #000;font-size:20px;text-decoration:none;">ROW MATERIAL MANAGE</a></li>
                    </ol>
                </nav>
            </div>
            </div>
             <!--------///////////title bar end\\\\\\\\\\\\\\-------->   
            <div class="row"><div class="col-md-12">&nbsp;</div></div>
            <!-------- ////////////alert view\\\\\\\\\\\\\\\\--------->
            <div class="col-md-12" >
            <div id="RowMaterialAlert"></div>
            </div>
            <!----------- alert view end\\\\\\\\\\\\\\\\\\ ----------->
            <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">&nbsp;</div>
            <!--------//////form start\\\\\\\\\\\\\\\----------->
            <form id="editrowmaterialform">
                <input type="hidden" name="r_material_id" id="r_material_id" value="<?php echo $RRow['r_material_id'];?>">
                <div class="row">
                   <div class="col-md-2" style="text-align: right;"><label class="control-lable" >Row Material Name :</lable></div> 
                   <div class="col-md-4"><input type="text" id="rmName" name="r_material_name" class="form-control" value="<?php echo $RRow['r_material_name']?>"></div>
                   <div class="col-md-2" style="text-align: right;"><label class="control-lable" >Collection Type :</label></div>
                   <div class="col-md-4">
                    <select id="coll_Id" name="coll_Id" class="form-control">
                    <option value="">Select Here..</option>
                    <?php while ($cRow =$collectionResult->fetch_assoc()){ ?>
                    <option value="<?php echo $cRow['r_m_collection_id']; ?>" <?php if($cRow['r_m_collection_id']==$RRow['r_m_collection_r_m_collection_id']){?>selected="selected"<?php }?> >
                    <?php echo $cRow['r_m_collection_name']; ?>
                    </option>
                    <?php 
                    }
                    ?>
                    </select>      
                   </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">&nbsp;</div>
                <div class="row">
                   <div class="col-md-2" style="text-align: right;"><label class="control-lable">Category :</label></div> 
                   <div class="col-md-4">
                    <select id="categoryId" name="cat_Id" class="form-control">
                        <option value="">Select Here..</option>
                        <?php while ($catRow =$categoryResult->fetch_assoc()){ ?>
                        <option value="<?php echo $catRow['r_m_category_id']; ?>" <?php if($catRow['r_m_category_id']==$RRow['r_m_category_r_m_category_id']){?>selected="selected"<?php }?>><?php echo $catRow['r_m_category_name']; ?></option>
                        <?php }?>
                    </select>    
                   </div>
                   <div class="col-md-2" style="text-align: right;"><label class="control-lable">Sub Category :</label></div>
                   <div class="col-md-4">
                   <select id="subcat_Id" name="subcat_Id" class="form-control">
                        <option >Select Here..</option>
                        <?php while ($subcatRow =$subcategoryResult->fetch_assoc()){ ?>
                        <option value="<?php echo $subcatRow['r_m_subcategory_id']; ?>" <?php if($subcatRow['r_m_subcategory_id']==$RRow['r_m_subcategory_r_m_subcategory_id']){?>selected="selected"<?php }?>><?php echo $subcatRow['r_m_subcategory_name']; ?></option>
                        <?php }?>
                    </select>   
                   </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-md-2" style="text-align: right;"><label class="control-label">Row Material Image :</label></div> 
                    <div class="col-md-4">
                    <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input"  id="image" name="image" onchange="readURL(this) ">
                        <label class="custom-file-label" for="product_image">Choose file</label>
                    </div>
                    </div>
                    <br/>
                    <img id="prev_img" src="../image/row_material_image/<?php echo $riRow["r_m_image_name"];?>"width="75px" height="65px"/>
                    </div>
                    <div class="col-md-2" style="text-align: right;"><label class="control-lable" >Unit :</lable></div> 
                    <div class="col-md-4"><input type="text" id="unit" name="unit" class="form-control" value="<?php echo $RRow['unit_name']?>"></div>
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
            </div>
            </div>
            </form>   
        <!-----/////////////form end\\\\\\\\\\------------->
        </div>
        </div> 
       <!--///////////////// Content End\\\\\\\\\\\\\------>
    </div>
    <!----//////////// Flud End\\\\\\\\\\\\\\\\\\\\\------>
    </div>
</body>
<!-- including js -->
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script> 
<script type="text/javascript" src="../js/popper.min.js"></script> 
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/sweetalert.js"></script>
<script>
    function readURL(input) {///image preview
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
    // upload image
    $(".custom-file-input").on("change",function(){
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    ////row material update function
    $("#editrowmaterialform").on('submit', function(e){
        e.preventDefault(e);// Prevent the default behaviour
        var rname = $('#rmName').val();
        var collid = $('#coll_Id').val();
        var categoryid = $('#categoryId').val();
        var unit =$('#unit').val();
        
        if (rname==""){
        $("#RowMaterialAlert").html('Please Enter Row Material Name').addClass("alert alert-danger");
        setTimeout(function() {$("#RowMaterialAlert").removeClass('alert').empty()}, 8000);
        }else if (collid==""){
        $("#RowMaterialAlert").html('Please Select Collection').addClass("alert alert-danger");
        setTimeout(function() {$("#RowMaterialAlert").removeClass('alert').empty()}, 8000);  
        }else if (categoryid==""){
        $("#RowMaterialAlert").html('Please Select Category').addClass("alert alert-danger");
        setTimeout(function() {$("#RowMaterialAlert").removeClass('alert').empty()}, 8000);
        }else if(unit==""){
        $("#RowMaterialAlert").html("Please Enter Unit").addClass("alert alert-danger");
        setTimeout(function() {$("#RowMaterialAlert").removeClass('alert').empty()}, 8000);
        }
        else{
            swal({
            title: "Edit Row Material?",
            text: "Are you sure, you want to edit row material now !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "../controller/RowMaterialController.php?status=update_rowmaterial",
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
                            $("#RowMaterialAlert").html(data[1]).removeClass('alert alert-danger').addClass("alert alert-success");
                            setTimeout(function() {window.location.href="../view/row_material_manage.php?>";}, 5000);
                        }
                        if(data[0]==0){
                            $("#RowMaterialAlert").html(data[1]).addClass("alert alert-danger");
                            setTimeout(function() {$("#RowMaterialAlert").removeClass('alert').empty()}, 8000);
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


