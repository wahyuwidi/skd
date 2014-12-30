<!DOCTYPE html>
<?php
include('connect.php'); 
$id_barang = $_GET['id_barang'];

$sql6 = mysql_query("SELECT * FROM barang_masuk where id_barang='$id_barang'");
$masuk= mysql_fetch_array($sql6);

$sql = mysql_query("SELECT * FROM detil_barang where id_masuk='$masuk[id_masuk]'");


$sql2 = mysql_query("SELECT * FROM barang where id_barang='$id_barang'");
$barangg = mysql_fetch_array($sql2);

$sql5 = mysql_query("SELECT * FROM jenis_barang where id_jenis='$barangg[jenis]'");
$jeniss = mysql_fetch_array($sql5);


?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
        
<div class="row"> 
<div class="col-md-12 spacer"><h2> <?php echo $barangg['nama_barang']?></h2><br></div>
      
	   <div class="col-md-3 col-sm-6">
        <div class="fd-tile detail tile-prusia">
          <div class="content"><h2 class="text-left"><?php echo $id_barang?></h2><p><?php echo $barangg['merk']?></p><p><?php echo $jeniss['nama_jenis']?></p></div>
          <div class="icon"><i class="fa fa-shield"></i></div>
        
		  <a class="details" href='?user=karyawan&halaman=tampil_barang'>Back <span><i class="fa fa-arrow-circle-left pull-right"></i></span></a>
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
											<th>No. S/N</th>	
											<th>Status</th>		
											
											
										</tr>
									</thead>
									<tbody>
										<?php
										while ($detil = mysql_fetch_array($sql)){
										$sql3 = mysql_query("SELECT*FROM barang_masuk WHERE id_masuk = '$detil[id_masuk]'");
										$masuk = mysql_fetch_array($sql3);
										$sql4 = mysql_query("SELECT*FROM barang WHERE id_barang = '$masuk[id_barang]'");
										$barang = mysql_fetch_array($sql4);
										$sql1 = mysql_query("SELECT*FROM jenis_barang WHERE id_jenis = '$barang[jenis]'");
										$jenis = mysql_fetch_array($sql1);
										echo "

										<tr class='odd gradeX'>
											<td class='center'>$detil[id_detil]</td>
											<td class='center'>$detil[mac_address]</td>
											<td>$barang[nama_barang]</td>
											<td>$barang[merk]</td>
											<td>$jenis[nama_jenis]</td>

											<td class='center'>$detil[no_SN]</td>
											<td >$detil[status]</td>";
										
											
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

