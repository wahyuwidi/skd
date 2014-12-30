<!DOCTYPE html>
<?php
include('connect.php'); 

$id_masuk = $_GET['id_masuk'];

$query = mysql_query("SELECT * FROM barang_masuk WHERE id_masuk = '$id_masuk'");
$masuk = mysql_fetch_array($query);

$query2 = mysql_query("SELECT * FROM barang WHERE id_barang = '$masuk[id_barang]'");
$barang = mysql_fetch_array($query2);


$query3 = mysql_query("SELECT * FROM jenis_barang WHERE id_jenis = '$barang[jenis]'");
$jenis = mysql_fetch_array($query3);


$query4 = mysql_query("SELECT nama_supplier FROM supplier WHERE id_supplier = '$masuk[id_supplier]'");
$supplier_awal = mysql_fetch_array($query4);


?>
<html lang="en">

<script type="text/javascript"> 
	
function openwindow()
{

window.open("halaman/select_barang.php","mywindow","menubar=1,scrollbars=yes,resizable=1,width=800,height=500");

}
 </script>
<body>
   
	<div class="cl-mcont">		
    <div class="row"> 
<div class="col-sm-8 col-md-8">    
          <div class="block-flat info-box">
          <div class="header">							
            <h3><b>Edit Modem : <?php echo $id_masuk?> </b></h3>
          </div>
          <div class="content">
             <form class="form-horizontal group-border-dashed" method="post" action="?user=gudang&halaman=terima_update_barang_masuk" style="border-radius: 0px;">
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Masuk</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_masuk" value="<?php echo $id_masuk?>" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Masuk</label>
                <div class="col-sm-4">
                  <input type="text" name="tanggal_masuk" id="tanggal2" class="form-control" value="<?php echo $masuk['tgl_masuk']?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Supplier</label>
				<div class="col-sm-6">
                <select  name="nama_supplier" data-placeholder="Pilih nama supplier..." class="select2">
													<option selected="selected"><?php echo $supplier_awal['nama_supplier']?></option>
													 <?php 
														$sql2 = mysql_query("SELECT *FROM supplier order by nama_supplier");
														  while($supplier = mysql_fetch_array($sql2)){
														  echo "<option>$supplier[nama_supplier]</option>";
														  }
														  ?>
													
												  </select>

				</div>
              </div>
			  
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Barang</label>
                <div class="col-sm-4">
                  <input type="text" name="id_barang"  id="id_barang" class="form-control" onclick="javascript:openwindow();" value="<?php echo $masuk['id_barang']?>">
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Nama Modem</label>
                <div class="col-sm-6">
                  <input type="text" name="nama_barang" id="nama_barang" class="form-control" readonly="readonly" value="<?php echo $barang['nama_barang']?>">
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
                  <input type="text" name="jenis" id="jenis" class="form-control" readonly="readonly" value="<?php echo $jenis['nama_jenis']?>" >
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Jumlah</label>
                <div class="col-sm-3">
				<input type="hidden"  name="jumlah_awal" value="<?php echo $masuk['jumlah']?>" >
                  <input type="text" name="jumlah"  class="form-control" value="<?php echo $masuk['jumlah']?>">
				  <input type="hidden"  name="total_awal" value="<?php echo $barang['total']?>" >
				  <input type="hidden"  name="sisa_detil_awal" value="<?php echo $barang['sisa_detil']?>" >
				  <input type="hidden"  name="stock_awal" value="<?php echo $barang['stock']?>" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-6">
				<input type="button" class="btn btn-prusia" onClick='location="?user=gudang&halaman=master_barang_masuk"' value="Cancel"/>
                  <input class="btn btn-danger" type="submit" name="Submit" value="Update" />
                  
                </div>
              </div>
            </form>
          </div>

          </div>
        </div>
        
      </div>
 
	  
</div>
	

