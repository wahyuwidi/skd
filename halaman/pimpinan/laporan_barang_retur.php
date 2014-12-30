<!DOCTYPE html>
<?php
include('connect.php'); 
$sql = mysql_query("SELECT * FROM retur ORDER BY id_retur");

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
				<a class="details" href="?user=pimpinan&halaman=laporan_barang_retur">Go <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
	  	  
			<form name="formcetak" action="halaman/pimpinan/cetak_barang_retur.php" method="post">
				<input type="hidden" name="tanggal_awal" id="tanggal"  value="<?php echo $tanggal_awal?> "/>
				<input type="hidden" name="tanggal_akhir" id="tanggal2"  value="<?php echo $tanggal_akhir?> "/>
												
												
		  
				<div class="col-md-3 col-sm-6">
				<div class="fd-tile detail tile-concrete">
					<div class="content"><h1 class="text-left">Download</h1><p>Cetak berdasarkan tanggal</p></div>
					<div class="icon"><i class="fa fa-download"></i></div>
					<button class="btn btn-rad btn-block btn-prusia btn-sm" type="submit">Download PDF</button>
				</div>
				</div>
			</form>
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-red">
				<div class="content">
				<form method="POST" action="halaman/pimpinan/cetak_barang_retur.php">  
				<input type="hidden" name="tanggal_awal" id="tanggal"  value="<?php echo $tanggal_awal?> "/>
				<input type="hidden" name="tanggal_akhir" id="tanggal2"  value="<?php echo $tanggal_akhir?> "/>
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
					<option value="supplier">Supplier</option>
					
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
				<div class="content"><h1 class="text-left">ALL</h1><p>Semua data</p></div>
				<div class="icon"><i class="fa fa-download"></i></div>
				<a class="details" href="halaman/pimpinan/cetak_barang_retur2.php">Download PDF <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
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
				<form method="POST" action="halaman/pimpinan/cetak_barang_retur3.php">  
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
                        <h3>Laporan Berdasarkan Tanggal</h3>
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
		if ($tanggal_awal=='' and $tanggal_akhir==''){$sql2 = mysql_query("SELECT * FROM retur ORDER BY id_retur"); $sampai= 'SEMUA DATA';}
		else { $sql2 = mysql_query("SELECT * FROM retur where tgl_retur between '$tanggal_awal' and '$tanggal_akhir'");  $sampai='sampai';}
	?>  


	  
	  <div class="row">
				<div class="col-md-12">
					<div class="block block-color2 success">
						<div class="header">							
							<h3>DATA MODEM RETUR (PENGEMBALIAN) <?php echo $_POST['tanggal_awal']."  ".$sampai." ".$_POST['tanggal_akhir']; ?></h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Tanggal Retur</th>
											<th>Mac Address</th>
											<th>Nama Barang</th>											
											<th>Merk</th>
											<th>Jenis</th>											
											<th>No Telp</th>
											<th>No Speedy</th>
											<th>Setter</th>
											<th>Supplier</th>
											<th>Keterangan</th>
											
										</tr>
									</thead>
									<tbody>
									<?php
										while ($retur = mysql_fetch_array($sql2)){
										
											$sql3 = mysql_query("SELECT*FROM barang_keluar WHERE id_keluar = '$retur[id_keluar]'");
											$keluar = mysql_fetch_array($sql3);//pecah hasil query ke dalam array

											$sql4 = mysql_query("SELECT*FROM detil_barang WHERE id_detil = '$keluar[id_detil]'");
											$detil = mysql_fetch_array($sql4);//pecah hasil query ke dalam array
											
											$sql5 = mysql_query("SELECT*FROM barang WHERE id_barang = '$detil[id_barang]'");
											$barang = mysql_fetch_array($sql5);//pecah hasil query ke dalam array
											
											$sql6 = mysql_query("SELECT*FROM jenis_barang WHERE id_jenis = '$barang[jenis]'");
											$jenis = mysql_fetch_array($sql6);//pecah hasil query ke dalam array
										
											
											echo "
										<tr class='odd gradeX'>
											<td class='center'>$retur[id_retur]</td>
											<td class='center'>$retur[tgl_retur]</td>
											<td>$detil[mac_address]</td>
											<td>$barang[nama_barang]</td>
											<td>$barang[merk]</td>
											<td>$jenis[nama_jenis]</td>
											<td>$keluar[no_telp]</td>
											<td>$keluar[no_speedy]</td>
											<td>$retur[setter]</td>
											<td>$retur[ket]</td>
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

