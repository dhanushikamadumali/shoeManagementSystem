<?php
include '../commons/fpdf181/fpdf.php';
include '../model/Invoice_Model.php';
$invoiceObj = new invoice();

$invoiceId = $_REQUEST['invoiceId'];
$invoiceResult = $invoiceObj->getallInvoice($invoiceId);
$row1=$invoiceResult->fetch_assoc();
$saleResult = $invoiceObj->getsaleitem($invoiceId);

$pdf = new fpdf('p','mm',array(80,300));
$pdf->SetTitle("SHOE ENTERPRISES");
$pdf->AddPage();

$pdf->SetFont("Arial","B","15");
$pdf->Cell(55,6,"H.K.ENTERPRISES",0,0,"C");
$pdf->Cell(0,10,'',0,1);

$pdf->SetFont("Arial","","9"); 
$pdf->Cell(20,5,'Date',0,0);
$pdf->Cell(20,5,date($row1["invoice_date"]),0,1);
$pdf->Cell(20,5,'INVOICE #',0,0);
$pdf->Cell(20,5, $row1["invoice_number"],0,1);
$pdf->Cell(20,5,'Cashier',0,0);
$pdf->Cell(20,5,'      ',0,1);
$pdf->Cell(20,5,'Customer',0,0);
$pdf->Cell(20,5,$row1["customer_fname"],0,1);

$pdf->Cell(0,5,'---------------------------------------------------------',0,1);
$pdf->Cell(20,5,'Item',0,0);
$pdf->Cell(10,5,'Qty',0,0);
$pdf->Cell(15,5,'Price',0,0);
$pdf->Cell(15,5,'Amount',0,1);
$pdf->Cell(0,5,'---------------------------------------------------------',0,1);
$counter=0;
while($row= $saleResult->fetch_assoc()){
    $counter++;
    $pdf->Cell(0,5,$row["product_name"],0,1);
    $pdf->Cell(20,5,'',0,0);
    $pdf->Cell(10,5,$row["product_qty"],0,0);
    $pdf->Cell(15,5,$row["product_price"],0,0);
    $pdf->Cell(15,5,$row["product_subtotal"],0,1);
}
$pdf->Cell(0,5,'---------------------------------------------------------',0,1);   


$pdf->Cell(40,5,'Total',0,0);
$pdf->Cell(20,5,$row1["invoice_total"],0,1);
$pdf->Cell(40,5,'Disount',0,0);
$pdf->Cell(20,5,$row1["discount"],0,1);
$pdf->Cell(40,5,'Pay Amount',0,0);
$pdf->Cell(20,5,$row1["invoice_payamount"],0,1);
$pdf->Cell(40,6,'Payment :',0,0);
$pdf->Cell(0,5,'',0,1);
$pdf->Cell(0,5,'---------------------------------------------------------',0,1);

$pdf->Cell(40,5,'Cash',0,0);
$pdf->Cell(20,5,$row1["recieved_amount"],0,1);
$pdf->Cell(40,5,'Balance',0,0);
$pdf->Cell(20,5,$row1["balance"],0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->Cell(0,7,'---------------------------------------------------------',0,1);

$pdf->Cell(0,5,"EXCHANGE ARE POSSIBLE WITH IT'S ORGINAL",0,1,'C');
$pdf->Cell(0,5, "CONDITION & RECEIPT WITHIN 05 DAYS ",0,1,'C');
$pdf->Cell(0,7,'---------------------------------------------------------',0,1);
$pdf->Cell(0,5,'Thank You!!! Come Again',0,1,'C');
$pdf->Cell(0,7,'---------------------------------------------------------',0,1);

$pdf->Output();