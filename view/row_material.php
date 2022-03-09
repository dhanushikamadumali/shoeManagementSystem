<?php  
include '../model/Row_Material_Model.php';//include row material model
include '../model/MCategory_Model.php';//include m category model
include '../model/MSub_Category_Model.php';//include m sub category model
include '../model/MCollection_Model.php';//include m collection model

$colleObj = new collection();//create collection object
$catObj = new Category();//create category object
$SubCatObj = new subCategory();//create sub category object
$RowMaterialObj = new  row_material(); //create product object
$collectionResult = $colleObj->getAllCollection();//get all m collection
$collectionResultTwo = $colleObj->getAllCollection();///get all m collection 
$collectionResultThree = $colleObj->getAllCollection();///get all m collection
$categoryResult = $catObj->getmAllCategory();//get all m category
$categoryResultTwo = $catObj->getmAllCategory();//get all m category
$subcatResult = $SubCatObj->getAllMsubCategory();//get all m sub category 
$UnitResult = $RowMaterialObj->getUnit();///get size deatil
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Row Material</title>    
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/fontawesome/css/all.css" >
</head>
<style>
.product_image{
    /* border: 5px solid #000; */
  border-radius: 4px;
  padding: 5px;
  width: 500px;
  border: 2px solid #000;
  height: 150px;
  border-color:#ff661a;
}
#topic{
    text-shadow:2px 2px 5px #ff9966;
    color:#ff661a;
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
                    <nav aria-label="Breadcrumb"style="height:49px;">
                    <ol class="breadcrumb">
                        <h4 class="breadcrumb-item active" aria-current="page" style="color: #000;">ADD NEW ROW MATERIAL</h4>
                        <li class="breadcrumb-item"><a href="view_r_material_stock.php" style="color: #000;font-size:20px;text-decoration:none;">VIEW STOCK</a></li>
                    </ol>
                    </nav>
                </div>
            </div>
        <!---------/////////header end\\\\\\\\\\\--------->
        <div class="row"><div class="col-md-12" style="padding-top: 70px;">&nbsp;</div></div>
       
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
                    <h5 id="topic">MATERIAL COLLECTION</h5>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">&nbsp;</div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <button class="btn btn" data-toggle="modal" data-target="#addcollection" style="background-color: #ff7733;color:#fff" ><i class="fas fa-plus"></i>  Add</button>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">&nbsp;</div>   
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
                <div class="product_image">
                    <h5 id="topic">MATERIAL CATEGORY</h5>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <button type="button" class="btn btn" data-toggle="modal" data-target="#addcategory" style="background-color: #ff7733;color:#fff"><i class="fas fa-plus"></i>  Add</button>
                    <a href="m_category.php" class="btn btn" style="background-color:#ff9966;color:#fff"><i class="far fa-edit"></i>&nbsp;Manage</a>
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
                    <h5 id="topic">MATERIAL SUB CATEGORY</h5>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <button type="button" class="btn btn" data-toggle="modal" data-target="#addsubcategory" style="background-color: #ff7733;color:#fff"> <i class="fas fa-plus"></i> Add</button>
                    <a href="m_sub_category.php" class="btn btn" style="background-color:#ff9966;color:#fff"><i class="far fa-edit"></i>&nbsp;Manage</a>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">&nbsp;</div>  
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product_image">
                    <h5 id="topic">ROW MATERIAL</h5>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <button type="button" class="btn btn" data-toggle="modal" data-target="#addrowMaterial" style="background-color: #ff7733;color:#fff"><i class="fas fa-plus"></i>  Add</button>
                    <a href="row_material_manage.php" class="btn btn" style="background-color:#ff9966;color:#fff"><i class="far fa-edit"></i>&nbsp;Manage</a>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">&nbsp;</div>  
                    </div>
                </div>
            </div>
        </div>
        <!------////////////////////add collection \\\\\\\\\\\\\\\\\\\\\\\\--------->
        <div class="modal fade" id="addcollection"  role="dialog" >
            <div class="modal-dialog">
            <form id="addcollection" action="../controller/MCollectionController.php?status=add_m_collection" method="post">
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" >ADD NEW MATERIAL COLLECTION</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col-md-12">
                    <div id="CollectionAlert"></div>
                </div> 
                </div>
                <div class="row">
                    <div class="col-md-6"><label class="control-label" >MATERIAL COLLECTION NAME</label></div>
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
            </div>
           
            </div>
            </form>
            </div>
        </div>
        <!----------//////////////add collection end \\\\\\\\\\\\\\\\\---------->
        <!----------/////////////add category \\\\\\\\\\\\\\\\\\\\--------->
        <div class="modal fade" id="addcategory"  role="dialog" >
            <div class="modal-dialog">
            <form id="addcategory" action="../controller/MCategoryController.php?status=add_m_category" method="post" enctype="multipart/form-data">
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" >ADD NEW MATERIAL CATEGORY</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col-md-12"><div id="CategoryAlert"></div></div> 
                </div>
                <div class="row">
                    <div class="col-md-6"><label class="control-label" >MATERIAL COLLECTION TYPE</label></div>
                    <div class="col-md-6 ">
                    <?php while ($collrow=$collectionResult->fetch_assoc()){?> 
                         <input class="chkbx" type="checkbox" name="type[]" id="type" value="<?php echo $collrow['r_m_collection_id'];?>">&nbsp;<?php echo $collrow["r_m_collection_name"];?>&nbsp;
                    <?php } ?>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-md-6"><label class="control-label" >MATERIAL CATEGORY NAME</label></div>
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
            </div>
            </div>
            </form>
            </div>
        </div>
        <!----------////////////////add category end \\\\\\\\\\\\\\\\---------->
        <!----------///////////////add sub category \\\\\\\\\\\\\\\\\---------->
        <div class="modal fade" id="addsubcategory"  role="dialog">
            <div class="modal-dialog">
            <form id="addsubcategory" action="../controller/MSubCategoryController.php?status=add_m_sub_category" method="post">
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" >ADD NEW MATERIAL SUB_CATEGORY</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col-md-12"><div id="SubCategoryAlert"></div></div> 
                </div>
                <div class="row">
                    <div class="col-md-6"><label class="control-label" >MATERIAL COLLECTION TYPE</label></div>
                    <div class="col-md-6 ">
                    <?php while ($collrow=$collectionResultThree->fetch_assoc()){?> 
                         <input class="chkbx" type="checkbox" name="type[]" id="type" value="<?php echo $collrow['r_m_collection_id'];?>">&nbsp;<?php echo $collrow["r_m_collection_name"];?>&nbsp;
                    <?php } ?>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-md-6"><label class="control-label" >MATERIAL CATEGORY NAME</label></div>                    
                    <div class="col-md-6">
                        <select class="form-control" name="Cat_id" id="Cat_id">
                            <option value=""></option>
                            <?php while ($catRow = $categoryResultTwo->fetch_assoc()){?>
                            <option value="<?php echo $catRow['r_m_category_id']; ?>"><?php echo $catRow['r_m_category_name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>      
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-md-6"><label class="control-label" >MATERIAL SUB CATEGORY NAME</label></div>
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
            </div>
            </div>
            </form>
            </div>
        </div>
        <!-----------///////////////////add sub category \\\\\\\\\\\\\\\---------->
        <!-----------////////////////add row material modal \\\\\\\\\\\\\\\\\---------->
        <div class="modal fade" id="addrowmaterial"  role="dialog">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ADD NEW ROW MATERIAL</h5>
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
            <form id="rowMaterial" method="post" enctype="multipart/form-data" action="../controller/RowMaterialController.php?status=add_Row_Material" >
            <div class="row">
                <div class="col-md-6"><lable class="control-label">Row Material Name :</lable><input type="text" name="rmname" id="rmName" class="form-control"></div>
                 <div class="col-md-6"><lable class="control-label">Row Material Collection Type :</lable>
                     <select id="coll_Id" name="coll_Id" class="form-control">
                         <option value="">Select Here..</option>
                         <?php while ($collRow = $collectionResultTwo->fetch_assoc()){ ?>
                         <option value="<?php echo $collRow['r_m_collection_id']; ?>"><?php echo $collRow['r_m_collection_name']; ?></option>
                         <?php }?>
                     </select>
                 </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-6"><lable class="control-label">Row Material Category :</lable>
                    <select id="categoryId" name="categoryId" class="form-control">
                        <option value="">Select Here..</option>
                    </select>
                </div>
                <div class="col-md-6"><lable class="control-label">Row Material Sub Category :</lable>
                    <select id="SubCatId" name="SubCatId" class="form-control">
                        <option value="">Select Here..</option>
                    </select> 
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-6"><label class="control-label">Unit :</label>
                    <select id="unit_Id" name="unit_Id" class="form-control">
                    <option value="">Select Here..</option>
                        <?php while ($unitRow = $UnitResult->fetch_assoc()){ ?>
                        <option value="<?php echo $unitRow['unit_id']; ?>"><?php echo $unitRow['unit_name']; ?></option>
                        <?php }?>
                    </select>
                </div> 
                <div class="col-md-6"><label class="control-label">Row Material Image :</label>
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
            </div>
            </div>
            </form>
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
<script type="text/javascript" src="../js/RM_Validation.js"></script>
<script type="text/javascript" src="../js/RMcategory_Validation.js"></script>
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
        $("#coll_Id").change(function(){///get m category by collection
            var url = "../controller/RowMaterialController.php?status=getMCategoryByCollId";
            var x = $("#coll_Id").val();
            $.post(url,{coll_Id:x},function (data){
                $("#categoryId").html(data).show();
            });
        });
        $("#categoryId").change(function(){//get m sub category by category id
            var url = "../controller/RowMaterialController.php?status=getMSubCatByCatId";
            var x = $("#categoryId").val();
            $.post(url,{categoryId:x},function (data){
                $("#SubCatId").html(data).show();
            });
        }); 
        $(".custom-file-input").on("change",function(){// upload image
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
</script>
</html>



