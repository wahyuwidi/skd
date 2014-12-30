<!DOCTYPE html>
<?php
include('connect.php'); 
error_reporting(0);
$sql = mysql_query("SELECT * FROM barang_masuk ORDER BY id_masuk DESC");
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
				<a class="details" href="?user=pimpinan&halaman=laporan_barang_masuk">Go <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
	  	  
			<form name="formcetak" action="halaman/pimpinan/cetak_barang_masuk.php" method="post">
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
				<form method="POST" action="halaman/pimpinan/cetak_barang_masuk.php">  
				<input type="hidden" name="tanggal_awal" id="tanggal"  value="<?php echo $tanggal_awal?> "/>
				<input type="hidden" name="tanggal_akhir" id="tanggal2"  value="<?php echo $tanggal_akhir?> "/>
					<input type="text" name="keyword" class="form-control" placeholder="Masukkan Kata Kunci" >  
					
					<select name="kategori" placeholder="Pilih Kategori.." class="select2" style="width:150px;">  
					<option value=""></option>
					 <option value="tgl_masuk">Tanggal</option>
					 <option value="nama_supplier">Supplier</option>  
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
			
		<?php } else if (!isset($_POST['tanggal_awal'])){ ?> 
			<div class="col-md-2 col-sm-6">
			<div class="fd-tile detail tile-prusia">
				<div class="content"><h1 class="text-left">ALL</h1><p>Semua data</p></div>
				<div class="icon"><i class="fa fa-download"></i></div>
				<a class="details" href="halaman/pimpinan/cetak_barang_masuk2.php">Download PDF <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-concrete">
				<div class="content"><h1 class="text-left">DATE</h1><p>Tampilkan berdasarkan periode tanggal</p></div>
				<div class="icon"><i class="fa fa-eye"></i></div>
				<a class="details md-trigger"  href="#" data-modal="form-primary">Go <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-red">
				<div class="content">
				<form method="POST" action="halaman/pimpinan/cetak_barang_masuk3.php">  
					<input type="text" name="keyword" class="form-control" placeholder="Masukkan Kata Kunci" >  
					
					<select name="kategori" placeholder="Pilih Kategori.." class="select2" style="width:150px;">  
					<option value=""></option>
					 <option value="tgl_masuk">Tanggal</option>
					 <option value="nama_supplier">Supplier</option>  
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
					  <form method="post" action="" name="periode_form">
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
		if ($tanggal_awal=='' and $tanggal_akhir==''){$sql2 = mysql_query("SELECT * FROM barang_masuk ORDER BY id_masuk"); $sampai= 'SEMUA DATA';}
		else { $sql2 = mysql_query("SELECT * FROM barang_masuk where tgl_masuk between '$tanggal_awal' and '$tanggal_akhir'");  $sampai='sampai';}
	?>
	  	  
	  <div class="row">
				<div class="col-md-12">
					<div class="block block-color2 success">
						<div class="header">							
							<h3>DATA BARANG MASUK <?php echo $_POST['tanggal_awal']."  ".$sampai." ".$_POST['tanggal_akhir']; ?></</h3>
						</div>
						<div class="content">
						
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											
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
											while ($masuk = mysql_fetch_array($sql2)){
										echo "
										<tr class='odd gradeX'>
											
											<td class='center'>$masuk[tgl_masuk]</td>";
											$sql5 = mysql_query("SELECT*FROM supplier WHERE id_supplier = '$masuk[id_supplier]'");
											$supplier = mysql_fetch_array($sql5);//pecah hasil query ke dalam array

											echo"<td>$supplier[nama_supplier]</td>";
											$sql3 = mysql_query("SELECT*FROM barang WHERE id_barang = '$masuk[id_barang]'");
											$barang = mysql_fetch_array($sql3);//pecah hasil query ke dalam array
											echo "<td>$barang[nama_barang]</td>
											<td>$barang[merk]</td>";
											
											$sql4 = mysql_query("SELECT*FROM jenis_barang WHERE id_jenis = '$barang[jenis]'");
											$jenis = mysql_fetch_array($sql4);//pecah hasil query ke dalam array
										echo "<td>$jenis[nama_jenis]</td>
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

