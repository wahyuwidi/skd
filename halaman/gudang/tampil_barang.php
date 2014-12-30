<!DOCTYPE html>
<?php
include('connect.php'); 
$sql = mysql_query("SELECT * FROM barang ORDER BY id_barang");

?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
        

	  
	  <div class="row">
				<div class="col-md-12">
					<div class="block block-color2 success">
						<div class="header">							
							<h3>Data Modem</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Id Barang</th>
											<th>Nama Barang</th>
											<th>Merk</th>
											<th>Jenis</th>
											<th>Stock</th>
											<th></th>
											
										</tr>
									</thead>
									<tbody>
									<?php
										while ($barang = mysql_fetch_array($sql)){
										echo "
										<tr>
											<td class='center'>$barang[id_barang]</td>
											<td>$barang[nama_barang]</td>
											<td>$barang[merk]</td>";
											$sql2 = mysql_query("SELECT*FROM jenis_barang WHERE id_jenis = '$barang[jenis]'");
											$jenis = mysql_fetch_array($sql2);//pecah hasil query ke dalam array

										echo "<td>$jenis[nama_jenis]</td>
											  <td class='center'>$barang[stock]</td>
											  <td><a class='btn btn-prusia' href='?user=gudang&halaman=tampil_detil_barang2&id_barang=$barang[id_barang]'><i class='fa fa-eye'></i>Detil</a></td>
											 
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

