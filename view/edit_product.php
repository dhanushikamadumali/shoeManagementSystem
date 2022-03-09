<html>
<head>
<?php 
include '../model/Category_Model.php';///include category model
include '../model/Sub_Category_Model.php';//include sub category model
include '../model/Product_Model.php';//include product model
include '../model/Collection_Model.php';//include collection model


$catObj = new  Category();///create category object
$SubCatObj = new subCategory();//creta sub category object
$colleObj = new collection();//create collection object
$ProductObj = new  product(); //create product object
$ProductId = $_REQUEST["product_id"];//get product id
$ProductId = base64_decode($ProductId);//product id decode
$productResultTwo = $ProductObj->getProduct($ProductId);///get product detail by product id
$pRow = $productResultTwo->fetch_assoc();///make a result as an array 
$collectionResultThree = $colleObj->getAllCollection();//get all collection
$categoryResultThree = $catObj->getAllCategory();//get all collection
$subcategoryResultThree = $SubCatObj->getAllsubCategory();///get all sub category
$SizeResult = $ProductObj->getSize();///get all size detail
$ProductSizeResult = $ProductObj->getProductSize($ProductId);//get size by product id 
$Size=array();//create size array
while($SizeRow=$ProductSizeResult->fetch_assoc()){////make a result as an array value
    array_push($Size,$SizeRow['size_size_id']);///size id value push size array
}
$ProductImageResult = $ProductObj->getImage($ProductId);//get specific image
$piRow = $ProductImageResult->fetch_assoc();//make a result as an array value
?>     
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Product</title>     
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
</head>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
    include_once '../includes/redirect.php';///include redirect
    ?>
    <div class="container">
            <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div></div>
            <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div></div>
            <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div></div>
            <!--------/////////////title bar\\\\\\\\\\\\\\\\\\\\\\\-------->
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <nav aria-label="Breadcrumb" style="height:49px;">
                    <ol class="breadcrumb">
                    <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">EDIT PRODUCT</h4>
                    <li class="breadcrumb-item"><a href="product_manage.php" style="color: #000;font-size:20px;text-decoration:none;">PRODUCT MANAGE</a></li>
                    </ol>
                </nav>  
            </div>
            </div>
            <!--------///////////title bar end\\\\\\\\\\\\\\-------->
            <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div></div>
            <!-------////////////alert\\\\\\\\\\\\\\\\\\\\\\-------->
            <div class="row ">
                <?php
                if (isset($_REQUEST["msg"])) {
                    ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-danger">
                            <?php $msg = $_REQUEST["msg"];
                            echo $msg = base64_decode($msg)
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <!-------///////////alert end\\\\\\\\\\\\\\\\\\\\-------->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div id="ProductAlert"></div></div>
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
            <!------////////////form start\\\\\\\\\\\\\\\\\\\\------->
            <form id="product" method="post" action="../controller/ProductController.php?status=update_product" enctype="multipart/form-data">
                <input type="hidden" name="product_id" id="product_id" value="<?php echo $ProductId;?>">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align: right;"><label class="control-lable" >Product Name :</lable></div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><input type="text" id="pName" name="product_name" class="form-control" value="<?php echo $pRow['product_name']?>"></div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align: right;"><label class="control-lable" >Collection Type :</label></div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <select id="coll_Id" name="coll_Id" class="form-control">
                    <option value="">Select Here..</option>
                        <?php while ($cRow =$collectionResultThree->fetch_assoc()){ ?>
                            <option value="<?php echo $cRow['collection_id']; ?>" <?php if($cRow['collection_id']==$pRow['collection_collection_id']){?>selected="selected"<?php }?> >
                            <?php echo $cRow['collection_name']; ?>
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
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align: right;"><label class="control-lable">Category :</label></div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <select id="categoryId" name="cat_Id" class="form-control">
                        <option value="">Select Here..</option>
                        <?php while ($catRow =$categoryResultThree->fetch_assoc()){ ?>
                        <option value="<?php echo $catRow['category_id']; ?>" <?php if($catRow['category_id']==$pRow['category_category_id']){?>selected="selected"<?php }?>><?php echo $catRow['category_name']; ?></option>
                        <?php }?>
                    </select>   
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align: right;"><label class="control-lable">Sub Category :</label></div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <select id="subcat_Id" name="subcat_Id" class="form-control">
                            <option >Select Here..</option>
                            <?php while ($subcatRow =$subcategoryResultThree->fetch_assoc()){ ?>
                                <option value="<?php echo $subcatRow['sub_category_id']; ?>" <?php if($subcatRow['sub_category_id']==$pRow['sub_category_sub_category_id']){?>selected="selected"<?php }?>><?php echo $subcatRow['sub_category_name']; ?></option>
                            <?php }?>
                        </select>  
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align: right;"><label class="control-lable">Size :</label></div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <?php while($SizeRow = $SizeResult->fetch_assoc()){?>           
                            <input type="checkbox" name="size[]" value="<?php echo $SizeRow['size_id'];?>"<?php if(in_array($SizeRow['size_id'],$Size)){;?> checked="checked" <?php } ?>>&nbsp; <?php echo " ".$SizeRow['size'];?> &nbsp; 
                        <?php } ?>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align: right;"><label class="control-label">Product Image :</label></div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input"  id="image" name="image" onchange="readURL(this) ">
                        <label class="custom-file-label" for="product_image">Choose file</label>
                    </div>
                    </div>
                    <br/>
                    <img id="prev_img" src="../image/product_image/<?php echo $piRow["product_img_name"];?>"width="75px" height="65px"/>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">&nbsp;</div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">&nbsp;</div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <button type="submit" class="btn btn-block btn-primary" name="submit" id="submit" style="box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.3), 0 3px 10px 0 rgba(0, 0, 0, 0.19)">
                    <i class="fas fa-save">&nbsp;</i> Save
                    </button>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <button type="reset" class="btn btn-block btn-danger" name="reset" id="reset" style="box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.3), 0 3px 10px 0 rgba(0, 0, 0, 0.19)">
                        <i class="fas fa-sync">&nbsp;</i> Reset
                    </button>
                </div>
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
<script>
    ///image preview
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
    // upload image
    $(".custom-file-input").on("change",function(){
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    //update product
    $("#product").on('submit', function(e){
    e.preventDefault(e);// Prevent the default behaviour
    var pname = $('#pName').val();
    var collid = $('#coll_Id').val();
    var catid = $('#cat_Id').val();
        
    if (pname==""){
    $("#ProductAlert").html('Please Enter Product Name').addClass("alert alert-danger");
    setTimeout(function() {$("#ProductAlert").removeClass('alert').empty()}, 8000);
    }else if (collid==""){
    $("#ProductAlert").html('Please Select Collection').addClass("alert alert-danger");
    setTimeout(function() {$("#ProductAlert").removeClass('alert').empty()}, 8000);  
    }else if (catid==""){
    $("#ProductAlert").html('Please Select Category').addClass("alert alert-danger");
    setTimeout(function() {$("#ProductAlert").removeClass('alert').empty()}, 8000);
    }else if($("input[type=checkbox]:checked").length < 1){
    $("#ProductAlert").html("At least One size must be selected").addClass("alert alert-danger");
    setTimeout(function() {$("#ProductAlert").removeClass('alert').empty()}, 8000);
    }
    else{
        swal({
        title: "Edit Product?",
        text: "Are you sure, you want to edit product now !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "../controller/ProductController.php?status=update_product",
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
                        $("#ProductAlert").html(data[1]).removeClass('alert alert-danger').addClass("alert alert-success");
                        setTimeout(function() {window.location.href="../view/product_manage.php?>";}, 5000);
                    }
                    if(data[0]==0){
                        $("#ProductAlert").html(data[1]).addClass("alert alert-danger");
                        setTimeout(function() {$("#ProductAlert").removeClass('alert').empty()}, 8000);
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


