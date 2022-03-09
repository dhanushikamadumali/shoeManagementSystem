<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class subCategory{
    //add sub category
   function addSubCategory($SubCatName, $CatId){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO sub_category(sub_category_name,category_category_id)VALUES('$SubCatName','$CatId')";
        $con->query($sql) or die($con->error);
        if ($con->insert_id>0)
            {
            return $con->insert_id;
        }else{
            return false;
        }
      
    }
    // get all sub category
    function getAllsubCategory(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM sub_category s, category c,collection_has_sub_category cs,collection cc WHERE s.sub_category_id=cs.sub_category_sub_category_id AND 
        cs.collection_collection_id=cc.collection_id AND s.category_category_id = c.category_id ORDER BY s.sub_category_id ASC"; 
        $result = $con->query($sql);
        return $result;
               
    }
    //get sub category by sub category id
    function getsubCategory($SubCategoryId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM sub_category WHERE sub_category_id = '$SubCategoryId'";
        $result = $con->query($sql);
        return $result;
    }
    //get all sub category by category id
    function getAllSubCategoryByCatId($Cat_Id){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM sub_category s,collection_has_sub_category cs WHERE cs.sub_category_sub_category_id=s.sub_category_id AND s.category_category_id = '$Cat_Id'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }
    // update sub category
    function updateSubCategory($SubCategoryId,$SubCategoryName,$CategoryName){
         $con = $GLOBALS['con'];
         $sql = "UPDATE sub_category SET sub_category_name = '$SubCategoryName',category_category_id = '$CategoryName' WHERE sub_category_id ='$SubCategoryId'";
         $result = $con->query($sql)or die($con->error);
        return $result;
    }
     // get collection category
     function getCollectionSubCategory($SubCategory_id){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM collection_has_sub_category cc,collection c WHERE c.collection_id=cc.collection_collection_id AND sub_category_sub_category_id='$SubCategory_id'";
        $result = $con->query($sql);
        return $result;
        
    }
    // remove collection category
    function removeCollectionSubCategory($SubCategory_id){
        $con = $GLOBALS['con'];
        $sql = "DELETE FROM collection_has_sub_category WHERE sub_category_sub_category_id='$SubCategory_id'";
        $result = $con->query($sql)or die($con->error);
    }
    // add collection by category  id
    function addcollectionsubcategory($SubCategory_id,$c){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO collection_has_sub_category(collection_collection_id, sub_category_sub_category_id)
                VALUES ('$c','$SubCategory_id')";
        $result = $con->query($sql);        
        return $result; 
    }
     ///validated sub category name
     function getValidateSubcategoryName($SubCatname_name){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM sub_category WHERE sub_category_name='$SubCatname_name'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
    }
    ///validated sub category name
    function getValidateEditSubcategoryName($SubCatname_name){
    $con = $GLOBALS['con'];
    $sql = "SELECT 1 FROM sub_category WHERE sub_category_name='$SubCatname_name'";
    $result = $con->query($sql);
    if($result->num_rows>1){
        return false;
    } 
    else {
        return true; 
    }
    }


    
}

