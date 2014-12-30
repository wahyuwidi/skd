<?php

require('../../fpdf17/fpdf.php');
include('../../connect.php'); 

$tanggal_awal = $_POST['tanggal_awal'];
$tanggal_akhir = $_POST['tanggal_akhir'];


class PDF extends FPDF
{

function Header()

{
global $title;
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
$this->setX(50);$this->MultiCell(0,5,$title,0,'C',0);
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
	$this->SetFont('','',8);

	// Header
$left = $this->GetX();


$w = array( 18, 18, 25,25,50, 18, 50, 18,23,30,18);
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
		$this->MultiCell($w[2],6,$row[2],'LR',0,'L',$fill);
		$this->MultiCell($w[3],6,$row[3],'LR',0,'L',$fill);
		$this->MultiCell($w[4],6,$row[4],'LR',0,'L',$fill);
		$this->MultiCell($w[5],6,$row[5],'LR',0,'L',$fill);
		$this->MultiCell($w[6],6,$row[6],'LR',0,'L',$fill);
		$this->MultiCell($w[7],6,$row[7],'LR',0,'L',$fill);
		$this->MultiCell($w[8],6,$row[8],'LR',0,'L',$fill);
		$this->MultiCell($w[9],6,$row[9],'LR',0,'L',$fill);
		$this->MultiCell($w[10],6,$row[10],'LR',0,'L',$fill);
		
	
		
		$this->Ln();
		$fill = !$fill;
		}
	
	
	// Closing line
	$this->Cell(array_sum($w),0,'','T');

}
}

$pdf = new PDF('L','mm','legal');
// Column headings

$header = array('ID KELUAR', 'TGL KELUAR','MAC ADDRESS','NO S/N','NAMA BARANG','MERK','JENIS','POSISI','NO TELP','NO SPEEDY','SETTER');
// Data loading

$query="select f.id_keluar,f.tgl_instalasi,
(select a.mac_address from detil_barang a where a.id_detil=f.id_detil) as mac_address,
(select a.no_SN from detil_barang a where a.id_detil=f.id_detil) as no_sn,
(select(select (select b.nama_barang from barang b where b.id_barang=c.id_barang) from barang_masuk c where c.id_masuk=a.id_masuk) from detil_barang a where a.id_detil=f.id_detil)  as nama_barang, 

(select(select (select b.merk from barang b where b.id_barang=c.id_barang) from barang_masuk c where c.id_masuk=a.id_masuk) from detil_barang a where a.id_detil=f.id_detil) as merk, 

(select (select(select  (select d.nama_jenis from jenis_barang d where d.id_jenis=b.jenis) from barang b where b.id_barang=c.id_barang) from barang_masuk c where c.id_masuk=a.id_masuk) from detil_barang a where a.id_detil=f.id_detil) as jenis,  
f.posisi_modem, f.no_telp, f.no_speedy, f.setter
from barang_keluar f  where tgl_instalasi between '$tanggal_awal' and '$tanggal_akhir' order by  f.id_keluar";	

$title = "DATA MODEM KELUAR ($tanggal_awal sampai $tanggal_akhir)";
//$data = $pdf->LoadDataFromSQL($query);

$data = $pdf->LoadDataFromSQL($query); 
$pdf->SetFont('Arial','',11);
$pdf->AddPage();

$pdf->FancyTable($header,$data);
$pdf->Output();
?>
