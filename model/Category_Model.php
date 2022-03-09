<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class Category{///create category class
    ///add category
    function addCategory($CatName){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO category(category_name) VALUES ('$CatName')";
        $con->query($sql)or die($con->error);
        if($con->insert_id>0){
            return $con->insert_id;
        }
        else {
            return false;
        }
    }
    // get all category
    function getAllCategory(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM category";
        $result = $con->query($sql);
        return $result;
    }
    // get category by category id
    function getCategory($category_id){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM category WHERE category_id = '$category_id'";
        $result = $con->query($sql);
        return $result;
    }
    // sub category by category id
    function getCategoryById($CategoryId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM sub_category s,category c WHERE s.category_category_id = c.category_id AND category_category_id = '$CategoryId'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // update category
    function updateCategory($Category_id,$Category_name){
        $con = $GLOBALS['con'];
        $sql = "UPDATE category SET category_name='$Category_name' WHERE category_id='$Category_id'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }
    // get collection category
    function getCollectionCategory($Category_id){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM collection_has_category cc,collection c WHERE c.collection_id=cc.collection_collection_id AND category_category_id='$Category_id'";
        $result = $con->query($sql);
        return $result;
        
    }
    // remove collection category
    function removeCollectionCategory($Category_id){
        $con = $GLOBALS['con'];
        $sql = "DELETE FROM collection_has_category WHERE category_category_id='$Category_id'";
        $result = $con->query($sql)or die($con->error);
    }
    // get category by collection id
    function getcategoryByCollectionId($Coll_Id){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM collection_has_category cc,category c WHERE cc.category_category_id=c.category_id AND collection_collection_id='$Coll_Id'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }
     ///validated category name
    function getValidatecategoryName($Catname_name){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM category WHERE category_name='$Catname_name'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
    }
    ///validated category name
    function getValidateEditcategoryName($Catname_name){
    $con = $GLOBALS['con'];
    $sql = "SELECT 1 FROM category WHERE category_name='$Catname_name'";
    $result = $con->query($sql);
    if($result->num_rows>1){
        return false;
    } 
    else {
        return true; 
    }
    }
    

}

