<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class subCategory{
    //add material sub category
   function addMSubCategory($SubCatName, $CatId){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO r_m_subcategory(r_m_subcategory_name,r_m_category_r_m_category_id)VALUES('$SubCatName','$CatId')";
        $con->query($sql) or die($con->error);
        if ($con->insert_id>0)
            {
            return $con->insert_id;
        }else{
            return false;
        }
      
    }
    // get all material sub category
    function getAllMsubCategory(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM r_m_subcategory s, r_m_category c WHERE s.r_m_category_r_m_category_id = c.r_m_category_id ORDER BY s.r_m_subcategory_id ASC"; 
        $result = $con->query($sql);
        return $result;
               
    }
    //get matrial sub category by sub category id
    function getmsubCategory($SubCategoryId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM r_m_subcategory WHERE r_m_subcategory_id = '$SubCategoryId'";
        $result = $con->query($sql);
        return $result;
    }
    //get all m sub category by category id
    function getAllMSubCategoryByCatId($Cat_Id){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM r_m_subcategory WHERE r_m_category_r_m_category_id = '$Cat_Id'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }
    // update sub category
    function updateMSubCategory($SubCategoryId,$SubCategoryName,$CategoryName){
         $con = $GLOBALS['con'];
         $sql = "UPDATE r_m_subcategory SET r_m_subcategory_name = '$SubCategoryName',r_m_category_r_m_category_id = '$CategoryName' WHERE r_m_subcategory_id ='$SubCategoryId'";
         $result = $con->query($sql)or die($con->error);
        return $result;
    }
      // get material collection category
      function getmCollectionSubCategory($SubCategory_id){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM r_m_collection_has_r_m_subcategory cc,r_m_collection c WHERE c.r_m_collection_id=cc.r_m_collection_r_m_collection_id AND r_m_subcategory_r_m_subcategory_id='$SubCategory_id'";
        $result = $con->query($sql);
        return $result;
        
    }
      ///validated category name
      function getValidatemsubcategoryName($SubCategory_name){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM r_m_subcategory WHERE r_m_subcategory_name='$SubCategory_name'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
    }
     ///validated edit category name
    function getValidateEditmsubcategoryName($SubCategory_name){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM r_m_subcategory WHERE r_m_subcategory_name='$SubCategory_name'";
        $result = $con->query($sql);
        if($result->num_rows>1){
            return false;
        } 
        else {
            return true; 
        }
    }
    // remove material collection category
    function removemCollectionSubCategory($SubCategory_id){
        $con = $GLOBALS['con'];
        $sql = "DELETE FROM r_m_collection_has_r_m_subcategory WHERE r_m_subcategory_r_m_subcategory_id='$SubCategory_id'";
        $result = $con->query($sql)or die($con->error);
    }

}

