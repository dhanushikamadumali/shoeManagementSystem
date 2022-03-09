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
        $this->Cell(190,0,'AVAILABLE STOCK REPORT',0,0,'C');
        $this->Ln();
        $this->Cell(190, 0, "______________________________", 0, 0, "C");
    }
    function TableBody(){///table body function
        include '../model/Stock_Report_Model.php';///include order report model
            $StockReportObj = new stockReport();///create order report object
            $Result1=$StockReportObj ->getStockReport();///get result order report model
            $Result2=$StockReportObj ->getAvailableStock();///get result order report model
            $row1 = $Result2->fetch_assoc();///make a result as an array value
            $this->Cell(0,10,'',0,1);
            $this->SetFont("Arial","","10"); 
            $this->Cell(32,10,'AVAILABLE STOCK QUNTITY :',0,"",'L');
            $this->Cell(60,10,$row1["availableq"],0,"",'C');

            $this->Cell(0,10,'',0,1);
            $this->Cell(0,10,'',0,1);
            $this->SetFont("Arial","B","10"); 
            $this->Cell(30,10,'P_ID',1,"",'C');
            $this->Cell(36,10,'P_NAME',1,"",'C');
            $this->Cell(30,10,'SIZE',1,"",'C');
            $this->Cell(30,10,'A_QUNTY',1,"",'C');
            $this->Cell(32,10,'PRICE',1,"",'C');
            $this->Cell(32,10,'DATE',1,"1",'C');
           
            $counter = 0;
            $this->SetFont("Arial","","10");
            $counter++;
        while($row=$Result1->fetch_assoc()){
            $this->Cell(30,10,$row["product_product_id"],1,"",'C');
            $this->Cell(36,10,$row["product_name"],1,"",'C');
            $this->Cell(30,10,$row["size"],1,"",'C');
            $this->Cell(30,10,$row["a_quantity"],1,"",'C');
            $this->Cell(32,10,$row["price"],1,"",'C');
            $this->Cell(32,10, $row["stockdate"],1,"1",'C');
           
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

$filename = "IncomeReport_" . $date . ".pdf";//file name

$pdf->Output();






