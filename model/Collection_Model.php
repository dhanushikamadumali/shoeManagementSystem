<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class collection{
    // add collection
    function addCollection($CollName,$Cstatus){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO collection(collection_name,collection_status) VALUES ('$CollName','$Cstatus')";
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
        $sql = "SELECT * FROM collection";
        $result = $con->query($sql);
        return $result; 
        
    }
    // add collection by category  id
    function addcollectioncategory($Category_id,$c){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO collection_has_category(collection_collection_id, category_category_id)
                VALUES ('$c','$Category_id')";
        $result = $con->query($sql);        
        return $result; 
    }
      // add collection by sub category  id
      function addcollectionsubcategory($SubCategory_id,$c){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO collection_has_sub_category(collection_collection_id,sub_category_sub_category_id)
                VALUES ('$c','$SubCategory_id')";
       $result = $con->query($sql) or die($con->error);
      return $result;
       
    }

}

