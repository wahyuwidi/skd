<!DOCTYPE html>
<?php
include('connect.php'); 
$sql = mysql_query("select retur.*, barang_keluar.*, detil_barang.*, barang.*, jenis_barang.* from
retur, barang_keluar, detil_barang, barang, jenis_barang where
retur.id_keluar=barang_keluar.id_keluar and barang_keluar.id_detil=detil_barang.id_detil and
detil_barang.id_barang=barang.id_barang and barang.jenis=jenis_barang.id_jenis");



$query = mysql_query("SELECT MAX(id_retur) AS id FROM retur");
$kode = mysql_fetch_array($query);
$max_id = $kode['id'];
$id_retur = (int) substr($max_id,3,4);
$id_retur++;
$NewID = "rtr".sprintf("%04s",$id_retur);

$tgl=getdate();
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
        <div class="block-flat purple-box">
          <div class="header">							
            <h3>Master Modem Retur</h3>
          </div>
          <div class="content">
             <form class="form-horizontal group-border-dashed" method="post" action="?user=karyawan&halaman=terima_barang_retur" style="border-radius: 0px;">
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Retur</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_retur" value="<?php echo $NewID?>" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Retur</label>
                <div class="col-sm-4">
                  <input type="text" name="tgl_retur" id="tanggal" class="form-control" value=<?php echo $tgl[year]."-".$tgl[mon]."-".$tgl[mday]?>>
                </div>
              </div>
             
 
			  <div class="form-group">
                <label class="col-sm-3 control-label">Modem Keluar</label>
                <div class="col-sm-6">
                  <input type="text" name="barang_keluar" id="barang_keluar" class="form-control" onclick="javascript:openwindow();" >
				  <input type="hidden" name="id_keluar" id="id_keluar" />
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
                  <input type="text" name="no_telp" id="no_telp" class="form-control" readonly="readonly">
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">No Speedy</label>
                <div class="col-sm-3">
                  <input type="text" name="no_speedy" id="no_speedy" class="form-control" readonly="readonly">
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
                  <input type="text" name="ket"  class="form-control" >
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
							<h3>Data Modem Retur</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Id Retur</th>
											<th>Tanggal Retur</th>
											<th>Mac Address</th>
											<th>Nama Barang</th>											
											<th>Merk</th>
											<th>Jenis</th>											
											<th>No Telp</th>
											<th>No Speedy</th>
											<th>Setter</th>
											<th>Keterangan</th>
											<th></th>
											
										</tr>
									</thead>
									<tbody>
									<?php
										while ($retur = mysql_fetch_array($sql)){
											
										echo "
										<tr class='odd gradeX'>
											<td class='center'>$retur[id_retur]</td>
											<td class='center'>$retur[tgl_retur]</td>
											<td>$retur[mac_address]</td>
											<td>$retur[nama_barang]</td>
											<td>$retur[merk]</td>
											<td>$retur[nama_jenis]</td>
											<td>$retur[no_telp]</td>
											<td>$retur[no_speedy]</td>
											<td>$retur[setter]</td>
											<td>$retur[ket]</td>
											<td><div class='btn-group'>
												  <button type='button' class='btn btn-warning'>Action</button>
												  <button type='button' class='btn btn-warning btn-mono2 dropdown-toggle' data-toggle='dropdown'>
													<span class='caret'></span>
													<span class='sr-only'>Toggle Dropdown</span>
												  </button>
												  <ul class='dropdown-menu' role='menu'>
												  
													<li><a href='?user=karyawan&halaman=update_barang_retur&id_retur=$retur[id_retur]'>Edit</a></li>
													
													<li class='divider'></li>"; ?>
													<li><a  <?php echo "href=?user=karyawan&halaman=hapus_barang_retur&id_retur=$retur[id_retur]"?> onClick="return confirm('Apakah Anda Yakin Hapus data?')"> Delete</a></li>
													
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
	

