<?php

require('../../fpdf17/fpdf.php');
include('../../connect.php'); 

class PDF extends FPDF
{

function Header()

{
  // setting properti font
$this->SetFont('Times','B',14);
$this->setX(50);$this->MultiCell(0,5,"PERUSAHAAN PERSEROAN (PERSERO)",0,'C',0);
$this->SetFont('Times','B',16);
$this->setX(50);$this->MultiCell(0,7,"PT TELEKOMUNIKASI INDONESIA KANTOR CABANG BOYOLALI",0,'C',0);
$this->SetFont('Times','',10);
$this->setX(50);$this->MultiCell(0,5,"Jl. Pandanaran No. 160 Boyolali Indonesia Kode Pos 57311\nTelepon. (0276) 321000 Website. http://telkom.co.id",0,'C',0);
$this->SetFont('Times','',14);
$this->Ln(8);
$this->Line(20,43,280,43);
$this->setX(50);$this->MultiCell(0,5,"DATA MODEM",0,'C',0);
$this->Cell(132);
$this->Image('../../images/TelkomIndonesia.png',20,10,50);  
$this->Ln(5);

}


// Load data
function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}
function LoadDataFromSQL($sql)
{
	$hasil=mysql_query($sql) or die(mysql_error());

	$data = array();
	while($rows=mysql_fetch_array($hasil)){
		$data[] = $rows;

}
	return $data;
}


// Colored table
function FancyTable($header, $data)
{
	// Colors, line width and bold font
	$this->SetFillColor(205,209,208);
	$this->SetTextColor(0);
	$this->SetDrawColor(35,38,53);
	$this->SetLineWidth(.3);
	$this->SetFont('','',9);
	
	// Header
	$w = array( 20, 100, 30, 90, 20);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$this->Ln();
	// Color and font restoration
	$this->SetFillColor(232,232,232);
	$this->SetTextColor(0);
	$this->SetFont('','',8);
	// Data
	$fill = false;

	foreach($data as $row)
	{
	
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
		$this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
		$this->Cell($w[4],6,$row[4],'LR',0,'L',$fill);
		
		
		$this->Ln();
		$fill = !$fill;
	
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF('L','mm','A4');

// Column headings

$header = array('ID BARANG', 'NAMA BARANG', 'MERK','JENIS','STOCK');
// Data loading
$query="select a.id_barang, a.nama_barang, a.merk, (select b.nama_jenis from jenis_barang b where b.id_jenis=a.jenis) as jenis, a.stock from barang a order by a.id_barang ";
					

$data = $pdf->LoadDataFromSQL($query);
$pdf->SetMargins(20,20,20,20);
$pdf->SetFont('Arial','',11);
$pdf->AddPage();

$pdf->FancyTable($header,$data);
$pdf->Output();
?>
