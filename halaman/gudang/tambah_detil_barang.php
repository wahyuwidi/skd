<!DOCTYPE html>
<?php
include('connect.php'); 
$id_barang = $_GET['id_barang'];


$query3= mysql_query("SELECT * FROM barang WHERE id_barang = '$id_barang'");
$barang= mysql_fetch_array($query3);

$query4 = mysql_query("SELECT * FROM jenis_barang WHERE id_jenis = '$barang[jenis]'");
$jenis= mysql_fetch_array($query4);

$queryy = mysql_query("SELECT MAX(id_detil) AS id FROM detil_barang");
$kode = mysql_fetch_array($queryy);
$max_id = $kode['id'];
$id_detil = (int) substr($max_id,3,4);
$id_detil++;
$NewID = "dtl".sprintf("%04s",$id_detil);

?>
<html lang="en">

 <script type="text/javascript"> 

function openwindow()
{

window.open("halaman/select_barang_masuk.php","mywindow","menubar=1,resizable=1,width=1000,height=500");

}
 </script>

<body>
   
	<div class="cl-mcont">		
    <div class="row"> 
	<div class="col-sm-8 col-md-8">    
        <div class="block-flat info-box">
          <div class="header">							
            <h3>Master Detil Modem </h3>
          </div>
          <div class="content">
             <form class="form-horizontal group-border-dashed" method="post" action="?user=gudang&halaman=terima_detil_barang" style="border-radius: 0px;">
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Detil</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_detil" value="<?php echo $NewID?>" readonly="readonly">
                </div>
              </div>
				
			
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Barang</label>
                <div class="col-sm-4">
                  <input type="text" name="id_barang"  id="id_barang" class="form-control" onclick="javascript:openwindow();" value="<?php echo $barang['id_barang'] ?>">
				 
                </div>
              </div>
			   
			  <div class="form-group">
                <label class="col-sm-3 control-label">Nama Modem</label>
                <div class="col-sm-6">
                  <input type="text" name="nama_barang" id="nama_barang" class="form-control" readonly="readonly" value="<?php echo $barang['nama_barang'] ?>" >
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-3 control-label">Merk</label>
                <div class="col-sm-4">
                  <input type="text" name="merk" id="merk" class="form-control" readonly="readonly" value="<?php echo $barang['merk'] ?>" readonly="readonly" > 
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Jenis</label>
                <div class="col-sm-4">
                  <input type="text" name="jenis" id="jenis" class="form-control" readonly="readonly" value="<?php echo $jenis['nama_jenis'] ?>" >
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Mac Address</label>
                <div class="col-sm-3">
                  <input type="text" name="mac"  class="form-control" >
                </div>
              </div>
			 
			
			 
              <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-6">
				   <input type="submit" class="btn btn-prusia" onClick="?user=gudang&halaman=master_barang" value="Cancel"/>
                  <input class="btn btn-danger" type="submit" name="Submit" value="Submit" />
                </div>
              </div>
            </form>
          </div>

          </div>
        </div>
        
      </div>
	  
	  
</div>
	

