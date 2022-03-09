<?php
include_once '../commons/DbConnection.php';
$DbConnObj= new DbConnection();

class module{
    // get all module
    function getAllModule(){
        $con = $GLOBALS['con'];
        $sql ="SELECT  * FROM module";
        $result = $con ->query($sql);
        return $result;
    }

}

