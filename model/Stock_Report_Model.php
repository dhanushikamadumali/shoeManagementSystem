<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class stockReport{
    // get stock report
    function getStockReport(){
        $con =$GLOBALS['con'];  
        $sql ="SELECT * FROM product p,product_stock ps,size s WHERE p.product_id=ps.product_product_id AND ps.status='1' AND ps.size_id=s.size_id ORDER BY ps.productstock_id";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get available stock
    function getAvailableStock(){
        $con =$GLOBALS['con'];
        $sql ="SELECT SUM(a_quantity) AS availableq FROM product_stock WHERE status='1'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
     // get stock report
     function getoutofStockReport(){
        $con =$GLOBALS['con'];  
        $sql ="SELECT * FROM product p,product_stock ps,size s WHERE p.product_id=ps.product_product_id AND ps.status='0' AND ps.size_id=s.size_id ORDER BY ps.productstock_id";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get available stock
    function getoutofStock(){
        $con =$GLOBALS['con'];
        $sql ="SELECT SUM(a_quantity) AS outof FROM product_stock WHERE status='0'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
      // get stock report
      function getReorderStockReport(){
        $con =$GLOBALS['con'];  
        $sql ="SELECT * FROM product p,product_stock ps,size s WHERE p.product_id=ps.product_product_id AND ps.status='1' AND ps.size_id=s.size_id ORDER BY ps.productstock_id";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    
}


?>