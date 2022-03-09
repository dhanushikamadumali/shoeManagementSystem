<?php
include '../model/Category_Model.php';///include category model
include '../model/Collection_Model.php';//include collection model

$colleObj = new collection();//create collection object
$catObj = new Category();///create category object

$status = $_REQUEST["status"];
switch ($status){
    case "add_category":///add category
            
            try{
                $CatName = $_POST["Category_name"];///get category name
                $addCollection = array();//create collection array
                $addCollection = $_POST["type"];///get collection as an array

                if ($CatName==""){//if category name empty
                    throw new Exception("Category name can't be empty ");
                }
                if (empty($addCollection)){///if collection  empty 
                    throw new Exception("Collection name can't be empty");
                } 
                $IsValid=$catObj->getValidatecategoryName($CatName);//////////validating the exixtence of category name
                if($IsValid===false){
                    throw new Exception("Category name is Already Taken!!!!!!!");
                }           
                $Catstatus = $catObj->addCategory($CatName);///pass value category module
                if ($Catstatus>0){//if catstatus greater than zero
                    foreach ($addCollection as $c){//make collection value as an array index
                        $colleObj->addcollectioncategory($Catstatus,$c);///pass value to collection module
                    }
                $msg= "Successfully Inserted Category " .$CatName;////msg variable create
                $msg = base64_encode($msg);///maesage encode
                ?>
                <!-- riderect -->
                <script>window.location ="../view/product.php?msg=<?php echo $msg ;?>"</script>
                <?php
                } 
        } catch (Exception $ex) {///////catch exeptionn
            $error=$ex->getMessage();/////////get message value
            $error = base64_encode($error);//message encode
            ?>
            <!-- riderect -->
            <script>window.location ="../view/product.php?error=<?php echo $error ;?>"</script>
            <?php
        }
        break;
        
        case "edit_category"://edit category
            $Category_id = $_POST["category_id"];///get category id
            $CategoryResult = $catObj->getCategory($Category_id);//pass category id category module
            $catRow = $CategoryResult->fetch_assoc();//make a result as an array value
            $CollectionResult=$colleObj->getAllCollection();//get all collection 
            $CollectionCategoryResult =$catObj->getCollectionCategory($Category_id);///get collection by category
            $Collection=array();///create collection array
            while ($row=$CollectionCategoryResult->fetch_assoc()){//make a result as an array value
               array_push($Collection, $row['collection_collection_id']);//result value push collection array
            }
            ?>  
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
                    <div class="col-md-6">
                        <input type="hidden" id="Category_id" name="Category_id" class="form-control" value="<?php echo $catRow['category_id']?>">
                        <input type="text" id="Category_name" name="Category_name" class="form-control" value="<?php echo $catRow['category_name']?>">
                    </div>
                </div>
            <?php
                      
        break;
        case "update_category"://update category
            try{
                $Category_id = $_POST["Category_id"];///get category id 
                $Category_name = $_POST["Category_name"];///get category name
                $eCollection=isset($_POST["type"])?$_POST["type"]:"";////get type and if empty type value
                // if(isset($_POST["type"])){
                //     $eCollection=$_POST["type"];
                // }else{
                //     $eCollection="";
                // }
                if($eCollection==""){///if size empty 
                    throw new Exception("At least One type must be selected");
                }
                if (($Category_name=="")){//if category name empty
                    throw new Exception ("Category name can't be empty");
                }
               
                $IsValid=$catObj->getValidateEditcategoryName($Category_name);//////////validating the exixtence of category name
                if($IsValid===false){
                    throw new Exception("Category name is Already Taken!!!!!!!");
                } 
                $data[0]=1;
                $data[1] = 'successfully Update Category!!';///data success array
            
                $catObj->updateCategory($Category_id, $Category_name);//pass value to category module
                if($Category_id>0){///if num of record greater than zero
                    $catObj->removeCollectionCategory($Category_id);///pass category id for remove collection
                    foreach ($eCollection as $c){//make a collection as an array value
                        $colleObj->addcollectioncategory($Category_id,$c);///pass category id and collecton array value for add collection
                    }
                }
                }catch (Exception $ex){//catch exeption
                    $data[0]=0;
                    $data[1]=$ex->getMessage();
                }
                echo json_encode($data);  
        break;
        
        
       
}

