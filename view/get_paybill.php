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
        $this->Cell(190,0,'PAY BILL',0,0,'C');
        $this->Ln();
        $this->Cell(190, 0, "___________", 0, 0, "C");
    }
    function TableBody(){///table body function
            include '../model/Payment_Model.php';;///include payment model
            $PaymentObj = new payment();///create user report object
            $payId = $_REQUEST['payId'];////request pay id
            $paymentResult = $PaymentObj->getallpaymentdetails($payId);///get result payment model by payid
            $row1=$paymentResult->fetch_assoc();////make a result as an array value
            $this->Cell(0,10,'',0,1);
            $this->SetFont("Arial","B","10");
            $this->Cell(30,10,'BILL NO :',0,"",'L');
            $this->SetFont("Arial","","10");
            $this->Cell(22,10,$row1["paybill_no"],"",1,'C');
       
            $this->Cell(0,10,'',0,1);
            $this->SetFont("Arial","B","10");
            $this->Cell(35,10,'PAYMENT DATE ',0,"",'L');
            $this->Cell(45,10,'PAYMENT METHOD',0,"",'L');
            $this->Cell(45,10,'SUPPLIER',0,"",'L');
            $this->Cell(45,10,'AMOUNT(Rs.)',0,"",'L');
            $this->Cell(45,10,'STATUS',"",1,'L');
            $this->Cell(190, 0, "--------------------------------------------------------------------------------------------------------------------------------------------------------------", "", 1, "L");
           
            $this->Cell(0,10,'',0,1);
            $this->SetFont("Arial","","10");
            $this->Cell(35,10,$row1["payment_date"],0,"",'L');
            $this->Cell(45,10,$row1["payment_type"],0,"",'L');
            $this->Cell(45,10,$row1["supplier_fname"]." ".$row1["supplier_lname"],0,"",'L');
            $this->Cell(45,10,$row1["payment_total_amount"].".00",0,"",'L');
            $this->Cell(45,10,$row1["p_status"],"",1,'L');
            $this->Cell(190, 0, "--------------------------------------------------------------------------------------------------------------------------------------------------------------", "", 1, "L");
          
            $this->Cell(0,10,'',0,1);
            $this->SetFont("Arial","B","10");
            $this->Cell(145,10,'TOTAL AMOUNT (Rs) :',0,"",'R');
            $this->SetFont("Arial","","10");
            $this->Cell(30,10,$row1["payment_total_amount"].".00","",1,'R');
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






