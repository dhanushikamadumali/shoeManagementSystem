<?php
include '../commons/fpdf181/fpdf.php';

class PDF extends FPDF{//create class
    function Header()///header function
    {   $this->SetY(20);
        $this->SetFont('Arial','B',20);
        $this->Cell(190,6,"H.K.ENTERPRISES",0,0,"R");
        $this->SetFont("Arial","","10");
        $this->Ln();
        $this->Cell(190,6,"NO 41,SRI HEMANANDA MAWATHA,BATAGANWILA,GALLE.",0,0,"R");
        $this->Ln();
        $this->Cell(190,6,"TEL: 0777911138/0777723052",0,0,"R");
        $this->Ln();
        $this->Cell(190,6,"Reg.no : G/5827",0,0,"R");
        $this->Ln();
        $date = date("Y-m-d");
        $this->Cell(190, 6, 'Date : '.$date, "", 1, "R");
    }
    function Footer()///footer function
    {
        $this->SetY(-20);
        $this->Terms_Singature();
        $this->SetY(-15);
        $this->SetFont('Arial','',10);
        $this->Cell(0,10,'Page'. $this->PageNo(),"","",'C');
    }
    function TableHeading()///table heading function
    {
        $this->Cell(0,10,'',0,1);
        $this->Cell(0,10,'',0,1);
        $this->SetFont("times","B","20"); 
        $this->Cell(190,0,'TODAY ORDER REPORT',0,0,'C');
        $this->Ln();
        $this->Cell(190, 0, "________________________", 0, 1, "C");
    }
    function TableBody(){///table body function
        include '../model/Order_Report_Model.php';///include order report model
        $OrderReportObj = new orderReport();///create order report object
        $todayResult1=$OrderReportObj->getTodayAllOrderReport();///get result order report model
        $todayResult2=$OrderReportObj->getTodayAllOrderPlace();///get result order report model
        $row1 = $todayResult2->fetch_assoc();///make a result as an array value
        $this->Cell(0,10,'',0,1);
        $this->SetFont("Arial","B","10"); 
        $this->Cell(32,10,'TOTAL ORDER PLACE :',0,"",'L');
        $this->Cell(50,10,$row1["allorder"],0,"1",'C');
            
        $this->Cell(0,10,'',0,1);
        $this->SetFont("Arial","B","10"); 
        $this->Cell(32,10,'INVOICE NUMBER',1,"",'C');
        $this->Cell(32,10,'INVOICE DATE',1,"",'C');
        $this->Cell(32,10,'INVOICE TIME',1,"",'C');
        $this->Cell(32,10,'INVOICE TYPE',1,"",'C');
        $this->Cell(32,10,'INVOICE TOTAL',1,"",'C');
        $this->Cell(32,10,'CUSTOMER ID',1,"1",'C');
        $counter = 0;
        $this->SetFont("Arial","","10");
        $counter++;
        while($row=$todayResult1->fetch_assoc()){
            $this->Cell(32,10,$row["invoice_number"],1,"",'C');
            $this->Cell(32,10,$row["invoice_date"],1,"",'C');
            $this->Cell(32,10,$row["invoice_time"],1,"",'C');
            $this->Cell(32,10,$row["invoice_type"],1,"",'C');
            $this->Cell(32,10,$row["invoice_total"],1,"",'C');
            $this->Cell(32,10,$row["customer_customer_id"],1,"1",'C');
        } 
           
    }
     function Terms_Singature(){////terms signature function
        $this->SetFont("Arial", "", "10");
        $this->Cell(190, 15, "..............................................", "", 1, "R");
        $this->Cell(175, 0, "Manager", "", 1, "R");  
    }
 }
$pdf = new PDF();/////create pdf object
$pdf->SetTitle("SHOE ENTERPRISES");///pdf title
$pdf->AddPage('P', 'A4', 0);///add page
$pdf->TableHeading();///out put table heading value
$pdf->TableBody();//out put table body value
$date = date("Y-m-d");///curent date 

$filename = "IncomeReport_" . $date . ".pdf";///file name

$pdf->Output();
 
 
 
 
 
 
 