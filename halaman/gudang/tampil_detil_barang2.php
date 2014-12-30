<!DOCTYPE html>
<?php
include('connect.php'); 
$id_barang = $_GET['id_barang'];


$query = mysql_query("SELECT detil_barang.*, jenis_barang.*, barang.* from detil_barang, barang, jenis_barang where barang.id_barang='$id_barang' and detil_barang.id_barang='$id_barang' and jenis_barang.id_jenis=barang.jenis");

$sql = mysql_query("SELECT detil_barang.*, barang.*, jenis_barang.* FROM detil_barang, barang, jenis_barang where detil_barang.id_barang='$id_barang' and barang.id_barang='$id_barang' and jenis_barang.id_jenis=barang.jenis");
$detill=mysql_fetch_array($sql);


$sql_available = mysql_query("SELECT count(status) as available FROM detil_barang where id_barang='$detill[id_barang]' and status='available'");
$available=mysql_fetch_array($sql_available);

$sql_out = mysql_query("SELECT count(status) as outt FROM detil_barang where id_barang='$detill[id_barang]' and status='out'");
$outt=mysql_fetch_array($sql_out);

$sql_retur = mysql_query("SELECT count(status) as returr FROM detil_barang where id_barang='$detill[id_barang]' and status='retur'");
$returr=mysql_fetch_array($sql_retur);


?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
        
<div class="row">
				<div class="col-sm-4 col-md-4">
					<div class="block block-color2 primary ">
						<div class="header">
							<h3><?php echo $detill['nama_barang']?></h3>
						</div>
						<div class="content">
							<table class="no-border">
								
								<tbody class="no-border-x no-border-y">
									<tr>
										<td class="text-right">Id Barang</td>
										<td class="text-center">:</td>
										<td ><?php echo $id_barang?></td>
									</tr>
									
									<tr>
										<td class="text-right">Merk</td>
										<td class="text-center">:</td>
										<td><?php echo $detill['merk']?></td>
									</tr>
									<tr>
										<td class="text-right">Jenis</td>
										<td class="text-center">:</td>
										<td><?php echo $detill['nama_jenis']?></td>
									</tr>
									<tr>
										<td class="text-right">Jumlah</td>
										<td class="text-center">:</td>
										<td><?php echo $detill['total']?></td>
									</tr>
									<tr>
										<td class="text-right">Stock</td>
										<td class="text-center">:</td>
										<td ><?php echo $detill['stock']?></td>
									</tr>
									<tr>
										<td class="text-right">Belum Terdaftar</td>
										<td class="text-center">:</td>
										<td ><?php echo $detill['sisa_detil']?></td>
									</tr>
									<tr>
										<td class="text-right">Available</td>
										<td class="text-center">:</td>
										<td><?php echo $available['available']?></td>
									</tr>
									<tr>
										<td class="text-right">Out</td>
										<td class="text-center">:</td>
										<td><?php echo $outt['outt']?></td>
									</tr>
									<tr>
										<td class="text-right">Retur</td>
										<td class="text-center">:</td>
										<td><?php echo $returr['returr']?></td>
									</tr>
									
								</tbody>
							</table>
							</br>
							<a class='btn btn-block btn-prusia' href='?user=gudang&halaman=tampil_barang'>Back</a>
						</div>
					</div>
					</div></div>
	  
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
											<th></th>
											
											
										</tr>
									</thead>
									<tbody>
										<?php
										while ($detil = mysql_fetch_array($query)){
										
										echo "

										<tr class='odd gradeX'>
											<td class='center'>$detil[id_detil]</td>
											<td class='center'>$detil[mac_address]</td>
											<td>$detil[nama_barang]</td>
											<td>$detil[merk]</td>
											<td>$detil[nama_jenis]</td>
											<td >$detil[status]</td>
											 <td><div class='btn-group'>
												  <button type='button' class='btn btn-warning'>Action</button>
												  <button type='button' class='btn btn-warning btn-mono2 dropdown-toggle' data-toggle='dropdown'>
													<span class='caret'></span>
													<span class='sr-only'>Toggle Dropdown</span>
												  </button>
												  <ul class='dropdown-menu' role='menu'>
													<li><a href='?user=gudang&halaman=update_detil_barang&id_detil=$detil[id_detil]'>Edit</a></li>
													
													<li class='divider'></li>"; ?>
													<li><a  <?php echo "href=?user=gudang&halaman=hapus_detil_barang&id_detil=$detil[id_detil]"?> onClick="return confirm('Apakah Anda Yakin Hapus data?')"> Delete</a></li>
													
												  </ul>
												</div>	</td></tr>
				
										<?php
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

