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
        $this->Cell(190,0,'GOOD RECEIPT NOTE',0,0,'C');
        $this->Ln();
        $this->Cell(190, 0, "_______________________", 0, 0, "C");
    }
    function TableBody(){///table body function
            include '../model/GRN_Model.php';///include user report model
            $grnObj = new add_grn();///create user report object

            $grnId = $_REQUEST['grn_id'];////request grn id
            $grnId = base64_decode($grnId);///supplier id decode
            $grnResult = $grnObj->getgrn($grnId);///get grn details by grn id
            $row1=$grnResult->fetch_assoc();////make a result as an array value
            $stockResult = $grnObj->getGrnRowMaterialOrderDetails($grnId);///get stock result by grn id
            $totalAmount = $grnObj->gettotalAmount($grnId);///get total amount by grn id
            $AmountRow=$totalAmount->fetch_assoc();///make a result as an array
            $this->Cell(0,10,'',0,1);
            $this->SetFont("Arial","B","10");
            $this->Cell(32,10,'GRN NO :',0,"",'L');
            $this->SetFont("Arial","","10");
            $this->Cell(10,10,$row1["grn_no"],"",0,'C');
            $this->Ln();
            $this->SetFont("Arial","B","10");
            $this->Cell(32,10,'SUPPLIER :',0,"",'L');
            $this->SetFont("Arial","","10");
            $this->Cell(57,10,$row1["supplier_fname"]." ". $row1["supplier_lname"].","." ".$row1["supplier_address"],"",0,'C');
            
            $this->Cell(0,10,'',0,1);
            $this->Cell(0,10,'',0,1);
            $this->SetFont("Arial","B","10"); 
            $this->Cell(50,10,'MATERIAL_NAME',1,"",'C');
            $this->Cell(32,10,'UNIT',1,"",'C');
            $this->Cell(40,10,'QUANTITY',1,"",'C');
            $this->Cell(30,10,'PRICE',1,"",'C');
            $this->Cell(30,10,'SUB_TOTAL',1,"1",'C');
           
            $counter = 0;
            $this->SetFont("Arial","","10");
            $counter++;
        while($row2=$stockResult->fetch_assoc()){
            $this->Cell(50,12,$row2["r_material_name"],1,"",'C');
            $this->Cell(32,12,$row2["unit_name"],1,"",'C');
            $this->Cell(40,12,$row2["r_m_stock_a_quantity"],1,"",'C');
            $this->Cell(30,12,$row2["unit_price"],1,"",'C');
            $this->Cell(30,12,$row2["sub_total"],1,"1",'C');
           
        }
        $this->SetFont("Arial","B","10"); 
        $this->Cell(152,10,'TOTAL :',1,"",'R');
        $this->Cell(30,10,$AmountRow["Amount"],1,"1",'C'); 
    }
    function Terms_Singature(){////terms signature function
        $this->SetFont("Arial", "", "10");
        $this->Cell(190, 15, "..............................................", "", 1, "R");
        $this->Cell(175, 0, "Manager", "", 1, "R");
    }
}
$pdf = new PDF();/////create pdf 
$pdf->SetTitle("SHOE ENTERPRISES");///pdf title
$pdf->AddPage('P', 'A4',0);///add page
$pdf->TableHeading();///out put table heading value
$pdf->TableBody();//out put table body value 
$date = date("Y-m-d");///curent date 

$filename = "IncomeReport_" . $date . ".pdf";//file name

$pdf->Output();






