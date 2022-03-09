<?php
include_once '../commons/DbConnection.php';
$DbConnObj = new DbConnection();

class invoice{
    // add invoice function
    function addinvoice($customerType,$alltotal,$pamount,$ramount,$discount,$balance,$customerId,$customerName){
        $con = $GLOBALS["con"];
        date_default_timezone_set('Asia/Colombo');
        $toDay = date("Y-m-d", time());
        $sql ="SELECT count(invoice_number) FROM invoice  WHERE invoice_date='$toDay'";
        $result = $con->query($sql)or die($con->error);
        $row=$result->fetch_array();
        $count = $row[0];
        $count++;
        $newId = "INV" . str_replace("-", "", $toDay) ."_". str_pad($count, 4, "0", STR_PAD_LEFT);
        $sql2 = "INSERT INTO invoice(invoice_type,invoice_number,invoice_date,invoice_total,invoice_payamount,recieved_amount,discount,balance,customer_customer_id,customer_fname) 
        VALUE('$customerType','$newId','$toDay','$alltotal', '$pamount','$ramount','$discount','$balance',1,'$customerName')";
        $con->query($sql2)or die($con->error);
        $invoiceId = $con->insert_id;
        return $invoiceId;
    }
    // get all invoice detail function
    function getallinvoice($invoiceId){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM invoice WHERE invoice_id = '$invoiceId'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }
    // get sale item function
    function getsaleitem($invoiceId){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM sale s,product p WHERE s.product_id=p.product_id AND invoice_invoice_id = '$invoiceId'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }
    // add order item function
    function addoderitem($productQty,$sizeId,$price,$subtotal,$invoiceId,$productId){
        $con = $GLOBALS["con"];
        $sql = "INSERT INTO sale(product_qty,size,product_price,product_subtotal,invoice_invoice_id,product_id) VALUE('$productQty','$sizeId','$price','$subtotal','$invoiceId','$productId')"; 
        $result = $con->query($sql)or die($con->error);
        return $result;   
            
    }
    // update stock quantity function
    function updatequntity($stockId,$qty){
        $con =$GLOBALS["con"];
        $sql = "UPDATE product_stock SET a_quantity=a_quantity-'$qty' WHERE productstock_id='$stockId'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }
    // update stock quntity function
    function updatequntity1($stockId,$qty){
        $con =$GLOBALS["con"];
        $sql = "UPDATE product_stock SET a_quantity=a_quantity-'$qty',status='0' WHERE productstock_id='$stockId'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }
    // get product in stock function
    function getorder($size,$productId){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM product_stock WHERE product_product_id='$productId' AND size_id='$size' AND status='1' ORDER BY productstock_id ASC";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }
    // get product relavent product id and size
    function getproduct($Product_Id,$addSize){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM product_stock WHERE product_product_id='$Product_Id' AND 	size_id='$addSize'";
        $result = $con->query($sql)or die($con->error);
        $count = $result->num_rows;
        return $count;
    }
    // get update product quantity
    function updateproduct($CusId,$productId){
        $con = $GLOBALS["con"];
        $sql = "UPDATE  product_stock SET quntity=quntity+1  WHERE customer_id='$CusId' AND product_id='$productId'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    
    }
    // get sale item function
    function getorderitem($invoiceId){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM order_product_table op,product p,order_table ot WHERE op.order_table_order_table_id=ot.order_table_id AND op.product_id=p.product_id AND ot.invoice_invoice_id = '$invoiceId'";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }

}
    
