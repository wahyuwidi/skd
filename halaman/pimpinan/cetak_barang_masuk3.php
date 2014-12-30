<?php  

require('../../fpdf17/fpdf.php');
include('../../connect.php'); 

$keyword = $_POST['keyword'];
$kategori = $_POST['kategori'];

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
		$this->setX(50);$this->MultiCell(0,5,"DATA MODEM MASUK",0,'C',0);

		$this->Cell(132);
		$this->Image('../../images/TelkomIndonesia.png',50,8,150);  
		$this->Ln(30);
		
		
		$h = 15;
		$left = 50;
		$top = 80;	
		#tableheader
		$this->SetFillColor(205,209,208);
		$this->SetFont('','',9);
		$left = $this->GetX();
		$this->Cell(30,$h,'NO',1,0,'L',true);
		//$this->SetX($left += 30); $this->Cell(60, $h, 'ID MASUK', 1, 0, 'C',true);
		$this->SetX($left += 30); $this->Cell(60, $h, 'TGL MASUK', 1, 0, 'C',true);
		$this->SetX($left += 60); $this->Cell(90, $h, 'SUPPLIER', 1, 0, 'C',true);
		$this->SetX($left += 90); $this->Cell(270, $h, 'NAMA BARANG', 1, 0, 'C',true);
		$this->SetX($left += 270); $this->Cell(80, $h, 'MERK', 1, 0, 'C',true);
		$this->SetX($left += 80); $this->Cell(250, $h, 'JENIS', 1, 0, 'C',true);
		$this->SetX($left += 250); $this->Cell(60, $h, 'JUMLAH', 1, 0, 'C',true);
		$this->Ln(20);
		
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(30,60,90,270,80,250,60));
		$this->SetAligns(array('C','L','L','L','L','L','C'));
		$no = 1; $this->SetFillColor(232,232,232);
		foreach ($this->data as $baris) {
			$this->Row(
				array($no++, 
				//$baris['id_masuk'], 
				$baris['tgl_masuk'], 
				$baris['nama_supplier'], 
				$baris['nama_barang'], 
				$baris['merk'],
				$baris['nama_jenis'], 
				$baris['jumlah']
						
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

$query="select barang_masuk.id_masuk, barang_masuk.tgl_masuk, barang_masuk.jumlah, supplier.nama_supplier, barang.nama_barang, barang.merk, jenis_barang.nama_jenis
 from barang_masuk, barang, jenis_barang, supplier
where barang_masuk.id_barang=barang.id_barang and barang_masuk.id_supplier=supplier.id_supplier and barang.jenis=jenis_barang.id_jenis and 
$kategori LIKE '%$keyword%' order by barang_masuk.tgl_masuk asc";	
}
else{
$query="select barang_masuk.id_masuk, barang_masuk.tgl_masuk, barang_masuk.jumlah, supplier.nama_supplier, barang.nama_barang, barang.merk, jenis_barang.nama_jenis
 from barang_masuk, barang, jenis_barang, supplier
where barang_masuk.id_barang=barang.id_barang and barang_masuk.id_supplier=supplier.id_supplier and barang.jenis=jenis_barang.id_jenis order by barang_masuk.tgl_masuk asc";

}

// $query = "SELECT t_pohaulingdtl.spesification, t_pohaulingdtl.wosequenceplan, t_pohaulingdtl.unit, t_pohaulingdtl.qty,  

 //  t_pohaulingdtl.price, t_pohaulingdtl.id_port, t_pohaulingdtl.remark, t_pohauling.id_po 

  //    FROM t_pohauling LEFT JOIN t_pohaulingdtl ON t_pohauling.id_po = t_pohaulingdtl.id_po";

      

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
