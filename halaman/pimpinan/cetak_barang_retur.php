<?php  

require('../../fpdf17/fpdf.php');
include('../../connect.php'); 

$tanggal_awal = $_POST['tanggal_awal'];
$tanggal_akhir = $_POST['tanggal_akhir'];


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
		$left = 25;
		
		//header
		$tanggal_awal = $_POST['tanggal_awal'];
$tanggal_akhir = $_POST['tanggal_akhir'];
$title = "DATA MODEM RETUR ($tanggal_awal sampai $tanggal_akhir)";
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
$this->setX(50);$this->MultiCell(0,5,$title,0,'C',0);
$this->Cell(132);
$this->Image('../../images/TelkomIndonesia.png',50,8,150);  
$this->Ln(30);
		
		
		$h = 15;
		$left = 40;
		$top = 80;	
		#tableheader
		$this->SetFillColor(205,209,208);
		$this->SetFont('','',9);
		$left = $this->GetX();
		$this->Cell(30,$h,'NO',1,0,'L',true);
		$this->SetX($left += 30); $this->Cell(55, $h, 'TGL RETUR', 1, 0, 'C',true);
		$this->SetX($left += 55); $this->Cell(80, $h, 'MAC ADDRESS', 1, 0, 'C',true);
		$this->SetX($left += 80); $this->Cell(200, $h, 'NAMA BARANG', 1, 0, 'C',true);
		$this->SetX($left += 200); $this->Cell(80, $h, 'MERK', 1, 0, 'C',true);
		$this->SetX($left += 80); $this->Cell(150, $h, 'JENIS', 1, 0, 'C',true);
		$this->SetX($left += 150); $this->Cell(70, $h, 'NO TELP', 1, 0, 'C',true);
		$this->SetX($left += 70); $this->Cell(90, $h, 'NO SPEEDY', 1, 0, 'C',true);
		$this->SetX($left += 90); $this->Cell(60, $h, 'SETTER', 1, 0, 'C',true);
		$this->SetX($left += 60); $this->Cell(60, $h, 'Keterangan', 1, 0, 'C',true);
		$this->Ln(20);
		
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(30,55,80,200,80,150,70,90,60,60));
		$this->SetAligns(array('C','L','L','L','L','L','L','L','L','L'));
		$no = 1; $this->SetFillColor(232,232,232);
		foreach ($this->data as $baris) {
			$this->Row(
				array($no++, 
				$baris['tgl_retur'], 
				$baris['mac_address'], 
				$baris['nama_barang'],
				$baris['merk'], 
				$baris['nama_jenis'],  
				$baris['no_telp'], 
				$baris['no_speedy'], 
				$baris['setter'], 
				$baris['ket']				
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


if(isset($_POST['keyword']) && isset($_POST['kategori'])){ 
$kategori=$_POST['kategori'];
$keyword=$_POST['keyword'];
$query="select retur.*, barang_keluar.*, detil_barang.*, barang.*, jenis_barang.* from
retur, barang_keluar, detil_barang, barang, jenis_barang where
retur.id_keluar=barang_keluar.id_keluar and barang_keluar.id_detil=detil_barang.id_detil and
detil_barang.id_barang=barang.id_barang and barang.jenis=jenis_barang.id_jenis
and $kategori LIKE'%$keyword%' and tgl_retur between '$tanggal_awal' and '$tanggal_akhir' order by retur.tgl_retur asc";	
}
else {
$query="select retur.*, barang_keluar.*, detil_barang.*, barang.*, jenis_barang.* from
retur, barang_keluar, detil_barang, barang, jenis_barang where
retur.id_keluar=barang_keluar.id_keluar and barang_keluar.id_detil=detil_barang.id_detil and
detil_barang.id_barang=barang.id_barang and barang.jenis=jenis_barang.id_jenis
and tgl_retur between '$tanggal_awal' and '$tanggal_akhir' order by retur.tgl_retur asc";	

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
