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

    $this->Cell(276,5,'RESOURCE REPORT MARCH 2021',0,0,'C');

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

    $this->Cell(60,10,'Name book',1,0,'C');

    $this->Cell(20,10,'Month',1,0,'C');

    $this->Cell(40,10,'Initial stock quantity',1,0,'C');

    $this->Cell(50,10,'Incurred Import',1,0,'C');

    $this->Cell(50,10,'Incurred Export',1,0,'C');

    $this->Cell(50,10,'Final inventory',1,0,'C');

    $this->Ln();

  }


  function viewTable($month){

    require_once("config.php");

    $this->SetFont('Times','',12);

    $getMonthDB = "SELECT * FROM baocaoton INNER JOIN sach ON baocaoton.masach = sach.masach WHERE thang = $month";

    $rungetMonthDB = mysqli_query($conn,$getMonthDB);

    $i = 0;

    while ($rowgetMonthDB = mysqli_fetch_array($rungetMonthDB)) {

      $i++;

      $this->Cell(10,10,$i,1,0,'C');

      $this->Cell(60,10,$rowgetMonthDB['tensach'],1,0,'C');

      $this->Cell(20,10,$rowgetMonthDB['thang'],1,0,'C');

      $this->Cell(40,10,$rowgetMonthDB['tondau'],1,0,'C');

      $this->Cell(50,10,$rowgetMonthDB['phatsinhnhap'],1,0,'C');

      $this->Cell(50,10,$rowgetMonthDB['phatsinhxuat'],1,0,'C');

      $this->Cell(50,10,$rowgetMonthDB['toncuoi'],1,0,'C');

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
