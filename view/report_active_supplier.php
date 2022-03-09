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
        $this->Cell(190,0,'ALL SUPPLIER REPORT',0,0,'C');
        $this->Ln();
        $this->Cell(190, 0, "__________________________", 0, 0, "C");
    }
    function TableBody(){///table body function
        include '../model/Supplier_Report_Model.php';///include user report model
        $supplierReportObj = new supplierReport();///create user report object
        $Result1= $supplierReportObj->getsupplierReport();///get result user report model
        $Result3= $supplierReportObj->getActiveSupplier();///get result user report model
        $row3 = $Result3->fetch_assoc();////make a result as an array value
        $this->Cell(0,10,'',0,1);
        $this->SetFont("Arial","B","10");
        $this->Cell(32,10,'ALL SUPPLIER :',0,"",'L');
        $this->SetFont("Arial","","10");
        $this->Cell(10,10,$row3["ActiveSupplier"],0,"",'C');

        $this->Cell(0,10,'',0,1);
        $this->Cell(0,10,'',0,1);
        $this->SetFont("Arial","B","10"); 
        $this->Cell(15,10,'S_ID',1,"",'C');
        $this->Cell(32,10,'S_NAME',1,"",'C');
        $this->Cell(44,10,'EMAIL',1,"",'C');
        $this->Cell(50,10,'S_ADDR',1,"",'C');
        $this->Cell(27,10,'CO_NO',1,"",'C');
        $this->Cell(30,10,'CREATE_DATE',1,"1",'C'); 
        
        $counter = 0;
        $this->SetFont("Arial","","10");
        $counter++;
        while($row1=$Result1->fetch_assoc()){
            $this->Cell(15,12,$row1["supplier_id"],1,"",'C');
            $this->Cell(32,12,$row1["supplier_fname"],1,"",'C');
            $this->Cell(44,12,$row1["supplier_email"],1,"",'C');
            $this->Cell(50,12,$row1["supplier_address"],1,"",'C');
            $this->Cell(27,12,$row1["supplier_con2"],1,"",'C');
            $this->Cell(30,12,$row1["supplier_create_date"],1,"1",'C');  
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
$pdf->TableBody();//out put table body value
$date = date("Y-m-d");///curent date 

$filename = "IncomeReport_" . $date . ".pdf";//file name

$pdf->Output();






