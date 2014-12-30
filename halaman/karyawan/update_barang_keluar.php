<!DOCTYPE html>
<?php
include('connect.php'); 
$id_keluar = $_GET['id_keluar'];

$query = mysql_query("SELECT * FROM barang_keluar WHERE id_keluar = '$id_keluar'");
$keluar = mysql_fetch_array($query);

$query3 = mysql_query("SELECT * FROM detil_barang WHERE id_detil = '$keluar[id_detil]'");
$detil = mysql_fetch_array($query3);


$query5 = mysql_query("SELECT * FROM barang WHERE id_barang = '$detil[id_barang]'");
$barang = mysql_fetch_array($query5);

$query6 = mysql_query("SELECT * FROM jenis_barang WHERE id_jenis = '$barang[jenis]'");
$jenis = mysql_fetch_array($query6);


?>
<html lang="en">
<script type="text/javascript"> 
function openwindow()
{

window.open("halaman/select_detil_modem.php","mywindow","menubar=1,scrollbars=yes,resizable=1,width=800,height=500");

}
 </script>
<body>
   
	<div class="cl-mcont">		
    <div class="row"> 
<div class="col-sm-8 col-md-8">    
        <div class="block-flat info-box">
          <div class="header">							
            <h3>Edit Modem Keluar</h3>
          </div>
          <div class="content">
             <form class="form-horizontal group-border-dashed" method="post" action="?user=karyawan&halaman=terima_update_barang_keluar" style="border-radius: 0px;">
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Keluar</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_keluar" value="<?php echo $id_keluar?> " readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Keluar</label>
                <div class="col-sm-4">
                  <input type="text" name="tgl_keluar" id="tanggal" class="form-control" value="<?php echo $keluar['tgl_instalasi']?>">
                </div>
              </div>
             
 
			  <div class="form-group">
                <label class="col-sm-3 control-label">Nama Modem</label>
                <div class="col-sm-6">
                  <input type="text" name="nama_barang" id="nama_barang"  value="<?php echo $barang['nama_barang']?>" class="form-control" onclick="javascript:openwindow();" >
				  <input type="hidden" name="id_detil" id="id_detil" value="<?php echo $keluar['id_detil']?>" />
				  <input type="hidden" name="id_detil2" id="id_detil2" value="<?php echo $keluar['id_detil']?>" />
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
                  <input type="text" name="no_telp"  class="form-control" data-mask="phone" placeholder="(9999) 999999" value="<?php echo $keluar['no_telp']?>">
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">No Speedy</label>
                <div class="col-sm-3">
                  <input type="text" name="no_speedy"  class="form-control" value="<?php echo $keluar['no_speedy']?>"  >
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Setter</label>
                <div class="col-sm-3">
                  <input type="text" name="setter"  class="form-control" value="<?php echo $keluar['setter']?>">
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Keterangan</label>
				<div class="col-sm-3">
                <select name="keterangan"  class="select2" style="width:200px;" tabindex="2">
													<option selected="selected"><?php echo $keluar['keterangan'] ?></option>
													<option value="PSB">PSB</option>
													<option value="ganti">Ganti</option>
													
				</select>				
				</div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-6">
                  <input type="button" class="btn btn-prusia" onClick='location="?user=karyawan&halaman=master_barang_keluar"' value="Cancel"/>
                  <input class="btn btn-danger" type="submit" name="Submit" value="Update" />
                </div>
              </div>
            </form>
          </div>

          </div>
        </div>
        </div>
	  
	  
 
	  
</div>
	

