<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class orderReport{
    // get last sevenday order report
    function getLastSevenDayAllOrderReport(){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM invoice WHERE invoice_type='online' AND `invoice_date` BETWEEN DATE_SUB(CURDATE( ),INTERVAL 7 DAY ) AND CURDATE( )";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get last seven day all order place
    function getLastSevenDayAllOrderPlace(){
        $con =$GLOBALS['con'];
        $sql ="SELECT COUNT(invoice_id) AS allorder FROM invoice WHERE invoice_type='online' AND `invoice_date` BETWEEN DATE_SUB(CURDATE( ),INTERVAL 7 DAY ) AND CURDATE( )";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get custome day all order report
    function getCustomedateAllOrderReport($fromdate,$todate){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM invoice WHERE invoice_type='online' AND `invoice_date` BETWEEN '$fromdate' AND '$todate'";
        $result=$con->query($sql)or die($con->error);
        return $result;

    }
    // get custome day all order place
    function getCustomedateAllOrderPlace($fromdate,$todate){
        $con =$GLOBALS['con'];
        $sql ="SELECT COUNT(invoice_id) AS allorder FROM invoice  WHERE invoice_type='online' AND `invoice_date` BETWEEN '$fromdate' AND '$todate'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get last two month all order report
    function getLastTwoMAllOrderReport(){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM invoice WHERE  invoice_type='online' AND  MONTH(invoice_date)=MONTH(DATE_SUB(CURDATE(),INTERVAL 2 MONTH)) AND YEAR(invoice_date) = YEAR(DATE_SUB(CURDATE(),INTERVAL 2 MONTH))";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get last two month all order place
    function getLastTwoMAllOrderPlace(){
        $con =$GLOBALS['con'];
        $sql ="SELECT COUNT(invoice_id) AS allorder FROM invoice  WHERE invoice_type='online' AND MONTH(invoice_date)=MONTH(DATE_SUB(CURDATE(),INTERVAL 2 MONTH)) AND YEAR(invoice_date) = YEAR(DATE_SUB(CURDATE(),INTERVAL 2 MONTH)) ";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get current year all order report
    function getCurrentYearAllOrderReport(){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM invoice WHERE invoice_type='online' AND YEAR(invoice_date) = YEAR(CURDATE())";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get current year all order place
    function getCurrentYearAllOrderPlace(){
        $con =$GLOBALS['con'];
        $sql ="SELECT COUNT(invoice_id) AS allorder FROM invoice  WHERE invoice_type='online' AND YEAR(invoice_date) = YEAR(CURDATE())";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get today stock report
    function getTodayAllOrderReport(){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM invoice WHERE invoice_type='online' AND invoice_date=CURDATE( )";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get today available stock report
    function getTodayAllOrderPlace(){
        $con =$GLOBALS['con'];
        $sql ="SELECT COUNT(invoice_id) AS allorder FROM invoice  WHERE invoice_type='online' AND invoice_date=CURDATE( )";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
   

    
}


?>