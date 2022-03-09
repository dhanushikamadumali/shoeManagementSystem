<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class row_material{
    // get all unit
    function getUnit(){
        $con= $GLOBALS['con'];
        $sql = "SELECT * FROM unit";
        $result=$con->query($sql);
        return $result;
    }
    // insert row material to row material table
    function addRowMaterial($RowMaterial_Name,$Category_Id,$Collection_Id,$SubCategory_Id,$Unit_Id){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO r_material(r_material_name,r_m_category_r_m_category_id,r_m_collection_r_m_collection_id,r_m_subcategory_r_m_subcategory_id,unit_unit_id)
                 VALUES('$RowMaterial_Name','$Category_Id','$Collection_Id','$SubCategory_Id','$Unit_Id')";
        $con->query($sql);
        if($con->insert_id>0){
            return $con->insert_id;
        }
        else{
            return false;
        }
    }
    ///validated row material name
    function getValidateRowMaterialName($Row_Material_name){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM r_material WHERE r_material_name='$Row_Material_name'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
    }
    function getValidateEditRowMaterialName($RowMaterialName){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM r_material WHERE r_material_name='$RowMaterialName'";
        $result = $con->query($sql);
        if($result->num_rows>1){
            return false;
        } 
        else {
            return true; 
        }
    }
    // insert image to image table
    function addImage($Row_material_Name,$Row_material_Id){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO r_m_image(r_m_image_name,r_material_r_material_id) VALUES('$Row_material_Name','$Row_material_Id')";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // get all row material by category id
    function getAllRowMaterial(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM r_material r,r_m_category c,r_m_image ri WHERE r.r_material_id=ri.r_material_r_material_id AND r.r_m_category_r_m_category_id=c.r_m_category_id ORDER BY r_material_id ASC";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // get row material
    function getRowMterial($RowMaterialId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM r_material r,unit u WHERE r.unit_unit_id=u.unit_id AND r.r_material_id='$RowMaterialId'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // get product image
    function getImage($RowMaterialId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM r_m_image ri,r_material r WHERE ri.r_material_r_material_id=r.r_material_id AND ri.r_material_r_material_id='$RowMaterialId'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // update row material
    function updateRowMaterial($RowMaterialId,$RowMaterialName,$CollId,$CatId,$SubCatId, $Unit){
        $con = $GLOBALS['con'];
        $sql = "UPDATE r_material SET  r_material_name='$RowMaterialName',
                                   	r_m_collection_r_m_collection_id='$CollId',
                                   	r_m_category_r_m_category_id='$CatId',
                                   	r_m_subcategory_r_m_subcategory_id='$SubCatId' 
                                    WHERE r_material_id ='$RowMaterialId'";
        $result = $con->query($sql) or die($con->error);
        return $result;                         
    }
    // update image 
    function updateImage($img,$RowMaterialId){
        $con = $GLOBALS['con'];
        $sql = "UPDATE r_m_image SET r_m_image_name='$img' WHERE r_material_r_material_id='$RowMaterialId'";
        $result = $con->query($sql) or die ($con->error);
        return $result;
    }
    // validate contact number
    function getValidateRM($RowMaterialName){
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM r_material WHERE r_material_name='$RowMaterialName'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            return false;
        } 
        else {
            return true; 
        }
        
    }
}