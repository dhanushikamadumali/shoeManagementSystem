<?php
include '../model/MCategory_Model.php';///include m category model
include '../model/MCollection_Model.php';//include m collection model

$colleObj = new  collection();//create m collection object
$catObj = new Category();///create m category object

$status = $_REQUEST["status"];
switch ($status){
    case "add_m_category":///add material category
            
            try{
                $CatName = $_POST["Category_name"];///get m category name
                $addCollection = array();//create m collection array
                $addCollection = $_POST["type"];///get m collection as an array

                if ($CatName==""){//if category name empty
                    throw new Exception("Material Category name can't be empty ");
                }
                if (empty($addCollection)){///if m collection  empty 
                    throw new Exception("Material collection name can't be empty");
                } 
               
                $IsValid=$catObj->getValidatemcategoryName($CatName);//////////validating the exixtence of category name
                if($IsValid===false){
                    throw new Exception("Material Category name is Already Taken!!!!!!!");
                }            
                $Catstatus = $catObj->addmCategory($CatName);///pass value category module
                if ($Catstatus>0){//if catstatus greater than zero
                    foreach ($addCollection as $c){//make m collection value as an array index
                        $colleObj->addmcollectioncategory($Catstatus,$c);///pass value to m collection module
                    }
                $msg= "Successfully inserted material category " .$CatName;////msg variable create
                $msg = base64_encode($msg);///maesage encode
                ?>
                <!-- riderect -->
                <script>window.location ="../view/row_material.php?msg=<?php echo $msg ;?>"</script>
                <?php
                } 
        } catch (Exception $ex) {///////catch exeptionn
            $error=$ex->getMessage();/////////get message value
            $error = base64_encode($error);//message encode
            ?>
            <!-- riderect -->
            <script>window.location ="../view/row_material.php?error=<?php echo $error ;?>"</script>
            <?php
        }
        break;
        
        case "edit_m_category"://edit category
            $Category_id = $_POST["category_id"];///get m category id
            $CategoryResult = $catObj->getmCategory($Category_id);//pass m category id category module
            $catRow = $CategoryResult->fetch_assoc();//make a result as an array value
            $CollectionResult=$colleObj->getAllCollection();//get all m collection 
            $CollectionCategoryResult =$catObj->getmCollectionCategory($Category_id);///get m collection by category
            $collection=array();///create m collection array
            while ($row=$CollectionCategoryResult->fetch_assoc()){//make a result as an array value
               array_push($collection, $row['r_m_collection_r_m_collection_id']);//result value push m collection array
            }
            ?>  
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
                    <div class="col-md-6">
                        <input type="hidden" id="Category_id" name="Category_id" class="form-control" value="<?php echo $catRow['r_m_category_id']?>">
                        <input type="text" id="Category_name" name="Category_name" class="form-control" value="<?php echo $catRow['r_m_category_name']?>">
                    </div>
                </div>
            <?php
                      
        break;
   case "update_m_category"://update category
        try{
            $Category_id = $_POST["Category_id"];///get m category id 
            $Category_name = $_POST["Category_name"];///get category name
            $eCollection=isset($_POST["type"])?$_POST["type"]:"";////get type and if empty type value
            
            if (($Category_name=="")){//if category name empty
                throw new Exception ("Material Category name can't be empty");
            }
            if($eCollection==""){///if size empty 
                throw new Exception("At least One type must be selected");
            }
            $IsValid=$catObj->getValidateEditmcategoryName($Category_name);//////////validating the exixtence of category name
            if($IsValid===false){
                throw new Exception("Material Category name is Already Taken!!!!!!!");
            } 
            $data[0]=1;
            $data[1] = 'Successfully Update Material Category!!!';///data success array
        
            $catObj->updatemCategory($Category_id, $Category_name);//pass value to category module
            if($Category_id>0){///if num of record greater than zero
                $catObj->removemCollectionCategory($Category_id);///pass m category id for remove m collection
                foreach ($eCollection as $c){//make a m collection as an array value
                    $colleObj->addmcollectioncategory($Category_id,$c);///pass m category id and collecton array value for add m collection
                }    
            }
        }catch (Exception $ex){//catch exeption
            $data[0]=0;
            $data[1]=$ex->getMessage();
        }
        echo json_encode($data);  
    break;
        
        
       
}

