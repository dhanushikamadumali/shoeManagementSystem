<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class Category{///create category class
    ///add material category
    function addmCategory($CatName){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO r_m_category(r_m_category_name) VALUES ('$CatName')";
        $con->query($sql)or die($con->error);
        if($con->insert_id>0){
            return $con->insert_id;
        }
        else {
            return false;
        }
    }
    // get all material category
    function getmAllCategory(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM r_m_category";
        $result = $con->query($sql);
        return $result;
    }
    // get material category by category id
    function getmCategory($category_id){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM r_m_category WHERE r_m_category_id = '$category_id'";
        $result = $con->query($sql);
        return $result;
    }
    // get material sub category by category id
    function getCategoryById($CategoryId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM sub_category s,category c WHERE s.category_category_id = c.category_id AND category_category_id = '$CategoryId'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // update material category
    function updatemCategory($Category_id,$Category_name){
        $con = $GLOBALS['con'];
        $sql = "UPDATE r_m_category SET r_m_category_name='$Category_name' WHERE r_m_category_id='$Category_id'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }
    // get material collection category
    function getmCollectionCategory($Category_id){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM r_m_collection_has_r_m_category cc,r_m_collection c WHERE c.r_m_collection_id=cc.r_m_collection_r_m_collection_id AND r_m_category_r_m_category_id='$Category_id'";
        $result = $con->query($sql);
        return $result;
        
    }
    // remove material collection category
    function removemCollectionCategory($Category_id){
        $con = $GLOBALS['con'];
        $sql = "DELETE FROM r_m_collection_has_r_m_category WHERE r_m_category_r_m_category_id='$Category_id'";
        $result = $con->query($sql)or die($con->error);
    }
    // get material category by collection id
    function getMcategoryByCollectionId($Coll_Id){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM r_m_collection_has_r_m_category cc,r_m_category c WHERE cc.r_m_category_r_m_category_id=c.r_m_category_id AND r_m_collection_r_m_collection_id='$Coll_Id'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }
     ///validated category name
    function getValidatemcategoryName($Category_name){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM r_m_category WHERE r_m_category_name='$Category_name'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
    }
     ///validated edit category name
    function getValidateEditmcategoryName($Category_name){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM r_m_category WHERE r_m_category_name='$Category_name'";
        $result = $con->query($sql);
        if($result->num_rows>1){
            return false;
        } 
        else {
            return true; 
        }
    }
    

}

