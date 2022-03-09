<?php
include '../model/Category_Model.php';///include category model
include '../model/Sub_Category_Model.php';//include sub category model
include '../model/Product_Model.php';//include product model
include '../model/Collection_Model.php';//include collection model

$catObj = new  Category();//create category object
$SubCatObj = new subCategory();//create sub category object
$ProductObj = new product();//create product object
$colleObj = new collection();//create collection object

$status = $_REQUEST["status"];
switch ($status){
        
    case "getCategoryByCollId":///get category by collection id
        $Coll_Id = $_POST["coll_Id"];///get collection id
        $catResult = $catObj->getcategoryByCollectionId($Coll_Id);//pass collection id to category model
        ?>
            <!-- view category  -->
            <select id="categoryId" name="categoryId" class="form-control">
                <option value="">Select Here...</option>
                <?php while ($cRow = $catResult->fetch_assoc()){ ?>
                <option value="<?php echo $cRow['category_id']; ?>"><?php echo $cRow['category_name']; ?></option>   
                <?php
                }
                ?>
            </select>
            <!-- view end category -->
        <?php
    break;
    case "getSubCatByCatId":///for get sub category by category id
        $Cat_Id = $_POST["categoryId"];///get category id
        $subcatResult = $SubCatObj->getAllSubCategoryByCatId($Cat_Id);///get all sub category by category id
        ?>
        <!-- view sub category -->
            <select class="form-control">
                <option value=""></option>
                <?php while ($scRow = $subcatResult->fetch_assoc()){ ?>
                <option value="<?php echo $scRow['sub_category_id']; ?>"><?php echo $scRow['sub_category_name']; ?></option>   
                <?php
                }
                ?>
            </select>
        <!-- view end sub category -->
        <?php
    break;
    case "add_Product" :// for add_Product
        try { 
        // get form value by post methods
            $Product_name=$_POST["pname"];///get product name
            $CollectionId=$_POST["coll_Id"];//get collection id
            $CategoryId = $_POST["categoryId"];//get category id
            $SubCatId = $_POST["SubCatId"];//get sub category id
            $addSize = array();//create array
            $addSize = $_POST["size"];///get size value
         
        //    server side validation
            if($Product_name==""){///if product name empty
                throw new Exception("product name can't be empty");
            }
            if ($CollectionId==""){///if collection  empty 
                throw new Exception("Collection name can't be empty");
            }
            if ($CategoryId==""){///if category  empty 
                throw new Exception("Category name can't be empty");
            }
            if ($addSize==""){///if size  empty 
                throw new Exception("Size can't be empty");
            }
            if($_FILES["image"]["name"]==""){//////if an image empty
                throw new Exception("product image can't be empty");
            }
            $IsValid=$ProductObj->getValidateproductName($Product_name);//////validating the exixtence of the product name
            if($IsValid===false){
                throw new Exception("Product name is Already Taken!!!!!!!");
            }
            $Product_Id=$ProductObj->addProduct($Product_name,$CollectionId,$CategoryId,$SubCatId);/////// pass value to product table
           
            if($_FILES["image"]["name"]!=""){//////if an image upload
                $img=$_FILES["image"]["name"];//////image file name
                $img="".time()."_".$img;////new image name create
                $permanant="../image/product_image/$img";/////permenant location
                $tmp_location=$_FILES["image"]["tmp_name"];////////tempory storage location
                move_uploaded_file($tmp_location,$permanant);////to move from tempory to permanant
                $ProductObj->addImage($img, $Product_Id);/////pass image path image table
            }
            if($Product_Id>0){///if product id greater than zero
                foreach($addSize as $s){//make a size as an array value
                    $ProductObj->addSize($Product_Id,$s);////pass product size size table 
                };
                $msg = "Successfully Add to Product $Product_name";///successful msg
                $msg = base64_encode($msg);///msg is encode
                ?>
                <!-- riderect -->
                <script>
                window.location = "../view/product_manage.php?msg=<?php echo $msg;?>"
                </script>
                <?php 
            }  
        }catch (Exception $ex) {
            $error = $ex->getMessage();
            $error = base64_encode($error);
            ?>
            <!-- riderect -->
            <script>window.location = "../view/product.php?error=<?php echo $error; ?>"</script>
            <?php  
        } 
    break;
    case "update_product" :///update product
        try{
            $ProductId = $_POST["product_id"];//get product id
            $ProductName = $_POST["product_name"];//get product name
            $CollId = $_POST["coll_Id"];//get collection id
            $CatId = $_POST["cat_Id"];///get category id
            $SubCatId = $_POST["subcat_Id"];//get sub category id
            $updatesize=isset($_POST["size"])?$_POST["size"]:"";////get size and if empty size value
            //server side validation
            if($ProductName==""){///if product name empty
                throw new Exception("product name can not be empty");
            }
            if($CollId==""){///if collection  empty 
                throw new Exception("Collection name can not be empty");
            }
            if($CatId==""){///if category  empty 
                throw new Exception("Category name can not be empty");
            }
            if($updatesize==""){///if size empty 
                throw new Exception("At least One size must be selected");
            }
            $IsValid=$ProductObj->getValidateEditproductName($ProductName);//////validating the exixtence of the product name
            if($IsValid===false){
                throw new Exception("Product name is Already Taken!!!!!!!");
            }
            $data[0]=1;
            $data[1] = 'successfully Update Product!!';///data success array
        
            $ProductObj->updateProduct($ProductId,$ProductName,$CollId,$CatId,$SubCatId);

            if($_FILES["image"]["name"]!=""){//////if an image upload///////
                $img=$_FILES["image"]["name"];//////image file name
                $img="".time()."_".$img;///new image name create
                $permanant="../image/product_image/$img";////permenant location
                $tmp_location=$_FILES["image"]["tmp_name"];////////tempory storage location//////
                move_uploaded_file($tmp_location,$permanant);////to move from tempory to permanant////////
                $ProductObj->updateImage($img, $ProductId);///pass image path image table
            }
            if($ProductId>0){///if product id greater than zero
                $ProductObj->removeProductSize($ProductId);///pass product id for remove size
                foreach($updatesize as $s){//make a size as an array value
                    $ProductObj->addSize($ProductId,$s);//pass value to product model
                }
            }
        }catch (Exception $ex){//catch exeption
            $data[0]=0;
            $data[1]=$ex->getMessage();
        }
        echo json_encode($data);  

    break;
    case "deleteProduct":
        $ProductId = $_REQUEST['product_id'];
        $ProductId = base64_decode($ProductId);
        $ProductObj->deleteProduct($ProductId);
    break; 
            
      
}