<!DOCTYPE html>
<?php
include('connect.php'); 

$sql2 = mysql_query("SELECT detil_barang.*, barang.*, jenis_barang.* FROM detil_barang, barang, jenis_barang
where detil_barang.id_barang=barang.id_barang and barang.jenis=jenis_barang.id_jenis");
?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
            <div class="row">
	
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-prusia">
				<div class="content"><h1 class="text-left">ALL</h1><p>Semua data</p></div>
				<div class="icon"><i class="fa fa-download"></i></div>
				<a class="details" href="halaman/pimpinan/cetak_detil_barang_all.php">Download PDF <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>

			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-red">
				<div class="content">
				<form method="POST" action="halaman/pimpinan/cetak_detil_barang_berdasar.php">  
					<input type="text" name="keyword" class="form-control" placeholder="Masukkan Kata Kunci" >  
					
					<select name="kategori" placeholder="Pilih Kategori.." class="select2" style="width:150px;">  
					<option value=""></option>
					<option value="id_detil">Id Detil</option>
					 <option value="nama_barang">Nama Modem</option>  
					 <option value="merk">Merk</option>  
					 <option value="jenis">Jenis</option>
					 <option value="status">Status</option>					 
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
										while ($detil = mysql_fetch_array($sql2)){
										echo "

										<tr class='odd gradeX'>
											<td class='center'>$detil[id_detil]</td>
											<td class='center'>$detil[mac_address]</td>
											<td>$detil[nama_barang]</td>
											<td>$detil[merk]</td>											
											<td>$detil[nama_jenis]</td>
												<td>$detil[status]</td>
												
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

