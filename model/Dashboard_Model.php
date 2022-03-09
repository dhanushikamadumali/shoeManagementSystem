<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class dashboard{
    // get all order count
    function getCountOrderPlace(){
        $con =$GLOBALS['con'];
        $sql ="SELECT  COUNT(*) AS orderCount FROM order_table";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get all stock count
    function getCountAvailableStock(){
        $con =$GLOBALS['con'];
        $sql ="SELECT  COUNT(*) AS stockCount FROM product_stock WHERE status='1'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
     // get all revanue
    function getAllRevanue(){
        $con =$GLOBALS['con'];
        $sql ="SELECT SUM(invoice_payamount) AS AllRevanue FROM invoice  WHERE MONTH(invoice_date) = MONTH(CURDATE())";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get all delivered
    function getAllDelivered(){
        $con =$GLOBALS['con'];
        $sql ="SELECT Count(*) AS deliveredCount FROM delivery WHERE delivery_status='1'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get last seven days
    function getWeeklydate(){
        $con =$GLOBALS['con'];
        $sql ="SELECT DAYNAME(invoice_date) AS weeklyday,invoice_date FROM invoice  WHERE `invoice_date` BETWEEN DATE_SUB(CURDATE( ),INTERVAL 7 DAY ) AND DATE_SUB(CURDATE( ),INTERVAL 1 DAY) GROUP BY invoice_date";
        $getweeklydate=$con->query($sql)or die($con->error);
        return  $getweeklydate;
    }
     //get last seven day online revanue
    function getWeeklyonlineRevanue($invoiceDate){
        $con =$GLOBALS['con'];
        $sql ="SELECT SUM(invoice_payamount) AS OnlineRevanue FROM invoice  WHERE invoice_type='online' AND invoice_date='$invoiceDate'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    //get last seven day genaral revanue
    function getWeeklygenaralRevanue($invoiceDate){
        $con =$GLOBALS['con'];
        $sql ="SELECT SUM(invoice_payamount) AS genaralRevanue FROM invoice  WHERE invoice_type='genaral' AND invoice_date='$invoiceDate'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get last seven day all order place
    function getWeeklyOrder($invoiceDate){
        $con =$GLOBALS['con'];
        $sql ="SELECT COUNT(*) AS allorder FROM invoice WHERE invoice_type='online' AND invoice_date='$invoiceDate'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get last seven day shipped
    function getWeeklyShipped($invoiceDate){
        $con =$GLOBALS['con'];
        $sql ="SELECT  COUNT(*) AS shipped FROM order_table  WHERE order_status='shipped' AND order_date='$invoiceDate'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get last seven day delivery
    function getWeeklyDilivery($invoiceDate){
        $con =$GLOBALS['con'];
        $sql ="SELECT  COUNT(*) AS successdelivery FROM order_table  WHERE order_status='delivered' AND order_date='$invoiceDate'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get last seven days
    function getCurrentYearMonth(){
        $con =$GLOBALS['con'];
        $sql ="SELECT MONTHNAME(invoice_date) AS invoicedate,invoice_date FROM invoice  WHERE YEAR(invoice_date) = YEAR(CURDATE()) GROUP BY invoicedate ORDER BY invoice_date ";
        $getweeklydate=$con->query($sql)or die($con->error);
        return  $getweeklydate;
    }
    //get last seven day online revanue
    function getyearonlineRevanue($invoiceDate){
        $con =$GLOBALS['con'];
        $sql ="SELECT SUM(invoice_payamount) AS OnlineRevanue FROM invoice  WHERE invoice_type='online' AND invoice_date='$invoiceDate'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    //get last seven day genaral revanue
    function getyeargenaralRevanue($invoiceDate){
        $con =$GLOBALS['con'];
        $sql ="SELECT SUM(invoice_payamount) AS genaralRevanue FROM invoice  WHERE invoice_type='genaral' AND invoice_date='$invoiceDate'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get product category
    function getCattype(){
        $con =$GLOBALS['con'];
        $sql ="SELECT COUNT(*) AS countp,c.category_id,category_name FROM product p,category c WHERE p.category_category_id=c.category_id GROUP BY c.category_id";
        $getweeklydate=$con->query($sql)or die($con->error);
        return $getweeklydate;
    }
     
}


?>