<!DOCTYPE html>
<?php
include('connect.php'); 
$id_detil = $_GET['id_detil'];


$query = mysql_query("SELECT * FROM detil_barang WHERE id_detil = '$id_detil'");
$detil = mysql_fetch_array($query);

$query2 = mysql_query("SELECT * FROM barang_masuk WHERE id_masuk = '$detil[id_masuk]'");
$masuk= mysql_fetch_array($query2);


$query3= mysql_query("SELECT * FROM barang WHERE id_barang = '$detil[id_barang]'");
$barang= mysql_fetch_array($query3);


$query4 = mysql_query("SELECT * FROM jenis_barang WHERE id_jenis = '$barang[jenis]'");
$jenis= mysql_fetch_array($query4);


?>
<html lang="en">

 <script type="text/javascript"> 

function openwindow()
{

window.open("halaman/select_barang.php","mywindow","menubar=1,resizable=1,width=1000,height=500");

}
 </script>

<body>
   
	<div class="cl-mcont">		
    <div class="row"> 
	<div class="col-sm-8 col-md-8">    
        <div class="block-flat info-box">
          <div class="header">							
            <h3>Update Detil Modem : <?php echo $detil['id_detil']?> </h3>
          </div>
          <div class="content">
             <form class="form-horizontal group-border-dashed" method="post" action="?user=gudang&halaman=terima_update_detil_barang" style="border-radius: 0px;">
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Detil</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_detil" value="<?php echo $detil['id_detil']?>" readonly="readonly">
                </div>
              </div>
				

              <div class="form-group">
                <label class="col-sm-3 control-label">Id Barang</label>
                <div class="col-sm-4">
                  <input type="text" name="id_barang"  id="id_barang" class="form-control" onclick="javascript:openwindow();" value="<?php echo $barang['id_barang'] ?>">
					<input type="hidden" name="id_barang2"  id="id_barang2" class="form-control" value="<?php echo $barang['id_barang'] ?>">
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
                  <input type="text" name="mac"  class="form-control" value="<?php echo $detil['mac_address'] ?>">
                </div>
              </div>
			 
			
			 
	<!------		 <div class="form-group">
                <label class="col-sm-3 control-label">Status</label>
				<div class="col-sm-5">
                <select name="status"  class="select2" style="width:200px;" tabindex="2">
													<option selected="selected"><?php echo $detil['status'] ?></option>
													<option value="available">Available</option>
													<option value="out">Out</option>
													<option value="retur">Retur</option>
													
													
													
											</select>
				
				</div>
              </div> ----->
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
	

