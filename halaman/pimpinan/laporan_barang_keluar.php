<!DOCTYPE html>
<?php
include('connect.php'); 

$sql = mysql_query("select barang_keluar.*, detil_barang.*, barang.* , jenis_barang.* from barang_keluar, detil_barang,barang, jenis_barang where barang_keluar.id_detil=detil_barang.id_detil and barang.jenis=jenis_barang.id_jenis and detil_barang.status='out' and detil_barang.id_barang=barang.id_barang ");

$tanggal_awal = $_POST['tanggal_awal'];
$tanggal_akhir = $_POST['tanggal_akhir'];

?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
        <div class="row">
		
		<?php if(isset($_POST['tanggal_awal'])){?>	
			<div class="col-md-2 col-sm-6">
			<div class="fd-tile detail tile-prusia">
				<div class="content"><h1 class="text-left">ALL</h1><p>Tampilkan semua data</p></div>
				<div class="icon"><i class="fa fa-eye"></i></div>
				<a class="details" href="?user=pimpinan&halaman=laporan_barang_keluar">Go <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
	  	  
			<form name="formcetak" action="halaman/pimpinan/cetak_barang_keluar.php" method="post">
				<input type="hidden" name="tanggal_awal" id="tanggal"  value="<?php echo $tanggal_awal?> "/>
				<input type="hidden" name="tanggal_akhir" id="tanggal2"  value="<?php echo $tanggal_akhir?> "/>
														  
				<div class="col-md-3 col-sm-6">
				<div class="fd-tile detail tile-concrete">
					<div class="content"><h1 class="text-left">Download</h1><p>Berdasarkan periode tanggal</p></div>
					<div class="icon"><i class="fa fa-download"></i></div>
					<button class="btn btn-rad btn-block btn-prusia btn-sm" type="submit">Download PDF</button>
				</div>
				</div>
			</form>
			
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-red">
				<div class="content">
				<form method="POST" action="halaman/pimpinan/cetak_barang_keluar.php">  
				<input type="hidden" name="tanggal_awal" id="tanggal"  value="<?php echo $tanggal_awal?> "/>
				<input type="hidden" name="tanggal_akhir" id="tanggal2"  value="<?php echo $tanggal_akhir?> "/>
					<input type="text" name="keyword" class="form-control" placeholder="Masukkan Kata Kunci" >  
					
					<select name="kategori" placeholder="Pilih Kategori.." class="select2" style="width:150px;">  
					<option value=""></option>
					<option value="id_keluar">ID Keluar</option>
					 <option value="tgl_instalasi">Tanggal</option> 
					 <option value="mac_address">Mac Address</option>
					 <option value="nama_barang">Nama Modem</option> 					 
					 <option value="merk">Merk</option>  
					 <option value="jenis">Jenis</option>					
					<option value="no_telp">No Telp</option> 
					<option value="no_speedy">No Speedy</option>
					<option value="setter">Setter</option> 
					
					</select>  
				</div>
				<div class="icon"><i class="fa fa-download"></i></div>
				<button class="btn btn-rad btn-block btn-prusia btn-sm" type="submit">Download PDF</button>
				</form>
			</div>
			</div>
			
		<?php } else if (!isset($_POST['tanggal_awal'])){ ?> 
			<div class="col-md-2 col-sm-6">
			<div class="fd-tile detail tile-prusia">
				<div class="content"><h1 class="text-left">ALL</h1><p>Cetak semua data</p></div>
				<div class="icon"><i class="fa fa-download"></i></div>
				<a class="details" href="halaman/pimpinan/cetak_barang_keluar2.php">Download PDF <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-concrete">
				<div class="content"><h1 class="text-left">DATE</h1><p>Tampilkan berdasarkan tanggal</p></div>
				<div class="icon"><i class="fa fa-eye"></i></div>
				<a class="details md-trigger"  href="#" data-modal="form-primary">Go <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-red">
				<div class="content">
				<form method="POST" action="halaman/pimpinan/cetak_barang_keluar3.php">  
						<input type="text" name="keyword" class="form-control" placeholder="Masukkan Kata Kunci" >  
					
					<select name="kategori" placeholder="Pilih Kategori.." class="select2" style="width:150px;">  
					<option value=""></option>
					 <option value="tgl_instalasi">Tanggal</option>
					 <option value="nama_barang">Nama Modem</option>  
					 <option value="merk">Merk</option>  
					 <option value="jenis">Jenis</option>
					 <option value="mac_address">Mac Address</option>
					<option value="no_telp">No Telp</option> 
					<option value="no_speedy">No Speedy</option>
					<option value="setter">Setter</option> 
					
					</select>  
				</div>
				<div class="icon"><i class="fa fa-download"></i></div>
				<button class="btn btn-rad btn-block btn-prusia btn-sm" type="submit">Download PDF</button>
				</form>
			</div>
			</div>
	  
		<?php } ?>
	
	  </div>
	   <!-- Nifty Modal -->
                <div class="md-modal md-dark danger custom-width md-effect-9" id="form-primary">
                    <div class="md-content">
                      <div class="modal-header">
                        <h3>Laporan Berdasarkan Periode Tanggal</h3>
                        <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      </div>
                      <div class="modal-body form">
					  <form method="post" action="">
                        <div class="form-group">
                          <label>Tanggal</label> <input type="text" class="form-control" name="tanggal_awal" id="tanggal">
                        </div>
                        <div class="form-group">
                          <label>Sampai</label> <input type="text"  name="tanggal_akhir" class="form-control" id="tanggal2">
                        </div>
                     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-flat md-close" name="submit" value="Submit" data-dismiss="modal">OK</button>
                      </div>
                    </div>
					</form>
                </div>
			
	<?php 
		if ($tanggal_awal=='' and $tanggal_akhir==''){$sql2 = mysql_query("select barang_keluar.*, detil_barang.*, barang.* , jenis_barang.* from barang_keluar, detil_barang,barang, jenis_barang where barang_keluar.id_detil=detil_barang.id_detil and barang.jenis=jenis_barang.id_jenis and detil_barang.status='out' and detil_barang.id_barang=barang.id_barang"); $sampai= 'SEMUA DATA';}
		else { $sql2 = mysql_query("select barang_keluar.*, detil_barang.*, barang.* , jenis_barang.* from barang_keluar, detil_barang,barang, jenis_barang where barang_keluar.id_detil=detil_barang.id_detil and barang.jenis=jenis_barang.id_jenis and detil_barang.status='out' and detil_barang.id_barang=barang.id_barang and tgl_instalasi between '$tanggal_awal' and '$tanggal_akhir'");  $sampai='sampai';}
	?>  

	  
	  <div class="row">
				<div class="col-md-12">
					<div class="block block-color2 success">
						<div class="header">							
							<h3>DATA MODEM KELUAR <?php echo $_POST['tanggal_awal']."  ".$sampai." ".$_POST['tanggal_akhir']; ?></h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Id Keluar</th>
											<th>Tanggal</th>
											<th>Mac Address</th>
											<th>Nama Modem</th>	
											<th>Jenis</th>												
											<th>Merk</th>
											<th>No Telp</th>
											<th>No Speedy</th>
											<th>Setter</th>
											<th>Keterangan</th>
											
											
										</tr>
									</thead>
									<tbody>
									<?php
										while ($keluar = mysql_fetch_array($sql2)){
										echo "
										<td class='center'>$keluar[id_keluar]</td>
											<td class='center'>$keluar[tgl_instalasi]</td>
											<td>$keluar[mac_address]</td>
											<td>$keluar[nama_barang]</td>
											<td>$keluar[nama_jenis]</td>
											<td>$keluar[merk]</td>
											<td>$keluar[no_telp]</td>
											<td>$keluar[no_speedy]</td>
											<td>$keluar[setter]</td>
											<td>$keluar[keterangan]</td>
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

