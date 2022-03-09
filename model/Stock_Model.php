<?php
include_once '../commons/DbConnection.php';///include database 
$DbConnObj = new DbConnection();//.create dbconn object

class stock{
    // add stock function
    function addStock($productname,$Product_Id,$SizeId,$price,$StockQty,$StockQty1,$Reorder){
        $con = $GLOBALS['con'];
        date_default_timezone_set('Asia/Colombo');
        $toDay = date("Y-m-d", time());
        $sql = "INSERT INTO product_stock(product_product_id,size_id,price,stockdate,a_quantity,current_quntity,reorder) 
                VALUES('$Product_Id','$SizeId','$price','$toDay','$StockQty','$StockQty1','$Reorder')";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get all stock function
    function getAllProductStock(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM product p,product_stock ps,size s WHERE p.product_id= ps.product_product_id AND ps.status='1' AND ps.size_id=s.size_id";
        $result=$con->query($sql)or die($con->error);
        return $result;        
    }
    // get all image function
    function getAllimage($productId){
        $con = $GLOBALS['con'];
        $sql ="SELECT * FROM product_stock ps,product_img pi,product p WHERE p.product_id=ps.product_product_id AND  pi.product_product_id=ps.product_product_id  AND pi.product_product_id='$productId'";
        $result=$con->query($sql)or die($con->error);
        return $result;  
    }
    // get stock deatil function
    function getStockDetail($StockId){
        $con = $GLOBALS['con'];
        $sql ="SELECT * FROM product_stock ps,product p,size s,product_img pi WHERE p.product_id=ps.product_product_id AND ps.size_id=s.size_id AND pi.product_product_id=ps.product_product_id  AND ps.productstock_id='$StockId'";
        $result=$con->query($sql)or die($con->error);
        return $result;  
    }
    // update stock price function
    function updatestockprice($Stock_Id,$NewPrice){
        $con = $GLOBALS['con'];
        $sql = "UPDATE product_stock SET price='$NewPrice' WHERE productstock_id='$Stock_Id'";
        $result=$con->query($sql)or die($con->error);
        return $result;  
    }
    // get product size
    function getproductsize($ProductId){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM product p,product_stock ps,size s WHERE p.product_id=ps.product_product_id AND ps.status='1' AND ps.size_id=s.size_id AND ps.product_product_id='$ProductId' GROUP BY ps.size_id";
        $result=$con->query($sql)or die($con->error);
        return $result;
    } 
    //  get quntity 
    function getquntity($productId,$sizeId){
        $con = $GLOBALS['con'];
        $sql = "SELECT ps.product_product_id,ps.size_id,ps.status, SUM(ps.a_quantity)as total FROM product_stock ps WHERE ps.product_product_id='$productId' AND ps.size_id='$sizeId' AND ps.status=1"; 
        $result=$con->query($sql)or die($con->error);
        return $result;

    } 
  
}

   