<!DOCTYPE html>
<?php
include('connect.php'); 

$sql = mysql_query("SELECT detil_barang. * ,barang.*, jenis_barang.nama_jenis, barang_keluar. * , retur.tgl_retur
FROM detil_barang
JOIN barang ON detil_barang.id_barang = barang.id_barang
JOIN jenis_barang ON barang.jenis = jenis_barang.id_jenis
LEFT OUTER JOIN barang_keluar ON detil_barang.id_detil = barang_keluar.id_detil
LEFT OUTER JOIN retur ON barang_keluar.id_keluar = retur.id_keluar

");

?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
                       <div class="row">
		<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-prusia">
				<div class="content"><h1 class="text-left">ALL</h1><p>Data Riwayat modem</p></div>
				<div class="icon"><i class="fa fa-download"></i></div>
				<a class="details" href="halaman/pimpinan/cetak_riwayat_modem.php">Download <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-red">
				<div class="content">
				<form method="POST" action="halaman/pimpinan/cetak_riwayat_modem2.php">  
				
					<input type="text" name="keyword" class="form-control" placeholder="Masukkan Kata Kunci" >  
					
					<select name="kategori" placeholder="Pilih Kategori.." class="select2" style="width:150px;">  
					<option value=""></option>
					<option value="mac_address">Mac Address</option> 
					 <option value="nama_barang">Nama Modem</option>  
					 <option value="merk">Merk</option>  
					 <option value="jenis">Jenis</option>
					 <option value="status">Status</option>
					<option value="tgl_instalasi">Tgl Keluar</option>
					<option value="no_telp">No Telp</option> 
					<option value="no_speedy">No Speedy</option> 					
					<option value="tgl_retur">Tgl retur</option> 
					
					 
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
											
											<th>Mac Address</th>
											<th>Nama Modem</th>											
											<th>Merk</th>
											<th>Jenis</th>	
											<th>Status</th>	
											<th>Tgl Keluar</th>
											<th>No Telp</th>
											<th>No Speedy</th>
											<th>Tgl Retur</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
										while ($detil = mysql_fetch_array($sql)){
										
										echo "

										<tr class='odd gradeX'>											
											<td class='center'>$detil[mac_address]</td>
											
											<td>$detil[nama_barang]</td>
											<td>$detil[merk]</td>
											<td>$detil[nama_jenis]</td>
											<td >$detil[status]</td>
											<td >$detil[tgl_instalasi]</td>
											<td >$detil[no_telp]</td>
											<td >$detil[no_speedy]</td>
											<td >$detil[tgl_retur]</td>";
																					
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

