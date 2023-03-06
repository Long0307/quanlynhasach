<?php

require_once("fpdf182/fpdf.php");

class myPDF extends FPDF
{

  function header(){
    $this->Image('dist/img/AdminLTELogo.png',10,6);

    $this->setFont('Arial','B',14);

    $this->Cell(276,5,'THE BOOK MANAGEMENT PROJECTS GROUP 7',0,0,'C');

    $this->Ln();

    $this->setFont('Times','',12);

    $this->Cell(276,5,'DEBT REPORT MARCH 2021',0,0,'C');

    $this->Ln(30);

  }

  function footer(){

    $this->SetY(-15);

    $this->setFont('Arial','B',8);

    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

  }


  function headerTable(){

    $this->setFont('Times','B',12);

    $this->Cell(10,10,'STT',1,0,'C');

    $this->Cell(60,10,'Name',1,0,'C');

    $this->Cell(40,10,'Phone',1,0,'C');

    $this->Cell(50,10,'Email',1,0,'C');

    $this->Cell(30,10,'First debt',1,0,'C');

    $this->Cell(30,10,'Total purchase',1,0,'C');

    $this->Cell(30,10,'Total payment',1,0,'C');

    $this->Cell(30,10,'Final debt',1,0,'C');

    $this->Ln();  

  }


  function viewTable($month){

    require_once("config.php");

    $this->SetFont('Times','',12);

    $getMonthDB = "SELECT * FROM baocaocongno INNER JOIN khachhang ON baocaocongno.makhachhang = khachhang.makhachhang WHERE thang = $month";

    $rungetMonthDB = mysqli_query($conn,$getMonthDB);

    $i = 0;

    while ($rowgetMonthDB = mysqli_fetch_array($rungetMonthDB)) {

      $i++;

      $this->Cell(10,10,$i,1,0,'C');

      $this->Cell(60,10,$rowgetMonthDB['hotenkhachhang'],1,0,'C');

      $this->Cell(40,10,"0".$rowgetMonthDB['sodienthoai'],1,0,'C');

      $this->Cell(50,10,$rowgetMonthDB['email'],1,0,'C');

      $this->Cell(30,10, number_format($rowgetMonthDB['nodau'], 0, '', ',')." VND",1,0,'C');

      $this->Cell(30,10, number_format($rowgetMonthDB['tongtienmua'], 0, '', ',')." VND",1,0,'C');

      $this->Cell(30,10, number_format($rowgetMonthDB['tongtientra'], 0, '', ',')." VND",1,0,'C');

      $this->Cell(30,10, number_format($rowgetMonthDB['nocuoi'], 0, '', ',')." VND",1,0,'C');

      $this->Ln();

    }

  }

}


$pdf = new myPDF();

if(isset($_GET['month'])){
  $month = $_GET['month'];

  $monthNew = explode("-",$month);
}
  
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);

$pdf->headerTable();
$pdf->viewTable($monthNew[1]);

$pdf->Output();

?>
