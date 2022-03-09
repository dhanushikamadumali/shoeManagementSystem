<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class collection{
    // add collection
    function addCollection($CollName,$Cstatus){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO r_m_collection(r_m_collection_name,r_m_collection_status) VALUES ('$CollName','$Cstatus')";
        $con->query($sql);
        if ($con->insert_id>0){
            return $con->insert_id;
        }
        else{
            return false;
        }
    }
    // get all collection
    function getAllCollection(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM r_m_collection";
        $result = $con->query($sql);
        return $result; 
        
    }
    // add collection by category  id
    function addmcollectioncategory($Category_id,$c){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO r_m_collection_has_r_m_category(r_m_collection_r_m_collection_id, r_m_category_r_m_category_id)
                VALUES ('$c','$Category_id')";
        $result = $con->query($sql);        
        return $result; 
    }
      // add collection by category  id
    function addmcollectionsubcategory($SubCategory_id,$c){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO r_m_collection_has_r_m_subcategory(r_m_collection_r_m_collection_id, r_m_subcategory_r_m_subcategory_id)
                VALUES ('$c','$SubCategory_id')";
        $result = $con->query($sql);        
        return $result; 
    }

}

