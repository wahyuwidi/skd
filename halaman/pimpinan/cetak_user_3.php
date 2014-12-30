<?php  

require('../../fpdf17/fpdf.php');
include('../../connect.php'); 

$id_user = $_POST['id_user'];

class FPDF_AutoWrapTable extends FPDF {
  	private $data = array();
  	private $options = array(
  		'filename' => '',
  		'destinationfile' => '',
  		'paper_size'=>'A4',
  		'orientation'=>'P'
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

		$this->SetFont('Times','B',12);
		$this->setX(100);$this->MultiCell(0,5,"PERUSAHAAN PERSEROAN (PERSERO)",0,'C',0);
		$this->SetFont('Times','B',14);
		$this->setX(100);$this->MultiCell(0,30,"PT TELKOM INDONESIA KANTOR CABANG BOYOLALI",0,'C',0);
		$this->SetFont('Times','',10);
		$this->setX(100);$this->MultiCell(0,5,"Jl. Pandanaran No. 160 Boyolali Indonesia Kode Pos 57311",0,'C',0);
		$this->SetFont('Times','',10);
		$this->setX(100);$this->MultiCell(0,30,"Telepon. (0276) 321000 Website. http://telkom.co.id",0,'C',0);
		$this->SetFont('Times','',14);
		$this->Ln(15);
		$this->Line(30,94,550,94);
		$this->setX(50);$this->MultiCell(0,5,"DATA USER",0,'C',0);

		$this->Cell(132);
		$this->Image('../../images/TelkomIndonesia.png',30,13,120);  
		$this->Ln(20);
		
		$id_user = $_POST['id_user'];	

		#cetak user
		
		$sql_user = mysql_query("SELECT * from user where id_user='$id_user' ");
		$user=mysql_fetch_array($sql_user);
		
		$this->SetFont('Times','',12);
		$this->Cell(120,20,'Nama Lengkap',0,0,'L');
		$this->Cell(120,20,':   '.$user['nama'],0,1,'L');
		$this->Cell(120,20,'Jabatan',0,0,'L');
		$this->Cell(120,20,':   '.$user['jabatan'],0,1,'L');
		$this->Cell(120,20,'Username',0,0,'L');
		$this->Cell(120,20,':   '.$user['username'],0,1,'L');
		$this->Cell(120,20,'Password',0,0,'L');
		$this->Cell(120,20,':   '.$user['password'],0,1,'L');
		$this->Cell(120,20,'Hak Akses',0,0,'L');
		$this->Cell(120,20,':   '.$user['level'],0,1,'L');	
		
		
			
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


$query="select * from user  order by nama ";


$sql = mysql_query ($query);

while ($row = mysql_fetch_assoc($sql)) {

 array_push($data, $row);



}

//pilihan
$options = array(
	'filename' => '', //nama file penyimpanan, kosongkan jika output ke browser
	'destinationfile' => '', //I=inline browser (default), F=local file, D=download
	'paper_size'=>'A4',	//paper size: F4, A3, A4, A5, Letter, Legal
	'orientation'=>'P' //orientation: P=portrait, L=landscape
);

$tabel = new FPDF_AutoWrapTable($data, $options);
$tabel->printPDF();
?>
