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
        $this->Cell(190,0,'TODAY DELIVERY REPORT',0,0,'C');
        $this->Ln();
        $this->Cell(190, 0, "_____________________________", 0, 1, "C");
    }
    function TableBody(){///table body function
        include '../model/Delivery_Report_Model.php';///include report model
        $deliveryReportObj = new deliveryReport();///create report obje
        $todayResult1=$deliveryReportObj->getTodayReport();///get result report model
        $todayResult2=$deliveryReportObj->getTodaySuccDelivery();///get result report model
        $row1 = $todayResult2->fetch_assoc();///make a result as an array value
        $this->Cell(0,10,'',0,1);
        $this->SetFont("Arial","","10"); 
        $this->Cell(32,10,'ALL SUCCESS DELIVERED :',0,"",'L');
        $this->Cell(50,10,$row1["successdelivery"],0,"",'C');

        $this->Cell(0,10,'',0,1);
        $this->Cell(0,10,'',0,1);
        $this->SetFont("Arial","B","10"); 
        $this->Cell(15,10,'D_ID',1,"",'C');
        $this->Cell(27,10,'D_NAME',1,"",'C');
        $this->Cell(22,10,'D_DATE',1,"",'C');
        $this->Cell(27,10,'CU_NAME',1,"",'C');
        $this->Cell(44,10,'CU_ADDR',1,"",'C');
        $this->Cell(32,10,'INV_NO',1,"",'C');
        $this->Cell(20,10,'STATUS',1,"1",'C');

        $counter = 0;
        $this->SetFont("Arial","","10");
        $counter++;
        while($row= $todayResult1->fetch_assoc()){
            $this->Cell(15,12,$row["delivery_id"],1,"",'C');
            $this->Cell(27,12,$row["deliver_name"],1,"",'C');
            $this->Cell(22,12, $row["delivery_date"],1,"",'C');
            $this->Cell(27,12,$row["customer_fname"],1,"",'C');
            $this->Cell(44,12, $row["customer_adrr"],1,"",'C');
            $this->Cell(32,12, $row["invoice_number"],1,"",'C');
            if($row["delivery_status"]=="1"){
                $this->Cell(20,12, 'Shipped',1,"1",'C');
            }else{
                $this->Cell(20,12, 'Delivered',1,"1",'C');
            }
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






