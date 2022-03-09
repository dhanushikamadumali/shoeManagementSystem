<?php
include '../model/Category_Model.php';///include category model
include '../model/Sub_Category_Model.php';///include sub category model
include '../model/Collection_Model.php';//include collection model

$colleObj = new collection();//create collection object
$catObj = new Category();///create category object
$SubCatObj = new subCategory();///create sub category object

$status = $_REQUEST["status"];
switch ($status){
    case "add_sub_category"://add sub category
        try {
        $CatId = $_POST["Cat_id"];//get category id
        $SubCatName = $_POST["Sub_Category_name"];//get sub category name
        $addCollection = array();//create collection array
        $addCollection = $_POST["type"];///get collection as an array

        if($SubCatName==""){///if sub category empty
            throw new Exception("Subcategory cannot be empty");
        }
        if (empty($CatId)){///if category empty 
            throw new Exception("Please category Select Name");
        }
        if (empty($addCollection)){///if collection  empty 
            throw new Exception("Collection name can't be empty");
        } 
        $IsValid=$SubCatObj->getValidateSubcategoryName($SubCatName);//////////validating the exixtence of category name
        if($IsValid===false){
            throw new Exception("Sub Category name is Already Taken!!!!!!!");
        } 
        $SubCatId=$SubCatObj->addSubCategory($SubCatName, $CatId);//pass value subcategory module
        if ($SubCatId>0){
            foreach ($addCollection as $c){//make collection value as an array index
               $collectionid= $colleObj->addcollectionsubcategory($SubCatId,$c);///pass value to collection module
            }
            $msg="successfuly inserted subcategory ".$SubCatName;///msg variable create
            $msg= base64_encode($msg);//maesage encode
            ?>
            <!-- riderect -->
            <script>
            window.location="../view/product.php?msg=<?php echo $msg;?>"
            </script>
            <?php
        }
        } catch (Exception $ex) {//////catch exeptionn
            $error=$ex->getMessage();////////get message value
            $error= base64_encode($error);//message encode
            ?>
            <!-- riderect -->
            <script>window.location="../view/product.php?error=<?php echo $error;?>"</script>
            <?php
        }
    break;
    case "edit_sub_category"://edit sub category
        $SubCategoryId = $_POST["sub_category_id"];//get subcategory id
        $categoryResultTwo = $catObj->getAllCategory();//get all category
        $subcatResult = $SubCatObj->getsubCategory($SubCategoryId);///pass sub category id to sub catgeory module
        $SubCatRow = $subcatResult->fetch_assoc();///make result as an array value
        $CollectionResult=$colleObj->getAllCollection();//get all collection 
        $CollectionCategoryResult =$SubCatObj->getCollectionSubCategory($SubCategoryId);///get collection by category
        $Collection=array();///create collection array
        while ($row=$CollectionCategoryResult->fetch_assoc()){//make a result as an array value
           array_push($Collection, $row['collection_collection_id']);//result value push collection array
        }
        ?>  
            <!-- view sub catagory -->
            <div class="row">
                <div class="col-md-6">
                    <label class="control-label" >COLLECTION TYPE</label>
                </div>
                <div class="col-md-6 ">
                <?php while ($collrow=$CollectionResult->fetch_assoc()){?> 
                    <input class="chkbx" type="checkbox" name="type[]"  value="<?php echo $collrow['collection_id'];?>"<?php if(in_array($collrow['collection_id'],$Collection)){?>checked="checked"<?php }?> >
                    &nbsp;<?php echo $collrow["collection_name"];?>&nbsp;
                <?php } ?>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-6">
                    <label class="control-label" >CATEGORY NAME</label>
                </div>
                <div class="col-md-6 ">
                <select class="form-control" name="Cat_id" id="Cat_id">
                    <option value=""></option>
                    <?php while ($catRow = $categoryResultTwo->fetch_assoc()){?>
                    <option value="<?php echo $catRow['category_id']; ?>" <?php if($catRow['category_id']==$SubCatRow['category_category_id']){?>selected="selected"<?php }?> >
                    <?php echo $catRow['category_name']; ?>
                    </option> 
                    <?php
                    }
                    ?>
                </select>
                </div>
            </div>
            <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label" >SUB CATEGORY NAME</label>
                    </div>
                    <div class="col-md-6">
                        <input type="hidden" id="Sub_Category_id" name="Sub_Category_id" class="form-control" value="<?php echo $SubCatRow['sub_category_id']?>">
                        <input type="text"  name="Sub_Category_name" id="Sub_Category_name" class="form-control" value="<?php echo $SubCatRow['sub_category_name']?>">
                    </div>
                </div>
            <!-- end sub category -->
        <?php 
    break;  

    case "update_sub_category":///update sub category
        
        try {
            $SubCategoryId = $_POST["Sub_Category_id"];//get sub category id
            $SubCategoryName = $_POST["Sub_Category_name"];///get sub category name
            $CategoryName = $_POST["Cat_id"];///get category id
            $eCollection=isset($_POST["type"])?$_POST["type"]:"";////get type and if empty type value

            if($eCollection==""){///if collection empty 
                throw new Exception("At least One type must be selected");
            }
            if (empty($CategoryName)){///if category empty 
                throw new Exception("Please Category Select");
            }
            if ($SubCategoryName==""){///if sub category name empty
                throw new Exception("Sub category can't be empty");
            }
            $IsValid=$SubCatObj->getValidateEditSubcategoryName($SubCategoryName);//////////validating the exixtence of category name
            if($IsValid===false){
                throw new Exception("Sub Category name is Already Taken!!!!!!!");
            } 
            $data[0]=1;
            $data[1] = 'Successfully updated to subcategory!!';///data success array
            
            $SubCatObj->updateSubCategory($SubCategoryId,$SubCategoryName,$CategoryName);//pass value tosub category module
            if($SubCategoryId>0){///if num of record greater than zero
                $SubCatObj->removeCollectionSubCategory($SubCategoryId);///pass category id for remove collection
                foreach ($eCollection as $c){//make a collection as an array value
                    $SubCatObj->addcollectionsubcategory($SubCategoryId,$c);///pass sub category id and collecton array value for add collection
                }
            }
         }catch (Exception $ex){//catch exeption
            $data[0]=0;
            $data[1]=$ex->getMessage();
        }
        echo json_encode($data); 
    break;
}



