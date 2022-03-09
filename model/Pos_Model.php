<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class pos{
 
   function getAllProduct(){
      $con = $GLOBALS['con'];
      $sql = "SELECT * FROM product p, product_stock ps,size s WHERE p.product_id=ps.product_product_id AND ps.size_id=s.size_id GROUP BY p.product_id,ps.size_id";
      $result = $con->query($sql);
      return $result;
   }
   function getAllImg($productId,$sizeId){
      $con = $GLOBALS['con'];
      $sql = "SELECT p.product_id,p.product_name,pi.product_product_id,ps.product_product_id,s.size_id,s.size,ps.size_id,MAX(ps.price) AS Mprice,c.discount,c.collection_id,p.collection_collection_id FROM product p, product_img pi, product_stock ps,size s,collection c WHERE
       ps.product_product_id=p.product_id AND p.product_id=pi.product_product_id AND ps.size_id=s.size_id AND c.collection_id=p.collection_collection_id AND ps.size_id='$sizeId'  AND pi.product_product_id='$productId'";
      $result = $con->query($sql);
      return $result;
   }
   function getAllImg1($productId){
      $con = $GLOBALS['con'];
      $sql = "SELECT * FROM product p, product_img pi, product_stock ps WHERE ps.product_product_id=p.product_id AND p.product_id=pi.product_product_id AND pi.product_product_id='$productId'";
      $result = $con->query($sql);
      return $result;
   } 
   function getProduct($catId,$subCatId){
      $con = $GLOBALS['con'];
      if($catId==""){
         $sql = "SELECT * FROM product p, product_stock ps,size s WHERE p.product_id=ps.product_product_id AND ps.size_id=s.size_id GROUP BY p.product_id,ps.size_id";
         $result = $con->query($sql);
         return $result;
      }elseif ($subCatId==""){
         $sql = "SELECT * FROM product p,product_stock ps,size s WHERE p.product_id=ps.product_product_id AND ps.size_id=s.size_id
          AND p.category_category_id='$catId' GROUP BY p.product_id,ps.size_id";
         $result = $con->query($sql);
         return $result; 
      }else{
         $sql = "SELECT * FROM product p,product_stock ps,size s WHERE p.product_id=ps.product_product_id AND ps.size_id=s.size_id
         AND p.category_category_id='$catId' AND p.sub_category_sub_category_id='$subCatId'GROUP BY p.product_id,ps.size_id";
         $result = $con->query($sql);
         return $result; 
      }        
   }
     



  
}

   