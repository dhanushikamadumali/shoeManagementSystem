<?php
include '../model/MCategory_Model.php';///include m category model
include '../model/MSub_Category_Model.php';//include  m sub category model
include '../model/Row_Material_Model.php';//include row material model
include '../model/MCollection_Model.php';//include m collection model

$catObj = new  Category();//create category object
$SubCatObj = new subCategory();//create sub category object
$RowMaterialObj = new row_material();//create row material object
$colleObj = new collection();//create collection object

$status = $_REQUEST["status"];
switch ($status){
        
    case "getMCategoryByCollId":///get m category by collection id
        $Coll_Id = $_POST["coll_Id"];///get collection id
        $catResult = $catObj->getmcategoryByCollectionId($Coll_Id);//pass collection id to category model
        ?>
            <!-- view category  -->
            <select id="categoryId" name="categoryId" class="form-control">
                <option value="">Select Here...</option>
                <?php while ($cRow = $catResult->fetch_assoc()){ ?>
                <option value="<?php echo $cRow['r_m_category_id']; ?>"><?php echo $cRow['r_m_category_name']; ?></option>   
                <?php
                }
                ?>
            </select>
            <!-- view end category -->
        <?php
    break;
    case "getMSubCatByCatId":///for get m sub category by category id
        $Cat_Id = $_POST["categoryId"];///get m category id
        $subcatResult = $SubCatObj->getAllMSubCategoryByCatId($Cat_Id);///get all m sub category by category id
        ?>
        <!-- view m sub category -->
            <select class="form-control">
                <option value=""></option>
                <?php while ($scRow = $subcatResult->fetch_assoc()){ ?>
                <option value="<?php echo $scRow['r_m_subcategory_id']; ?>"><?php echo $scRow['r_m_subcategory_name']; ?></option>   
                <?php
                }
                ?>
            </select>
        <!-- view end m sub category -->
        <?php
    break;
    case "add_Row_Material" :// for add_Product
        try { 
        // get form value by post methods
            $Row_Material_name=$_POST["rmname"];///get product name
            $CollectionId=$_POST["coll_Id"];//get collection id
            $CategoryId = $_POST["categoryId"];//get category id
            $SubCatId = $_POST["SubCatId"];//get sub category id
            $UnitId = $_POST["unit_Id"];//get unit id
        
        //    server side validation
            if($Row_Material_name==""){///if row material name empty
                throw new Exception("Row_Material name can't be empty");
            }
            if ($CollectionId==""){///if collection  empty 
                throw new Exception("Collection name can't be empty");
            }
            if ($CategoryId==""){///if category  empty 
                throw new Exception("Category name can't be empty");
            }
            $IsValid=$RowMaterialObj->getValidateRowMaterialName($Row_Material_name);//////validating the exixtence of the row material name
            if($IsValid===false){
                throw new Exception("Row Material name is Already Taken!!!!!!!");
            }
            $Row_Material_Id=$RowMaterialObj->addRowMaterial($Row_Material_name,$CategoryId,$CollectionId,$SubCatId,$UnitId);///////value was insert to row material table
            if($_FILES["image"]["name"]!=""){//////if an image upload
                $img=$_FILES["image"]["name"];//////image file name
                $img="".time()."_".$img;////new image name create
                $permanant="../image/row_material_image/$img";/////permenant location
                $tmp_location=$_FILES["image"]["tmp_name"];////////tempory storage location
                move_uploaded_file($tmp_location,$permanant);////to move from tempory to permanant
                $RowMaterialObj->addImage($img, $Row_Material_Id);/////image path was insert to image table
            }
            $msg = "Successfully Add to Row Material $Row_Material_name";///successfull massage
            $msg = base64_encode($msg);///massage is encode
            ?>
            <!-- riderect -->
            <script>window.location = "../view/row_material_manage.php?msg=<?php echo $msg;?>"</script>
            <?php 
        }catch (Exception $ex) {
            $error = $ex->getMessage();
            $error = base64_encode($error);
            ?>
            <!-- riderect -->
            <script>window.location = "../view/row_material.php?error=<?php echo $error; ?>"</script>
            <?php  
        } 
    break;
    case "update_rowmaterial" :///update user
        try{
            $RowMaterialId = $_POST["r_material_id"];//get product id
            $RowMaterialName = $_POST["r_material_name"];//get product name
            $CollId = $_POST["coll_Id"];//get collection id
            $CatId = $_POST["cat_Id"];///get category id
            $SubCatId = $_POST["subcat_Id"];//get sub category id
            $Unit = $_POST["unit"];//get unit name
              
            if($RowMaterialName==""){///if row material name empty
                throw new Exception("Row_Material name can't be empty");
            }
            if($CollId==""){///if collection  empty 
                throw new Exception("Collection name can't be empty");
            }
            if($CatId==""){///if category empty 
                throw new Exception("Category name can't be empty");
            }
            if($Unit==""){///if unit empty 
                throw new Exception("Unit can't be empty");
            }
            $IsValid1=$RowMaterialObj->getValidateEditRowMaterialName($RowMaterialName);//////validating the exixtence of the row material name
            if($IsValid1===false){
                throw new Exception("Row Material name is Already Taken!!!!!!!");
            }
            $data[0]=1;
            $data[1] = 'successfully Update Row Material!!';///data success array
        
            $result = $RowMaterialObj->updateRowMaterial($RowMaterialId,$RowMaterialName,$CollId,$CatId,$SubCatId,$Unit);///update values inser to database
          
            if($_FILES["image"]["name"]!=""){//////if an image upload///////
                $img=$_FILES["image"]["name"];//////image file name
                $img="".time()."_".$img;///new image name create
                $permanant="../image/row_material_image/$img";////permenant location
                $tmp_location=$_FILES["image"]["tmp_name"];////////tempory storage location//////
                move_uploaded_file($tmp_location,$permanant);////to move from tempory to permanant////////
                $RowMaterialObj->updateImage($img,$RowMaterialId);///pass image path image table
            }
        }catch (Exception $ex){//catch exeption
            $data[0]=0;
            $data[1]=$ex->getMessage();
        }
        echo json_encode($data);  
    break;
    
            
      
}