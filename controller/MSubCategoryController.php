<?php
include '../model/MCategory_Model.php';///include m category model
include '../model/MSub_Category_Model.php';///include m sub category model
include '../model/MCollection_Model.php';//include m collection model

$colleObj = new  collection();//create m collection object
$catObj = new Category();///create category object
$SubCatObj = new subCategory();///create sub category object

$status = $_REQUEST["status"];
switch ($status){
    case "add_m_sub_category"://add m sub category
        try {
        $CatId = $_POST["Cat_id"];//get m category id
        $SubCatName = $_POST["Sub_Category_name"];//get m sub category name
        $addCollection = array();//create m collection array
        $addCollection = $_POST["type"];///get m collection as an array
     
        if (empty($addCollection)){///if m collection  empty 
            throw new Exception("Material collection name can't be empty");
        }
        if (empty($CatId)){///if m category empty 
            throw new Exception("Please material category Select Name");
        }
        if($SubCatName==""){///if m sub category empty
            throw new Exception("Material Subcategory cannot be empty");
        }
        $IsValid=$SubCatObj->getValidatemsubcategoryName($SubCatName);//////////validating the exixtence of category name
        if($IsValid===false){
            throw new Exception("Material Sub Category name is Already Taken!!!!!!!");
        }  
        $SubCatId=$SubCatObj->addMSubCategory($SubCatName, $CatId);//pass value m subcategory module
        if ($SubCatId>0){
            foreach ($addCollection as $c){//make m collection value as an array index
                $SubId = $colleObj->addmcollectionsubcategory($SubCatId,$c);///pass value to m collection module
            }
            $msg="Successfuly Inserted Subcategory ".$SubCatName;///msg variable create
            $msg= base64_encode($msg);//maesage encode
            ?>
            <!-- riderect -->
            <script>
            window.location="../view/row_material.php?msg=<?php echo $msg;?>"
            </script>
            <?php
        }
        } catch (Exception $ex) {//////catch exeptionn
            $error=$ex->getMessage();////////get message value
            $error= base64_encode($error);//message encode
            ?>
            <!-- riderect -->
            <script>window.location="../view/row_material.php?error=<?php echo $error;?>"</script>
            <?php
        }
    break;
    case "edit_m_sub_category"://edit m sub category
        $SubCategoryId = $_POST["sub_category_id"];//get m subcategory id
        $categoryResultTwo = $catObj->getmAllCategory();//get all m category
        $subcatResult = $SubCatObj->getmsubCategory($SubCategoryId);///pass m sub category id to m sub catgeory module
        $SubCatRow = $subcatResult->fetch_assoc();///make result as an array value
        $CollectionResult=$colleObj->getAllCollection();//get all m collection 
        $CollectionCategoryResult =$SubCatObj->getmCollectionSubCategory($SubCategoryId);///get m collection by category
        $collection=array();///create m collection array
        while ($row=$CollectionCategoryResult->fetch_assoc()){//make a result as an array value
           array_push($collection, $row['r_m_collection_r_m_collection_id']);//result value push m collection array
        }
        ?>  
            <!-- view m sub catagory -->
            <div class="row">
                    <div class="col-md-6">
                        <label class="control-label" >MATERIAL M COLLECTION TYPE</label>
                    </div>
                    <div class="col-md-6 ">
                    <?php while ($collrow=$CollectionResult->fetch_assoc()){?> 
                    <input class="chkbx" type="checkbox" name="type[]"  value="<?php echo $collrow['r_m_collection_id'];?>"<?php if(in_array($collrow['r_m_collection_id'],$collection)){?>checked="checked"<?php }?> >
                    &nbsp;<?php echo $collrow["r_m_collection_name"];?>&nbsp;
                    <?php } ?>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-6">
                    <label class="control-label" >MATERIAL CATEGORY NAME</label>
                </div>
                <div class="col-md-6 ">
                <select class="form-control"  name="Cat_id" id="Cat_id">
                    <option value=""></option>
                    <?php while ($catRow = $categoryResultTwo->fetch_assoc()){?>
                    <option value="<?php echo $catRow['r_m_category_id']; ?>" <?php if($catRow['r_m_category_id']==$SubCatRow['r_m_category_r_m_category_id']){?>selected="selected"<?php }?> >
                    <?php echo $catRow['r_m_category_name']; ?>
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
                        <label class="control-label" >MATERIAL SUB CATEGORY NAME</label>
                    </div>
                    <div class="col-md-6">
                        <input type="hidden" id="Sub_Category_id" name="Sub_Category_id" class="form-control" value="<?php echo $SubCatRow['r_m_subcategory_id']?>">
                        <input type="text"  name="Sub_Category_name" id="Sub_Category_name" class="form-control" value="<?php echo $SubCatRow['r_m_subcategory_name']?>">
                    </div>
                </div>
                <!-- end m sub category -->
        <?php
    break;  

    case "update_m_sub_category":///update m sub category
        
        try {
            $SubCategoryId = $_POST["Sub_Category_id"];//get m sub category id
            $SubCategoryName = $_POST["Sub_Category_name"];///get m sub category name
            $CategoryName = $_POST["Cat_id"];///get m category id
            $eCollection=isset($_POST["type"])?$_POST["type"]:"";////get type and if empty type value
            
            if ($SubCategoryName==""){///if m sub category name empty
                throw new Exception("Material Sub category can't be empty");
            }
            if (empty($CategoryName)){///if m category empty 
                throw new Exception("Please Material Category Select");
            }
            $IsValid=$SubCatObj->getValidateEditmsubcategoryName($SubCategoryName);//////////validating the exixtence of category name
            if($IsValid===false){
                throw new Exception("Material Sub Category name is Already Taken!!!!!!!");
            } 
            $data[0]=1;
            $data[1] = 'Successfully updated to material subcategory!!';///data success array

            $SubCatObj->updateMSubCategory($SubCategoryId,$SubCategoryName,$CategoryName);//pass value to m sub category module
            if ($SubCategoryId>0){//if catstatus greater than zero
                $SubCatObj->removemCollectionSubCategory($SubCategoryId);///pass m category id for remove m collection
                foreach ($eCollection as $c){//make a m collection as an array value
                    $colleObj->addmcollectionsubcategory($SubCategoryId,$c);///pass m category id and collecton array value for add m collection
                }
            }

        }catch (Exception $ex) {////catch exception
            $data[0]=0;
            $data[1]=$ex->getMessage();
        }
        echo json_encode($data); 
    break;
}



