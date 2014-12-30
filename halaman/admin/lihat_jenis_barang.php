<!DOCTYPE html>
<?php
include('connect.php'); 
$sql = mysql_query("SELECT * FROM jenis_barang ORDER BY id_jenis");
?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
   
	  
	  <div class="row">
				<div class="col-md-12">
					<div class="block block-color2 success">
						<div class="header">							
							<h3>Jenis Barang</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Id Jenis</th>
											<th>Nama Jenis</th>
											
											
										</tr>
									</thead>
									<tbody>
									<?php
										while ($jenis = mysql_fetch_array($sql)){
										echo "
										<tr class='odd gradeX'>
											<td class='center'>$jenis[id_jenis]</td>
											<td>$jenis[nama_jenis]</td>
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


