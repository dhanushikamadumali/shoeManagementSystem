<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class incomeReport{
    // get last seven day report
    function getWeeklyReport(){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM invoice WHERE `invoice_date` BETWEEN DATE_SUB(CURDATE( ),INTERVAL 7 DAY ) AND CURDATE( )";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    //get last seven day income
    function getWeeklyEarnV(){
        $con =$GLOBALS['con'];
        $sql ="SELECT SUM(invoice_payamount) AS earnvalue FROM invoice  WHERE `invoice_date` BETWEEN DATE_SUB(CURDATE( ),INTERVAL 7 DAY ) AND CURDATE( )";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get custome day report
    function getWeeklyCustomedateReport($fromdate,$todate){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM invoice WHERE `invoice_date` BETWEEN '$fromdate' AND '$todate'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get custome day income
    function getWeeklyCustomedateEarnV($fromdate,$todate){
        $con =$GLOBALS['con'];
        $sql ="SELECT SUM(invoice_payamount) AS earnvalue FROM invoice  WHERE `invoice_date` BETWEEN '$fromdate' AND '$todate'";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get last two month report
    function getLastTwoMReport(){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM invoice WHERE MONTH(invoice_date)=MONTH(DATE_SUB(CURDATE(),INTERVAL 2 MONTH)) AND YEAR(invoice_date) = YEAR(DATE_SUB(CURDATE(),INTERVAL 2 MONTH))";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get last two month income
    function getLastTwoMEarnV(){
        $con =$GLOBALS['con'];
        $sql ="SELECT SUM(invoice_payamount) AS earnvalue FROM invoice  WHERE MONTH(invoice_date)=MONTH(DATE_SUB(CURDATE(),INTERVAL 2 MONTH)) AND YEAR(invoice_date) = YEAR(DATE_SUB(CURDATE(),INTERVAL 2 MONTH)) ";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get current year report
    function getCurrentYearReport(){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM invoice WHERE YEAR(invoice_date) = YEAR(CURDATE())";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get current year income
    function getCurrentYearEarnV(){
        $con =$GLOBALS['con'];
        $sql ="SELECT SUM(invoice_payamount) AS earnvalue FROM invoice WHERE YEAR(invoice_date) = YEAR(CURDATE())";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
     // get today income report
     function getTodayIncomeReport(){
        $con =$GLOBALS['con'];
        $sql ="SELECT * FROM invoice WHERE invoice_date=CURDATE( )";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
    // get today available income report
    function getTodayIncome(){
        $con =$GLOBALS['con'];
        $sql ="SELECT SUM(invoice_payamount) AS earnvalue FROM invoice  WHERE  invoice_date=CURDATE( )";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
     //get last seven day income
    function getWeeklyEarn(){
        $con =$GLOBALS['con'];
        $sql ="SELECT MONTH(invoice_date) AS invoicedate, SUM(invoice_payamount) AS earnvalue FROM invoice  WHERE `invoice_date` BETWEEN DATE_SUB(CURDATE( ),INTERVAL 7 DAY ) AND CURDATE( ) GROUP BY invoice_date";
        $result=$con->query($sql)or die($con->error);
        return $result;
    }
   
}


?>