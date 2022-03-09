<?php
include '../model/Sub_Category_Model.php';//include sub category model
include '../model/Pos_Model.php';///include pos model
include '../model/Product_Model.php';//include product model

$subCatObj = new subCategory();///create sub category object
$posObj = new pos();////create pos object

$productResult = $posObj->getAllProduct();///get all product
$productObj = new product();////create product object

$status = $_REQUEST['status'];////request status

    switch ($status) {
        case 'getSubCategory':////getsubcategory status
            $categoryId = $_POST["catId"];////get category id
            $subCategoryResult = $subCatObj->getAllSubCategoryByCatId($categoryId);////pass category id 
            ////  select subcategory drop down
            ?>
            <select name="subCatId" id="subCatId" class="form-control">
                <option value="">select sub category...</option>
                <!-- pass result array loop -->
                <?php while ($row = $subCategoryResult->fetch_assoc()){ ?>
                    <option value="<?php echo $row['sub_category_id'];?>"><?php echo $row['sub_category_name'];?></option>
                <?php }?>
                <!-- loop array end -->
            </select>
            <?php
            /////end drop down
        break;

        case 'getProduct':////getproduct status
            $catId = $_POST['catId'];////get category id
            $subCatId = $_POST['subCatId'];////get sub category id
            $catProduct = $posObj->getProduct($catId,$subCatId);////pass category id, sub category id
            ?>
            <div class="row">
                <?php
                $Count=0;
                while($row = $catProduct->fetch_assoc()){////catproduct result pass array
                    $productId=$row['product_id'];////get product id value
                    $productImg =$posObj->getAllImg1($productId);/////get all image
                    $imgRow=$productImg->fetch_assoc();////
                    $Count++; 
                ?>                            
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a id="<?php echo $productId ?>" onclick= "product(<?php echo $productId ?>,<?php echo $row['size_id'] ?>)" type="button" class="text-decoration-none text-muted product">
                        <div>
                            <div class="card shadow" >
                                <img class="card-img-top" src="../image/product_image/<?php echo $imgRow['product_img_name'];?>" alt="" style="height:100px; width:60%; margin-left:28px">
                                <div class="card-body">
                                    <small class="productName"><?php echo $row['product_name'];?></small><br>
                                    <small class="productName">size: &nbsp;<?php echo $row['size'] ?></small>
                                    <input type="hidden" id="size" name="size[]" value="<?php echo $row['size_id'] ?>"> 
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php if ($Count%4==0) {?>                            
            </div>
            <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div></div>
                <div class="row"> 
                    <?php } } ?>                   
            </div>
            <?php
        break;
        case "getproductDetails"://for product detail
            $productId = $_POST['ProductId'];///get product id
            $sizeId = $_POST['sizeId'];//get size
            $tableRowCount = $_POST['tableRowCount'];//get row count
            
            $productDetailResult = $posObj->getAllImg($productId,$sizeId);///pass value pos model for get all image
            $Row = $productDetailResult->fetch_assoc();//make a result as an array
            echo json_encode($Row);
    
        break;
       
      

}