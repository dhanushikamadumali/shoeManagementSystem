<?php
include '../commons/fpdf181/fpdf.php';
include '../model/Invoice_Model.php';
$invoiceObj = new invoice();

$invId = $_REQUEST['inv_id'];
$invId = base64_decode($invId);///supplier id decode
$invoiceResult = $invoiceObj->getallInvoice($invId);
$row1=$invoiceResult->fetch_assoc();
$saleResult = $invoiceObj->getorderitem($invId);

$pdf = new fpdf('p','mm',array(80,300));
$pdf->SetTitle("SHOE ENTERPRISES");
$pdf->AddPage();

$pdf->SetFont("Arial","B","15");
$pdf->Cell(55,6,"H.K.ENTERPRISES",0,0,"C");
$pdf->Cell(0,10,'',0,1);

$pdf->SetFont("Arial","","9"); 
$pdf->Cell(25,5,'Date',0,0);
$pdf->Cell(20,5,date($row1["invoice_date"]),0,1);
$pdf->Cell(25,5,'INVOICE #',0,0);
$pdf->Cell(20,5, $row1["invoice_number"],0,1);
$pdf->Cell(25,5,'Customer',0,0);
$pdf->Cell(20,5,$row1["customer_fname"],0,1);
$pdf->Cell(25,5,'Payment method',0,0);
$pdf->Cell(20,5,"Credit Card",0,1);

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
    $pdf->Cell(10,5,$row["quntity"],0,0);
    $pdf->Cell(15,5,$row["price"],0,0);
    $pdf->Cell(15,5,$row["sub_total"],0,1);
}
$pdf->Cell(0,5,'---------------------------------------------------------',0,1);   


$pdf->Cell(40,5,'Total',0,0);
$pdf->Cell(20,5,$row1["invoice_total"],0,1);
$pdf->Cell(40,5,'Pay Amount',0,0);
$pdf->Cell(20,5,$row1["invoice_payamount"],0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->Cell(0,5,'---------------------------------------------------------',0,1);

$pdf->Cell(0,5,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->Cell(0,7,'---------------------------------------------------------',0,1);

$pdf->Cell(0,5,'Thank You!!!',0,1,'C');
$pdf->Cell(0,7,'---------------------------------------------------------',0,1);

$pdf->Output();