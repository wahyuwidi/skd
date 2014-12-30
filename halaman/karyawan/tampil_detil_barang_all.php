<!DOCTYPE html>
<?php
include('connect.php'); 

$sql = mysql_query("SELECT detil_barang.*, barang.*, jenis_barang.* FROM detil_barang, barang, jenis_barang
where detil_barang.id_barang=barang.id_barang and barang.jenis=jenis_barang.id_jenis ");


?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
        

	  
	  <div class="row">
				<div class="col-md-12">
					<div class="block block-color2 success">
						<div class="header">							
							<h3>Detil Barang (Mac Address Modem)</h3>
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
												<td>$detil[status]</td>";
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

