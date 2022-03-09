<?php  
include '../model/Product_Model.php';//include product model
include '../model/Category_Model.php';//include category model
include '../model/Sub_Category_Model.php';//include sub category model
include '../model/Collection_Model.php';//include collection model

$colleObj = new collection();//create collection object
$catObj = new Category();//create category object
$SubCatObj = new subCategory();//create sub category object
$ProductObj = new  product(); //create product object
$collectionResult = $colleObj->getAllCollection();//get all collection
$collectionResultTwo = $colleObj->getAllCollection();///get all collection
$collectionResultThree = $colleObj->getAllCollection();//get all collection 
$categoryResult = $catObj->getAllCategory();//get all category
$categoryResultTwo = $catObj->getAllCategory();//get all category
$subcatResult = $SubCatObj->getAllsubCategory();//get all sub category 
$SizeResult = $ProductObj->getSize();///get size deatil
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Product</title>    
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../css/styles.css">
</head>
<style>
.product_image{
    border-radius: 4px;
    padding: 5px;
    width: 500px;
    border: 2px solid #000;
    height: 150px;
    border-color: #cc99ff;
}
#topic{
    text-shadow:2px 2px 5px #686868;
    color:#9933ff;
    text-align: center;
    font-size: 30px;
}
</style>
<body>
    <?php
    include '../includes/navbar.php';//include navbaer
    include_once '../includes/redirect.php';///include redirect
    ?>
    <div class="container">
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <!---------///////////header\\\\\\\\\------------>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="Breadcrumb" class="breadcrumb" style="height:49px;">
                    <h4>PRODUCT MANAGEMENT</h4>
                    </nav>
                </div>
            </div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row"><div class="col-md-12">&nbsp;</div></div>
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
        
        <div class="row">
            <div class="col-md-6">
                <div class="product_image">
                    <h5 id="topic">COLLECTION</h5>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">&nbsp;</div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <button class="btn btn" data-toggle="modal" data-target="#addcollection" style="background-color: #9933ff;color:#fff" ><i class="fas fa-plus"></i>  Add</button>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">&nbsp;</div>   
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
                <div class="product_image">
                    <h5 id="topic">CATEGORY</h5>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <button type="button" class="btn btn" data-toggle="modal" data-target="#addcategory" style="background-color: #9933ff;color:#fff"><i class="fas fa-plus"></i>  Add</button>
                    <a href="category.php" class="btn btn" style="background-color:#c44dff;color:#fff"><i class="far fa-edit"></i>&nbsp;Manage</a>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">&nbsp;</div>  
                    </div>
                </div> 
            </div>
        
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-6">
                <div class="product_image">
                    <h5 id="topic"> SUB CATEGORY</h5>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <button type="button" class="btn btn" data-toggle="modal" data-target="#addsubcategory" style="background-color: #9933ff;color:#fff"> <i class="fas fa-plus"></i> Add</button>
                    <a href="sub_category.php" class="btn btn" style="background-color:#c44dff;color:#fff"><i class="far fa-edit"></i>&nbsp;Manage</a>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">&nbsp;</div>  
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product_image">
                    <h5 id="topic">PRODUCT</h5>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <button type="button" class="btn btn" data-toggle="modal" data-target="#addproduct" style="background-color: #9933ff;color:#fff"><i class="fas fa-plus"></i>  Add</button>
                    <a href="product_manage.php" class="btn btn" style="background-color:#c44dff;color:#fff"><i class="far fa-edit"></i>&nbsp;Manage</a>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">&nbsp;</div>  
                    </div>
                </div>
            </div>
        </div>
        <!------////////////////////add collection \\\\\\\\\\\\\\\\\\\\\\\\--------->
        <div class="modal fade" id="addcollection"  role="dialog" >
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" >ADD NEW COLLECTION</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="addcollection" action="../controller/CollectionController.php?status=add_collection" method="post">
                <div class="row">
                <div class="col-md-12"><div id="CollectionAlert"></div></div> 
                </div>
                <div class="row">
                    <div class="col-md-6"><label class="control-label" >COLLECTION NAME</label></div>
                    <div class="col-md-6"><input type="text" name="Collection_name" id="Collection_name" class="form-control"></div>
                </div>
            <div class="row">&nbsp;</div>
            <div class="row">
            <div class="col-md-6">&nbsp;</div>
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-4">
            <button type="submit" name="submit" class="btn btn-outline-primary">Save</button>
            </div>
            </div>
            </form>
            </div>
            </div>
            </div>
        </div>
        <!----------//////////////add collection end \\\\\\\\\\\\\\\\\---------->
        <!----------/////////////add category \\\\\\\\\\\\\\\\\\\\--------->
        <div class="modal fade" id="addcategory"  role="dialog" >
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" >ADD NEW CATEGORY</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="addcategory" action="../controller/CategoryController.php?status=add_category" method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col-md-12">
                    <div id="CategoryAlert"></div>
                </div> 
                </div>
                <div class="row">
                    <div class="col-md-6"><label class="control-label" >COLLECTION TYPE</label></div>
                    <div class="col-md-6 ">
                    <?php while ($collrow=$collectionResult->fetch_assoc()){?> 
                         <input class="chkbx" type="checkbox" name="type[]" id="type" value="<?php echo $collrow['collection_id'];?>">&nbsp;<?php echo $collrow["collection_name"];?>&nbsp;
                    <?php } ?>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-md-6"><label class="control-label" >CATEGORY NAME</label></div>
                    <div class="col-md-6"><input type="text" id="Category_name" name="Category_name" class="form-control"></div>
                </div>
                <div class="row">&nbsp;</div>
            <div class="row">
            <div class="col-md-6">&nbsp;</div>
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-4">
            <button type="submit" name="submit" class="btn btn-outline-primary">Save</button>
            </div>
            </div>
            </form>
            </div>
            </div>
            </div>
        </div>
        <!----------////////////////add category end \\\\\\\\\\\\\\\\---------->
        <!----------///////////////add sub category \\\\\\\\\\\\\\\\\---------->
        <div class="modal fade" id="addsubcategory"  role="dialog">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" >ADD NEW SUB_CATEGORY</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="addsubcategory" action="../controller/SubCategoryController.php?status=add_sub_category" method="post">
                <div class="row">
                <div class="col-md-12"><div id="SubCategoryAlert"></div></div> 
                </div>
                <div class="row">
                    <div class="col-md-6"><label class="control-label" >COLLECTION TYPE</label></div>
                    <div class="col-md-6 ">
                    <?php while ($collrow=$collectionResultThree->fetch_assoc()){?> 
                         <input class="chkbx" type="checkbox" name="type[]" id="type" value="<?php echo $collrow['collection_id'];?>">&nbsp;<?php echo $collrow["collection_name"];?>&nbsp;
                    <?php } ?>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-md-6"><label class="control-label" >CATEGORY NAME</label></div>                    
                    <div class="col-md-6">
                        <select class="form-control" name="Cat_id" id="Cat_id">
                            <option value=""></option>
                            <?php while ($catRow = $categoryResultTwo->fetch_assoc()){?>
                            <option value="<?php echo $catRow['category_id']; ?>"><?php echo $catRow['category_name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>      
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-md-6"><label class="control-label" >SUB CATEGORY NAME</label></div>
                    <div class="col-md-6"><input type="text" name="Sub_Category_name" id="Sub_Category_name" class="form-control"></div>
                </div>
                <div class="row">&nbsp;</div>
            <div class="row">
            <div class="col-md-6">&nbsp;</div>
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-4">
            <button type="submit" name="submit" class="btn btn-outline-primary">Save</button>
            </div>
            </div>
            </form>
            </div>
            </div>
            </div>
        </div>
        <!-----------///////////////////add sub category \\\\\\\\\\\\\\\---------->
        <!-----------////////////////add product modal \\\\\\\\\\\\\\\\\---------->
        <div class="modal fade" id="addproduct"  role="dialog">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ADD NEW PRODUCT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <div id="ProductAlert"></div>
                </div> 
            </div>
            <form id="product" method="post" enctype="multipart/form-data" action="../controller/ProductController.php?status=add_Product" >
            <div class="row">
                <div class="col-md-6"><lable class="control-label">Product Name :</lable><input type="text" name="pname" id="pName" class="form-control"></div>
                 <div class="col-md-6"><lable class="control-label">Collection Type :</lable>
                     <select id="coll_Id" name="coll_Id" class="form-control">
                         <option value="">Select Here..</option>
                         <?php while ($collRow = $collectionResultTwo->fetch_assoc()){ ?>
                         <option value="<?php echo $collRow['collection_id']; ?>"><?php echo $collRow['collection_name']; ?></option>
                         <?php }?>
                     </select>
                 </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-6"><lable class="control-label">Category :</lable>
                    <select id="categoryId" name="categoryId" class="form-control">
                        <option value="">Select Here..</option>
                    </select>
                </div>
                <div class="col-md-6"><lable class="control-label">Sub Category :</lable>
                    <select id="SubCatId" name="SubCatId" class="form-control">
                        <option value="">Select Here..</option>
                    </select> 
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-6"><lable class="control-label">Size :</lable>
                <br>
                <?php while($SizeRow = $SizeResult->fetch_assoc()){?>           
                <input class="chkbx" type="checkbox" name="size[]" id="size" value="<?php echo $SizeRow['size_id'];?>">&nbsp; <?php echo " ".$SizeRow['size'];?>&nbsp; 
                <?php } ?>
                </div>  
                <div class="col-md-6"><label class="control-label">Product Image :</label>
                    <br/>
                    <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input"  id="image" name="image" onchange="readURL(this) ">
                        <label class="custom-file-label" for="product_image">Choose file</label>
                    </div>
                    </div>
                    <br/>
                    <img id="prev_img" />
               </div>                    
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <div class="row">
            <div class="col-md-6"></div>
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
            </div>
        </div>
        <!-------///////////////add product model end \\\\\\\\\\\\\\---------->
        </div> 
        </div> 
       <!--------//////////////////// Content End\\\\\\\\\\\\\\\\\\------>
    </div>
    <!-----------/////////////////// Flud End\\\\\\\\\\\\\\\\\\\\------>
    </div>
</body>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script> 
<script type="text/javascript" src="../js/popper.min.js"></script> 
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/Product_Validation.js"></script>
<script type="text/javascript" src="../js/Category_Validation.js"></script>
<script >
        function readURL(input) {///image select
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
        $("#coll_Id").change(function(){///get category by collection
            var url = "../controller/productController.php?status=getCategoryByCollId";
            var x = $("#coll_Id").val();
            $.post(url,{coll_Id:x},function (data){
                $("#categoryId").html(data).show();
            });
        });
        $("#categoryId").change(function(){//get sub  category by category id
            var url = "../controller/productController.php?status=getSubCatByCatId";
            var x = $("#categoryId").val();
            $.post(url,{categoryId:x},function (data){
                $("#SubCatId").html(data).show();
            });
        }); 
        // upload image
        $(".custom-file-input").on("change",function(){
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
</script>
</html>



