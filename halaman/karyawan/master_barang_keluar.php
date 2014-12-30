<!DOCTYPE html>
<?php
include('connect.php'); 
$sql2= mysql_query("select * from retur");
$retur= mysql_fetch_array($sql2);

$sql = mysql_query("select barang_keluar.*, detil_barang.*, barang.*  from barang_keluar, detil_barang,barang where barang_keluar.id_detil=detil_barang.id_detil and detil_barang.status='out' and detil_barang.id_barang=barang.id_barang ");


$query = mysql_query("SELECT MAX(id_keluar) AS id FROM barang_keluar");
$kode = mysql_fetch_array($query);
$max_id = $kode['id'];
$id_keluar = (int) substr($max_id,4,4);
$id_keluar++;
$NewID = "bOUT".sprintf("%04s",$id_keluar);

$tgl=getdate();
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
        <div class="block-flat purple-box">
          <div class="header">							
            <h3>Master Modem Keluar</h3>
          </div>
          <div class="content">
             <form class="form-horizontal group-border-dashed" method="post" action="?user=karyawan&halaman=terima_barang_keluar" style="border-radius: 0px;">
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Keluar</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_keluar" value="<?php echo $NewID?>" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Keluar</label>
                <div class="col-sm-4">
                  <input type="text" name="tgl_keluar" id="tanggal" class="form-control" value=<?php echo $tgl[year]."-".$tgl[mon]."-".$tgl[mday]?>>
                </div>
              </div>
             
 
			  <div class="form-group">
                <label class="col-sm-3 control-label">Modem</label>
                <div class="col-sm-6">
                  <input type="text" name="nama_barang" id="nama_barang" class="form-control" onclick="javascript:openwindow();" >
				  <input type="hidden" name="id_detil" id="id_detil" />
                </div>
              </div>
			   <div class="form-group">
                <label class="col-sm-3 control-label">Mac address</label>
                <div class="col-sm-4">
                  <input type="text" name="mac" id="mac" class="form-control" readonly="readonly"> 
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
                <label class="col-sm-3 control-label">No Telp</label>
                <div class="col-sm-3">
                  <input type="text" name="no_telp"  class="form-control" data-mask="phone" placeholder="(9999) 999999">
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">No Speedy</label>
                <div class="col-sm-3">
                  <input type="text" name="no_speedy"  class="form-control" >
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Setter</label>
                <div class="col-sm-3">
                  <input type="text" name="setter"  class="form-control" >
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Keterangan</label>
				<div class="col-sm-3">
                <select name="keterangan"  class="select2" style="width:200px;" tabindex="2">													
													<option value="PSB">PSB</option>
													<option value="ganti">Ganti</option>
													
											</select>
				
				</div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-6">
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
							<h3>Data Modem Keluar</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Id Keluar</th>
											<th>Tanggal</th>
											<th>Mac Address</th>
											<th>Modem</th>											
											<th>Merk</th>
											<th>No Telp</th>
											<th>No Speedy</th>
											<th>Setter</th>
											<th>Keterangan</th>
											<th></th>
											
										</tr>
									</thead>
									<tbody>
									<?php
										while ($keluar = mysql_fetch_array($sql)){
										
										echo "
										<tr class='odd gradeX'>
											<td class='center'>$keluar[id_keluar]</td>
											<td class='center'>$keluar[tgl_instalasi]</td>
											<td>$keluar[mac_address]</td>
											<td>$keluar[nama_barang]</td>
											<td>$keluar[merk]</td>
											<td>$keluar[no_telp]</td>
											<td>$keluar[no_speedy]</td>
											<td>$keluar[setter]</td>
											<td>$keluar[keterangan]</td>
											<td><div class='btn-group'>
												  <button type='button' class='btn btn-warning'>Action</button>
												  <button type='button' class='btn btn-warning btn-mono2 dropdown-toggle' data-toggle='dropdown'>
													<span class='caret'></span>
													<span class='sr-only'>Toggle Dropdown</span>
												  </button>
												  <ul class='dropdown-menu' role='menu'>
												  
													<li><a href='?user=karyawan&halaman=update_barang_keluar&id_keluar=$keluar[id_keluar]'>Edit</a></li>
													
													<li class='divider'></li>"; ?>
													<li><a  <?php echo "href=?user=karyawan&halaman=hapus_barang_keluar&id_keluar=$keluar[id_keluar]"?> onClick="return confirm('Apakah Anda Yakin Hapus data?')"> Delete</a></li>
													
												  </ul>
												</div>	
											</td>
										</tr>
				
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
	

