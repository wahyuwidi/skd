<!DOCTYPE html>
<?php
include('connect.php'); 
$id_supplier = $_GET['id_supplier'];


$query = mysql_query("SELECT * FROM supplier WHERE id_supplier = '$id_supplier'");
$supplier = mysql_fetch_array($query);

?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
    <div class="row"> 
<div class="col-sm-8 col-md-8">    
        <div class="block-flat info-box">
          <div class="header">							
            <h3>Edit Supplier</h3>
          </div>
          <div class="content">
             <form class="form-horizontal group-border-dashed" method="post" action="?user=gudang&halaman=terima_update_supplier" style="border-radius: 0px;">
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Jenis</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_supplier" value="<?php echo $supplier['id_supplier']?>" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Supplier</label>
                <div class="col-sm-6">
                  <input type="text" name="nama_supplier" class="form-control"  value="<?php echo $supplier['nama_supplier']?>">
                </div>
              </div>
			   <div class="form-group">
                <label class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-6">
                  <textarea type="text" name="alamat" class="form-control" value="<?php echo $supplier['alamat_supplier']?>"><?php echo $supplier['alamat_supplier']?></textarea>
                </div>
              </div>
			   <div class="form-group">
                <label class="col-sm-3 control-label">No. Telp</label>
                <div class="col-sm-6">
                  <input type="text" name="no_telp" class="form-control" value="<?php echo $supplier['phone']?>" placeholder="(9999) 999999">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-6">
                  <input type="submit" class="btn btn-prusia" onClick="?user=gudang&halaman=master_supplier" value="Cancel"/>
				  <input class="btn btn-danger" type="submit" name="Submit" value="Submit" />
                </div>
              </div>
            </form>
          </div>

          </div>
        </div>
        
      </div>
	  
	 
			</div>


