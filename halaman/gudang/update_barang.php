<!DOCTYPE html>
<?php
include('connect.php'); 

$id_barang = $_GET['id_barang'];


$query = mysql_query("SELECT * FROM barang WHERE id_barang = '$id_barang'");
$barang = mysql_fetch_array($query);


$query3 = mysql_query("SELECT nama_jenis FROM jenis_barang WHERE id_jenis = '$barang[jenis]'");
$jenis_awal = mysql_fetch_array($query3);

//tambah jenis
$sql2 = mysql_query("SELECT * FROM jenis_barang ORDER BY id_jenis");

$query2 = mysql_query("SELECT MAX(id_jenis) AS id FROM jenis_barang");
$kode2 = mysql_fetch_array($query2);
$max_id2 = $kode2['id'];
$id_jenis = (int) substr($max_id2,3,4);
$id_jenis++;
$NewID2 = "JNS".sprintf("%04s",$id_jenis);
?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
    <div class="row"> 
	<div class="col-sm-8 col-md-8">    
        <div class="block-flat info-box">
          <div class="header">							
            <h3><b>Edit Barang : <?php echo $id_barang?></b></h3>
          </div>
          <div class="content">
             <form class="form-horizontal group-border-dashed" method="post" action="?user=gudang&halaman=terima_update_barang" style="border-radius: 0px;">
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Barang</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_barang" value="<?php echo $id_barang?>" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Barang</label>
                <div class="col-sm-6">
                  <input type="text" name="nama_barang" class="form-control" value="<?php echo $barang['nama_barang']?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Jenis Barang</label>
				<div class="input-group col-sm-5">
                <select name="nama_jenis" data-placeholder="Pilih jenis barang..." class="select2" style="width:250px;" tabindex="2">
													<option selected="selected"><?php echo $jenis_awal['nama_jenis']?></option>
													 <?php 
														$hasil = mysql_query("SELECT *FROM jenis_barang order by nama_jenis");
														  while($jenis = mysql_fetch_array($hasil)){
														  echo "<option>$jenis[nama_jenis]</option>";
														  }
														  ?>
													
				</select>
				<span class="input-group-btn">
                    <button type="button" class="btn btn-success md-trigger" data-modal="form-primary"><i class="fa fa-plus"></i></button>
                    </span>
				
				</div>
              </div>
			 
              <div class="form-group">
                <label class="col-sm-3 control-label">Merk</label>
                <div class="col-sm-4">
                  <input type="text" name="merk" class="form-control" value="<?php echo $barang['merk']?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-6">
					<input type="submit" class="btn btn-prusia" onClick="?user=admin&halaman=master_supplier" value="Cancel"/>
                  <input class="btn btn-danger" type="submit" name="Submit" value="Update" />
                </div>
              </div>
            </form>
          </div>

          </div>
        </div>
        
      </div>
	  
			
			               <!-- Nifty Modal -->
                <div class="md-modal colored-header custom-width md-effect-9" id="form-primary">
                    <div class="md-content">
                      <div class="modal-header">
                        <h3>Jenis Barang</h3>
                        <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      </div>
                      <div class="modal-body form">
					  <form method="post" action="?user=admin&halaman=terima_jenis">
                        <div class="form-group">
                          <label>Id Jenis</label> <input type="text" class="form-control" name="id_jenis" value="<?php echo $NewID2?>" readonly="readonly">
                        </div>
                        <div class="form-group">
                          <label>Nama Jenis</label> <input type="text"  name="nama_jenis" class="form-control">
                        </div>
                     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-flat md-close" name="Submit" value="Submit" data-dismiss="modal">OK</button>
                      </div>
                    </div>
					</form>
                </div>
 
	  
</div>
	

