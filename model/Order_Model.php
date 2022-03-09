<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class order{
    // get all order function
    function getAllOrder(){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM invoice i,order_table o WHERE i.invoice_id=o.invoice_invoice_id AND invoice_type='online'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // get all order product
    function getAllOrderProduct($invoice_id){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM order_product_table ot,order_table o,product p WHERE p.product_id=ot.product_id AND ot.order_table_order_table_id=o.order_table_id AND o.invoice_invoice_id='$invoice_id'";
        $result = $con->query($sql) or die($con->error);
        return $result;
    }
    // get invoice detail
    function getInvoiceDetail($invoice_id){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM invoice i,order_table ot WHERE i.invoice_id=ot.invoice_invoice_id AND i.invoice_id='$invoice_id'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }
    // update order status
    function updateStatus($InvoiceId,$statusId){
        $con = $GLOBALS["con"];
        $sql = "UPDATE order_table SET order_status='$statusId' WHERE invoice_invoice_id='$InvoiceId'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }


}