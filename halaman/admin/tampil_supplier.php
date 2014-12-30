<!DOCTYPE html>
<?php
include('../../connect.php'); 
$sql = mysql_query("SELECT * FROM supplier ORDER BY id_supplier");

?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
	  
	  <div class="row">
				<div class="col-md-12">
					<div class="block block-color2 success">
						<div class="header">							
							<h3>Data Supplier</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Id Supplier</th>
											<th>Nama Supplier</th>
											<th>Alamat</th>
											<th>No. Telp</th>
											
										
											
										</tr>
									</thead>
									<tbody>
									<?php
										while ($supplier = mysql_fetch_array($sql)){
										echo "
										<tr class='gradeA'>
											<td class='center'>$supplier[id_supplier]</td>
											<td>$supplier[nama_supplier]</td>
											<td>$supplier[alamat_supplier]</td>
											<td>$supplier[phone]</td>
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

