<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class deliveryReport{
    // get last seven day report
    function getWeeklyReport(){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM delivery d,invoice i WHERE d.invoice_id=i.invoice_id AND d.delivery_status='1' AND `delivery_date` BETWEEN DATE_SUB(CURDATE( ),INTERVAL 7 DAY ) AND CURDATE( )";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    //get last seven day income
    function getWeeklyCustomedateSuccDelivery(){
        $con =$GLOBALS['con'];
        $sql ="SELECT COUNT(delivery_id) AS successdelivery FROM delivery  WHERE delivery_status='1' AND `delivery_date` BETWEEN DATE_SUB(CURDATE( ),INTERVAL 7 DAY ) AND CURDATE( )";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get custome day report
    function getCustomedateReport($fromdate,$todate){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM delivery d,invoice i WHERE d.invoice_id=i.invoice_id AND d.delivery_status='1' AND `delivery_date` BETWEEN '$fromdate' AND '$todate'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get custome day income
    function getCustomedateSuccDelivery($fromdate,$todate){
        $con =$GLOBALS['con'];
        $sql ="SELECT COUNT(delivery_id) AS successdelivery FROM delivery  WHERE  delivery_status='1' AND `delivery_date` BETWEEN '$fromdate' AND '$todate'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get last two month report
    function getLastTwoMReport(){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM delivery d,invoice i WHERE d.invoice_id=i.invoice_id AND d.delivery_status='1' AND MONTH(delivery_date)=MONTH(DATE_SUB(CURDATE(),INTERVAL 2 MONTH)) AND YEAR(delivery_date) = YEAR(DATE_SUB(CURDATE(),INTERVAL 2 MONTH))";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get last two month income
    function getLastTwoMSuccDelivery(){
        $con =$GLOBALS['con'];
        $sql ="SELECT COUNT(delivery_id) AS successdelivery FROM delivery  WHERE delivery_status='1' AND MONTH(delivery_date)=MONTH(DATE_SUB(CURDATE(),INTERVAL 2 MONTH))
                 AND YEAR(delivery_date) = YEAR(DATE_SUB(CURDATE(),INTERVAL 2 MONTH)) ";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get current year report
    function getCurrentYearReport(){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM delivery d,invoice i WHERE d.invoice_id=i.invoice_id AND d.delivery_status='1' AND  YEAR(delivery_date) = YEAR(CURDATE())";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get current year income
    function getCurrentYearSuccDelivery(){
        $con =$GLOBALS['con'];
        $sql ="SELECT COUNT(delivery_id) AS successdelivery FROM delivery  WHERE delivery_status='1' AND YEAR(delivery_date) = YEAR(CURDATE())";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
     // get today income report
     function getTodayReport(){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM delivery d,invoice i WHERE d.invoice_id=i.invoice_id AND d.delivery_status='1' AND delivery_date=CURDATE( )";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get today available income report
    function getTodaySuccDelivery(){
        $con =$GLOBALS['con'];
        $sql ="SELECT COUNT(delivery_id) AS successdelivery FROM delivery  WHERE delivery_status='1' AND delivery_date=CURDATE( )";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
     
}


?>