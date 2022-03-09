<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class product{
    // get all size
    function getSize(){
        $con= $GLOBALS['con'];
        $sql = "SELECT * FROM size";
        $result=$con->query($sql);
        return $result;
    }
    // add product to producttable
    function addProduct($Product_Name,$Collection_Id,$Category_Id,$SubCategory_Id){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO product(product_name,collection_collection_id,category_category_id,sub_category_sub_category_id)
                 VALUES('$Product_Name','$Collection_Id','$Category_Id','$SubCategory_Id')";
        $con->query($sql);
        if($con->insert_id>0){
            return $con->insert_id;
        }
        else{
            return false;
        }
    }
    // validated product name
    function getValidateproductName($Product_name){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM product WHERE product_name='$Product_name'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
    }
    // validated edit product name
    function getValidateEditproductName($Product_name){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM product WHERE product_name='$Product_name'";
        $result = $con->query($sql);
        if($result->num_rows>1){
            return false;
        } 
        else {
            return true; 
        }
    }
    // add size to size table
    function addSize($Product_Id,$SizeId){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO product_has_size(product_product_id,size_size_id) VALUES('$Product_Id','$SizeId')";
        $con->query($sql) or die($con->error);
        if($con->insert_id>0){
            return $con->insert_id;
        }
        else{
            return false;
        }
    }
    // add image to image table
    function addImage($Product_Name,$Product_Id){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO product_img(product_img_name,product_product_id) VALUES('$Product_Name','$Product_Id')";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // get all product by category id
    function getAllProduct(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM product p,category c,product_img pi WHERE p.category_category_id=c.category_id AND pi.product_product_id=p.product_id ORDER BY p.product_id ASC";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // get product
    function getProduct($ProductId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM product p,product_img pi,category c,product_has_size ps,size s WHERE
                 p.product_id=pi.product_product_id AND c.category_id=p.category_category_id AND ps.product_product_id=p.product_id AND ps.size_size_id=s.size_id AND  p.product_id='$ProductId'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // get product size
    function getproductsize($ProductId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM product_has_size ps,size s,product_stock pp WHERE s.size_id=ps.size_size_id AND pp.product_product_id=ps.product_product_id AND ps.size_size_id=pp.size_id  AND ps.product_product_id='$ProductId'"; 
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // get product size
    function getproductreorder($ProductId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM product_stock ps WHERE  ps.product_product_id='$ProductId'"; 
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // get product image
    function getImage($ProductId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM product_img pi,product p WHERE pi.product_product_id=p.product_id AND pi.product_product_id='$ProductId'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // update product
    function updateProduct($ProductId,$ProductName,$CollId,$CatId,$SubCatId){
        $con = $GLOBALS['con'];
        $sql = "UPDATE product SET  product_Name='$ProductName',
                                    collection_collection_id='$CollId',
                                    category_category_id='$CatId',
                                    sub_category_sub_category_id='$SubCatId' 
                                    WHERE product_id='$ProductId'";
        $result = $con->query($sql) or die($con->error);
        return $result;                         
    }
    // remove product size
    function removeProductSize($ProductId){
        $con = $GLOBALS['con'];
        $sql = "DELETE FROM product_has_size WHERE product_product_id='$ProductId'";
        $result =$con->query($sql) or die ($con->error);
    }
    // update image 
    function updateImage($img, $ProductId){
        $con = $GLOBALS['con'];
        $sql = "UPDATE product_img SET product_img_name='$img' WHERE product_product_id='$ProductId'";
        $result = $con->query($sql) or die ($con->error);
        return $result;
    }
    // delete product
    function deleteProduct($ProductId){
        $con = $GLOBALS['con'];
        $sql = "DELETE FROM product WHERE product_id='$ProductId'";
        $result = $con->query($sql) or die ($con->error);
        return $result;
    }
    // update barcode
    function updatebarcode( $productId,$sizeId,$barcode){
        $con = $GLOBALS['con'];
        $sql = "UPDATE product_has_size SET barcode='$barcode' WHERE  product_product_id='$productId' AND size_size_id='$sizeId'";
        $result = $con->query($sql) or die ($con->error);
        return $result;
    }
}