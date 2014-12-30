<!DOCTYPE html>
<?php
include('connect.php'); 

$id_retur = $_GET['id_retur'];

$query = mysql_query("SELECT * FROM retur WHERE id_retur = '$id_retur'");
$retur = mysql_fetch_array($query);

$query2 = mysql_query("SELECT * FROM barang_keluar WHERE id_keluar = '$retur[id_keluar]'");
$keluar = mysql_fetch_array($query2);

$query3 = mysql_query("SELECT * FROM detil_barang WHERE id_detil = '$keluar[id_detil]'");
$detil = mysql_fetch_array($query3);

$query4 = mysql_query("SELECT * FROM barang WHERE id_barang = '$detil[id_barang]'");
$barang = mysql_fetch_array($query4);

$query5 = mysql_query("SELECT * FROM jenis_barang WHERE id_jenis = '$barang[jenis]'");
$jenis = mysql_fetch_array($query5);


?>
<html lang="en">
<script type="text/javascript"> 
function openwindow()
{

window.open("halaman/select_barang_keluar.php","mywindow","menubar=1,scrollbars=yes,resizable=1,width=1200,height=500");

}
 </script>
<body>
   
	<div class="cl-mcont">		
    <div class="row"> 
<div class="col-sm-8 col-md-8">    
        <div class="block-flat info-box">
          <div class="header">							
            <h3>Update Modem Retur</h3>
          </div>
          <div class="content">
             <form class="form-horizontal group-border-dashed" method="post" action="?user=karyawan&halaman=terima_update_barang_retur" style="border-radius: 0px;">
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Retur</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_retur" value="<?php echo $id_retur?>" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Retur</label>
                <div class="col-sm-4">
                  <input type="text" name="tgl_retur" id="tanggal" class="form-control" value="<?php echo $retur['tgl_retur']?>" >
                </div>
              </div>
             <div class="form-group">
                <label class="col-sm-3 control-label">Id Keluar</label>
                <div class="col-sm-6">
                  <input type="text" name="id_keluar" id="id_keluar" class="form-control" onclick="javascript:openwindow();" value="<?php echo $retur['id_keluar']?>" >
				  <input type="hidden" name="id_keluar2" id="id_keluar2" class="form-control"  value="<?php echo $retur['id_keluar']?>" >
				  
                </div>
              </div>
 
			  <div class="form-group">
                <label class="col-sm-3 control-label">Nama Modem</label>
                <div class="col-sm-6">
                  <input type="text" name="barang_keluar" id="barang_keluar" class="form-control" onclick="javascript:openwindow();" value="<?php echo $barang['nama_barang']?>" >
				
                </div>
              </div>
			   <div class="form-group">
                <label class="col-sm-3 control-label">Mac address</label>
                <div class="col-sm-4">
                  <input type="text" name="mac" id="mac" class="form-control" readonly="readonly" value="<?php echo $detil['mac_address']?>"> 
                </div>
              </div>
			
			  
			  <div class="form-group">
                <label class="col-sm-3 control-label">Merk</label>
                <div class="col-sm-4">
                  <input type="text" name="merk" id="merk" class="form-control" readonly="readonly" value="<?php echo $barang['merk']?>"> 
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Jenis</label>
                <div class="col-sm-4">
                  <input type="text" name="jenis" id="jenis" class="form-control" readonly="readonly" value="<?php echo $jenis['nama_jenis']?>"> 
                </div>
              </div>
		
			  <div class="form-group">
                <label class="col-sm-3 control-label">No Telp</label>
                <div class="col-sm-3">
                  <input type="text" name="no_telp" id="no_telp" class="form-control" readonly="readonly" value="<?php echo $keluar['no_telp']?>">
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">No Speedy</label>
                <div class="col-sm-3">
                  <input type="text" name="no_speedy" id="no_speedy" class="form-control" readonly="readonly" value="<?php echo $keluar['no_speedy']?>">
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Setter</label>
                <div class="col-sm-3">
                  <input type="text" name="setter"  class="form-control" value="<?php echo $retur['setter']?>" id="setter" >
                </div>
              </div>
			   <div class="form-group">
                <label class="col-sm-3 control-label">Keterangan</label>
                <div class="col-sm-3">
                  <input type="text" name="ket"  class="form-control" value="<?php echo $retur['ket']?>" id="setter" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-6">
                  <input type="button" class="btn btn-prusia" onClick='location="?user=karyawan&halaman=master_barang_retur"' value="Cancel"/>
                  <input class="btn btn-danger" type="submit" name="Submit" value="Update" />
                </div>
              </div>
            </form>
          </div>

          </div>
        </div>
        </div>
	  
	 
</div>
	

