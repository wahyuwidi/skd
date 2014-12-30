<!DOCTYPE html>
<?php
include('../../connect.php'); 
$sql = mysql_query("SELECT * FROM supplier ORDER BY id_supplier");

?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
	  
		<div class="row">
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-prusia">
				<div class="content"><h1 class="text-left">ALL</h1><p>Download semua data supplier</p></div>
				<div class="icon"><i class="fa fa-download"></i></div>
				<a class="details" href="halaman/pimpinan/cetak_supplier.php">Download <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-red">
				<div class="content">
				<form method="POST" action="halaman/pimpinan/cetak_supplier2.php">  
				
					<input type="text" name="keyword" class="form-control" placeholder="Masukkan Kata Kunci" >  
					
					<select name="kategori" placeholder="Pilih Kategori.." class="select2" style="width:150px;">  
					<option value=""></option>
					 <option value="nama_supplier">Nama Supplier</option>  
					 <option value="alamat">Alamat</option>  
					 <option value="phone">No Telp</option>  
					</select>  
				</div>
				<div class="icon"><i class="fa fa-download"></i></div>
				<button class="btn btn-rad btn-block btn-prusia btn-sm" type="submit">Download PDF</button>
				</form>
			</div>
			</div>
		
		</div>
		
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

