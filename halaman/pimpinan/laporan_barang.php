<!DOCTYPE html>
<?php
include('connect.php'); 
$sql = mysql_query("SELECT * FROM barang ORDER BY id_barang");

?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
        <div class="row">
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-prusia">
				<div class="content"><h1 class="text-left">ALL</h1><p>Semua data modem</p></div>
				<div class="icon"><i class="fa fa-download"></i></div>
				<a class="details" href="halaman/pimpinan/cetak_barang.php">Download <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-red">
				<div class="content">
				<form method="POST" action="halaman/pimpinan/cetak_barang2.php">  
				
					<input type="text" name="keyword" class="form-control" placeholder="Masukkan Kata Kunci" >  
					
					<select name="kategori" placeholder="Pilih Kategori.." class="select2" style="width:150px;">  
					<option value=""></option>
					 <option value="nama_barang">Nama Modem</option>  
					 <option value="merk">Merk</option>  
					 <option value="jenis">Jenis</option>  
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
										$sql2 = mysql_query("SELECT*FROM jenis_barang WHERE id_jenis = '$barang[jenis]'");
										$jenis = mysql_fetch_array($sql2);//pecah hasil query ke dalam array
										echo "
										<tr>
											<td class='center'>$barang[id_barang]</td>
											<td>$barang[nama_barang]</td>
											<td>$barang[merk]</td>
											<td>$jenis[nama_jenis]</td>
											<td class='center'>$barang[stock]</td>
											<td><a class='btn btn-prusia' href='?user=pimpinan&halaman=laporan_detil_barang&id_barang=$barang[id_barang]'><i class='fa fa-eye'></i>Detil</a></td>
											 
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

