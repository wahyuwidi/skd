<!DOCTYPE html>
<?php
include('connect.php'); 
$sql = mysql_query("SELECT * FROM user ORDER BY nama");

?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
	  <div class="row">
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-prusia">
				<div class="content"><h1 class="text-left">ALL</h1><p>Download semua data user</p></div>
				<div class="icon"><i class="fa fa-download"></i></div>
				<a class="details" href="halaman/pimpinan/cetak_user.php">Download <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-red">
				<div class="content">
				<form method="POST" action="halaman/pimpinan/cetak_user_2.php">  
				
					<input type="text" name="keyword" class="form-control" placeholder="Masukkan Kata Kunci" >  
					
					<select name="kategori" placeholder="Pilih Kategori.." class="select2" style="width:150px;">  
					<option value=""></option>
					 <option value="jabatan">Jabatan</option>  
					 <option value="level">Hak Akses</option>  
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
							<h3>Data User</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Nama Lengkap</th>
											<th>Jabatan</th>
											<th>Username</th>
											<th>Password</th>
											<th>Hak Akses</th>
											<th></th>
											
										</tr>
									</thead>
									<tbody>
									<?php
										while ($user = mysql_fetch_array($sql)){
										echo "
										<tr>
											<td>$user[nama]</td>
											<td>$user[jabatan]</td>
											<td>$user[username]</td>
											<td>$user[password]</td>
											  <td>$user[level]</td>
											 <td class='center'>
											 <form method='POST' action='halaman/pimpinan/cetak_user_3.php'>
											 <input type='hidden' name='id_user' value='$user[id_user]' >
											 
											 <button  class='btn btn-prusia'  type='submit'><i class='fa fa-print'></i>Cetak</button>
											 </form>
											 </td>
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
	

