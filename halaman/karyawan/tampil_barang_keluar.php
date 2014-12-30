<!DOCTYPE html>
<?php
include('connect.php'); 

$sql = mysql_query("select barang_keluar.*, detil_barang.*, barang.* , jenis_barang.* from barang_keluar, detil_barang,barang, jenis_barang where barang_keluar.id_detil=detil_barang.id_detil and barang.jenis=jenis_barang.id_jenis and detil_barang.status='out' and detil_barang.id_barang=barang.id_barang ");
											

?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
        

	  
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
											<th>Nama Modem</th>	
											<th>Jenis</th>												
											<th>Merk</th>
											<th>No Telp</th>
											<th>No Speedy</th>
											<th>Setter</th>
											<th>Keterangan</th>
											
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
											<td>$keluar[nama_jenis]</td>
											<td>$keluar[merk]</td>
											<td>$keluar[no_telp]</td>
											<td>$keluar[no_speedy]</td>
											<td>$keluar[setter]</td>
											<td>$keluar[keterangan]</td>
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

