<!DOCTYPE html>
<?php
include('connect.php'); 
$sql = mysql_query("SELECT * FROM barang_masuk ORDER BY id_masuk");

?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
        

	  
	  <div class="row">
				<div class="col-md-12">
					<div class="block block-color2 success">
						<div class="header">							
							<h3>Data  Barang Masuk</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Id Masuk</th>
											<th>Tanggal</th>
											<th>Supplier</th>
											<th>Nama Barang</th>											
											<th>Merk</th>
											<th>Jenis</th>
											<th>Jumlah</th>
											
										</tr>
									</thead>
									<tbody>
									<?php
									while ($masuk = mysql_fetch_array($sql)){
										$sql5 = mysql_query("SELECT*FROM supplier WHERE id_supplier = '$masuk[id_supplier]'");
										$supplier = mysql_fetch_array($sql5);//pecah hasil query ke dalam array
										$sql3 = mysql_query("SELECT*FROM barang WHERE id_barang = '$masuk[id_barang]'");
										$barang = mysql_fetch_array($sql3);//pecah hasil query ke dalam array
										$sql4 = mysql_query("SELECT*FROM jenis_barang WHERE id_jenis = '$barang[jenis]'");
										$jenis = mysql_fetch_array($sql4);//pecah hasil query ke dalam array
										echo "
										<tr class='odd gradeX'>
											<td class='center'>$masuk[id_masuk]</td>
											<td class='center'>$masuk[tgl_masuk]</td>
											<td>$supplier[nama_supplier]</td>
											<td>$barang[nama_barang]</td>
											<td>$barang[merk]</td>
											<td>$jenis[nama_jenis]</td>
											<td class='center'>$masuk[jumlah]</td>
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

