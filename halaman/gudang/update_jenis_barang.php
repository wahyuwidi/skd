<!DOCTYPE html>
<?php
include('connect.php');  
$id_jenis = $_GET['id_jenis'];

$query = mysql_query("SELECT * FROM jenis_barang WHERE id_jenis = '$id_jenis'");
$jenis = mysql_fetch_array($query);
?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
    <div class="row"> 
<div class="col-sm-8 col-md-8">    
        <div class="block-flat info-box">
          <div class="header">							
            <h3>Edit Jenis Barang</h3>
          </div>
          <div class="content">
             <form class="form-horizontal group-border-dashed" method="post" action="?user=gudang&halaman=terima_update_jenis" style="border-radius: 0px;">
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Jenis</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_jenis" value="<?php echo $jenis['id_jenis']?>" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Jenis</label>
                <div class="col-sm-6">
                  <input type="text" name="nama_jenis" class="form-control" value="<?php echo $jenis['nama_jenis']?>">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-6">
                 <input type="submit" class="btn btn-prusia" onClick="?user=gudang&halaman=master_barang" value="Cancel"/>
                  <input class="btn btn-danger" type="submit" name="Submit" value="Update" />
                </div>
              </div>
            </form>
          </div>

          </div>
        </div>
        
      </div>
	  
	 
			</div>


