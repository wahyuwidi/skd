<!DOCTYPE html>
<?php
include('connect.php'); 
$sql = mysql_query("select retur.*, barang_keluar.*, detil_barang.*, barang.*, jenis_barang.* from
retur, barang_keluar, detil_barang, barang, jenis_barang where
retur.id_keluar=barang_keluar.id_keluar and barang_keluar.id_detil=detil_barang.id_detil and
detil_barang.id_barang=barang.id_barang and barang.jenis=jenis_barang.id_jenis");


?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
        

	  
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
										</tr>";
											
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

