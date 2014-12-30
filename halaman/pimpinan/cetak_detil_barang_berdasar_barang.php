<?php  

require('../../fpdf17/fpdf.php');
include('../../connect.php'); 

$keyword = $_POST['keyword'];
$kategori = $_POST['kategori'];

$id_barang = $_POST['id_barang'];

class FPDF_AutoWrapTable extends FPDF {
  	private $data = array();
  	private $options = array(
  		'filename' => '',
  		'destinationfile' => '',
  		'paper_size'=>'A4',
  		'orientation'=>'L'
  	);
  	
  	function __construct($data = array(), $options = array()) {
    	parent::__construct();
    	$this->data = $data;
    	$this->options = $options;
	}
	
	public function rptDetailData () {
		//
		$border = 0;
		$this->AddPage();
		$this->SetAutoPageBreak(true,60);
		$this->AliasNbPages();
		$left = 30;
		
		//header


		$this->SetFont('Times','B',14);
$this->setX(50);$this->MultiCell(0,5,"PERUSAHAAN PERSEROAN (PERSERO)",0,'C',0);
$this->SetFont('Times','B',16);
$this->setX(50);$this->MultiCell(0,30,"PT TELEKOMUNIKASI INDONESIA KANTOR CABANG BOYOLALI",0,'C',0);
$this->SetFont('Times','',10);
$this->setX(50);$this->MultiCell(0,5,"Jl. Pandanaran No. 160 Boyolali Indonesia Kode Pos 57311",0,'C',0);
$this->SetFont('Times','',10);
$this->setX(50);$this->MultiCell(0,30,"Telepon. (0276) 321000 Website. http://telkom.co.id",0,'C',0);
$this->SetFont('Times','',14);
$this->Ln(8);
$this->Line(30,94,890,94);
$this->setX(50);$this->MultiCell(0,5,"DATA RINCIAN MODEM atau MAC ADDRESS",0,'C',0);
$this->Cell(132);
$this->Image('../../images/TelkomIndonesia.png',50,8,150);  
$this->Ln(30);
$id_barang = $_POST['id_barang'];	
		//keterangan rincian
		$sql = mysql_query("SELECT detil_barang.*, barang.*, jenis_barang.* FROM detil_barang, barang, jenis_barang where detil_barang.id_barang='$id_barang' and barang.id_barang='$id_barang' and jenis_barang.id_jenis=barang.jenis");
$detill=mysql_fetch_array($sql);
//$blm_terdaftar=$detill['stock']-$detill['jumlah_detil'];

$sql_available = mysql_query("SELECT count(status) as available FROM detil_barang where id_barang='$detill[id_barang]' and status='available'");
$available=mysql_fetch_array($sql_available);

$sql_out = mysql_query("SELECT count(status) as outt FROM detil_barang where id_barang='$detill[id_barang]' and status='out'");
$outt=mysql_fetch_array($sql_out);

$sql_retur = mysql_query("SELECT count(status) as returr FROM detil_barang where id_barang='$detill[id_barang]' and status='retur'");
$returr=mysql_fetch_array($sql_retur);

$this->SetFont('Times','',10);
$this->Cell(120,15,'Nama Modem',0,0,'L');
$this->Cell(120,15,': '.$detill['nama_barang'],0,1,'L');
$this->Cell(120,15,'Merk',0,0,'L');
$this->Cell(120,15,': '.$detill['merk'],0,1,'L');
$this->Cell(120,15,'Jenis',0,0,'L');
$this->Cell(120,15,': '.$detill['nama_jenis'],0,1,'L');
$this->Cell(120,15,'Stock',0,0,'L');
$this->Cell(120,15,': '.$detill['stock'],0,1,'L');
$this->Cell(120,15,'Belum terdaftar',0,0,'L');
$this->Cell(120,15,': '.$detill['sisa_detil'],0,1,'L');
$this->Cell(120,15,'Available',0,0,'L');
$this->Cell(120,15,': '.$available['available'],0,1,'L');	
$this->Cell(120,15,'Out',0,0,'L');
$this->Cell(120,15,': '.$outt['outt'],0,1,'L');	
$this->Cell(120,15,'Retur',0,0,'L');
$this->Cell(120,15,': '.$returr['returr'],0,1,'L');	
$this->Ln(12);		
		
		$h = 15;
		$left = 50;
		$top = 80;	
		#tableheader
	$this->SetFillColor(205,209,208);
		$this->SetFont('','',9);
		$left = $this->GetX();
		$this->Cell(30,$h,'NO',1,0,'L',true);
		$this->SetX($left += 30); $this->Cell(60, $h, 'ID DETIL', 1, 0, 'C',true);
		$this->SetX($left += 60); $this->Cell(90, $h, 'MAC ADDRESS', 1, 0, 'C',true);
		$this->SetX($left += 90); $this->Cell(250, $h, 'NAMA BARANG', 1, 0, 'C',true);
		$this->SetX($left += 250); $this->Cell(80, $h, 'MERK', 1, 0, 'C',true);
		$this->SetX($left += 80); $this->Cell(250, $h, 'JENIS', 1, 0, 'C',true);
		$this->SetX($left += 250); $this->Cell(70, $h, 'STATUS', 1, 0, 'C',true);
		$this->Ln(20);
		
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(30,60,90,250,80,250,70));
		$this->SetAligns(array('C','L','L','L','L','L','L'));
		$no = 1; $this->SetFillColor(232,232,232);
		foreach ($this->data as $baris) {
			$this->Row(
				array($no++, 
	
				$baris['id_detil'], 
				$baris['mac_address'], 
				$baris['nama_barang'], 
				$baris['merk'],
				$baris['nama_jenis'], 
				$baris['status']
						
			));
		}
			
	}

	public function printPDF () {
				
		if ($this->options['paper_size'] == "A4") {
			$a = 8.3 * 72; //1 inch = 72 pt
			$b = 13.0 * 72;
			$this->FPDF($this->options['orientation'], "pt", array($a,$b));
		} else {
			$this->FPDF($this->options['orientation'], "pt", $this->options['paper_size']);
		}
		
	    $this->SetAutoPageBreak(false);
	    $this->AliasNbPages();
	    $this->SetFont("Arial", "B", 10);
	    //$this->AddPage();
	
	    $this->rptDetailData();
			    
	    $this->Output($this->options['filename'],$this->options['destinationfile']);
  	}
  	
  	
  	
  	private $widths;
	private $aligns;

	function SetWidths($w)
	{
		//Set the array of column widths
		$this->widths=$w;
	}

	function SetAligns($a)
	{
		//Set the array of column alignments
		$this->aligns=$a;
	}

	function Row($data)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=10*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			$this->Rect($x,$y,$w,$h);
			//Print the text
			$this->MultiCell($w,10,$data[$i],0,$a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}
} //end of class

$data = array();

if(isset($kategori) && $keyword){ 
$id_barang = $_POST['id_barang'];
$query="SELECT detil_barang.*, barang.*, jenis_barang.* FROM detil_barang, barang, jenis_barang
where barang.id_barang='$id_barang' and detil_barang.id_barang=barang.id_barang and barang.jenis=jenis_barang.id_jenis and 
$kategori LIKE '%$keyword%' order by id_detil";	
}
else{
$id_barang = $_POST['id_barang'];
$query="SELECT detil_barang.*, barang.*, jenis_barang.* FROM detil_barang, barang, jenis_barang
where barang.id_barang='$id_barang' and detil_barang.id_barang=barang.id_barang and barang.jenis=jenis_barang.id_jenis order by id_detil";	
}   

$sql = mysql_query ($query);

while ($row = mysql_fetch_assoc($sql)) {

 array_push($data, $row);

 

}

//pilihan
$options = array(
	'filename' => '', //nama file penyimpanan, kosongkan jika output ke browser
	'destinationfile' => '', //I=inline browser (default), F=local file, D=download
	'paper_size'=>'A4',	//paper size: F4, A3, A4, A5, Letter, Legal
	'orientation'=>'L' //orientation: P=portrait, L=landscape
);

$tabel = new FPDF_AutoWrapTable($data, $options);
$tabel->printPDF();
?>
