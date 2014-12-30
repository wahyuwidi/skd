<!DOCTYPE html>
<?php
include('connect.php'); 
$sql = mysql_query("SELECT detil_barang.*, barang.*, jenis_barang.* FROM detil_barang, barang, jenis_barang
where detil_barang.id_barang=barang.id_barang and barang.jenis=jenis_barang.id_jenis ");



$query = mysql_query("SELECT MAX(id_detil) AS id FROM detil_barang");
$kode = mysql_fetch_array($query);
$max_id = $kode['id'];
$id_detil = (int) substr($max_id,3,4);
$id_detil++;
$NewID = "dtl".sprintf("%04s",$id_detil);
?>
<html lang="en">

 <script type="text/javascript"> 

function openwindow()
{

window.open("halaman/select_barang2.php","mywindow","menubar=1,scrollbars=yes,resizable=1,width=800,height=500");

}
 </script>

<body>
   
	<div class="cl-mcont">		
    <div class="row"> 
	<div class="col-sm-8 col-md-8">    
        <div class="block-flat purple-box">
          <div class="header">							
            <h3>Master Detil Barang (Mac Address Modem)</h3>
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
                  <input type="text" name="id_barang"  id="id_barang" class="form-control" onclick="javascript:openwindow();">
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Nama Modem</label>
                <div class="col-sm-6">
                  <input type="text" name="nama_barang" id="nama_barang" class="form-control" readonly="readonly" >
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-3 control-label">Merk</label>
                <div class="col-sm-4">
                  <input type="text" name="merk" id="merk" class="form-control" readonly="readonly"> 
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Jenis</label>
                <div class="col-sm-4">
                  <input type="text" name="jenis" id="jenis" class="form-control" readonly="readonly">
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Mac Address</label>
                <div class="col-sm-3">
                  <input type="text" name="mac"  class="form-control" maxlength="12">
                </div>
              </div>
			  
              <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-6">
				<input class="btn btn-danger" type="reset" name="reset" value="Reset" />
               
                  <input class="btn btn-prusia" type="submit" name="Submit" value="Submit" />
                </div>
              </div>
            </form>
          </div>

          </div>
        </div>
        
      </div>
	  
	  <div class="row">
				<div class="col-md-12">
					<div class="block block-color2 success">
						<div class="header">							
							<h3>Data Detil Modem</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Id Detil</th>
											<th>Mac Address</th>
											<th>Nama Modem</th>
											<th>Merk</th>
											<th>Jenis</th>
											<th>Status</th>
											<th></th>
										
											
										</tr>
									</thead>
									<tbody>
									<?php
										while ($detil = mysql_fetch_array($sql)){
										echo "
										<tr class='odd gradeX'>
											<td class='center'>$detil[id_detil]</td>
											<td class='center'>$detil[mac_address]</td>
											<td>$detil[nama_barang]</td>
											<td>$detil[merk]</td>											
											<td>$detil[nama_jenis]</td>
												<td>$detil[status]</td>
											  <td><div class='btn-group'>
												  <button type='button' class='btn btn-warning'>Action</button>
												  <button type='button' class='btn btn-warning btn-mono2 dropdown-toggle' data-toggle='dropdown'>
													<span class='caret'></span>
													<span class='sr-only'>Toggle Dropdown</span>
												  </button>
												  <ul class='dropdown-menu' role='menu'>
													<li><a href='?user=gudang&halaman=update_detil_barang&id_detil=$detil[id_detil]'>Edit</a></li>
													
													<li class='divider'></li>"; ?>
													<li><a  <?php echo "href=?user=gudang&halaman=hapus_detil_barang&id_detil=$detil[id_detil]"?> onClick="return confirm('Apakah Anda Yakin Hapus data?')"> Delete</a></li>
													
												  </ul>
												</div>	</td></tr>
				
										<?php
										}
										?>	
									</tbody>
								</table>							
							</div>
						</div>
					</div>				
				</div>
			</div>
			

 
	  
</div>
	

