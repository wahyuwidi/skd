<!DOCTYPE html>
<?php
include('connect.php'); 
$sql = mysql_query("SELECT * FROM user ORDER BY nama");

?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
    <div class="row"> 
	<div class="col-sm-8 col-md-8">    
      <div class="block-flat purple-box">
          <div class="header">							
            <h3>User</h3>
          </div>
          <div class="content">
             <form class="form-horizontal group-border-dashed" method="post" action="?user=admin&halaman=terima_register" style="border-radius: 0px;">
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Lengkap</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Jabatan</label>
                <div class="col-sm-4">
                  <input type="text" name="jabatan" class="form-control">
                </div>
              </div>
			 
              <div class="form-group">
                <label class="col-sm-3 control-label">Username</label>
                <div class="col-sm-4">
                  <input type="text" name="username" class="form-control">
                </div>
              </div>
			   <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-4">
                  <input type="text" name="password" class="form-control">
                </div>
              </div>
			  <div class="form-group">
						<label class="col-sm-3 control-label">Hak Akses : </label>
						 <div class="col-sm-4">
						  <select name="level" data-placeholder="Pilih Level..." class="select2" style="width:250px;" tabindex="2">
													<option value=""></option>
													<option value="admin">Admin</option>
													<option value="gudang">Gudang</option>
													<option value="karyawan">Karyawan</option>
													<option value="pimpinan">Pimpinan</option>
													 
													
						</select>
			
						 </div>
					</div>
              <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-6">
				<input class="btn btn-danger" type="reset" name="Reset" value="Reset" />
                  <input class="btn btn-prusia" type="submit" name="Submit" value="Submit" />
                </div>
              </div>
            </form>
          </div>

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
											<td class='center'>$user[nama]</td>
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
											  <td><div class='btn-group'>
												  <button type='button' class='btn btn-warning'>Action</button>
												  <button type='button' class='btn btn-warning btn-mono2 dropdown-toggle' data-toggle='dropdown'>
													<span class='caret'></span>
													<span class='sr-only'>Toggle Dropdown</span>
												  </button>
												  <ul class='dropdown-menu' role='menu'>
											
													<li><a href='?user=admin&halaman=update_user&id_user=$user[id_user]'>Edit</a></li>
													
													<li class='divider'></li>"; ?>
													<li><a  <?php echo "href=?user=admin&halaman=hapus_user&id_user=$user[id_user]"?> onClick="return confirm('Apakah Anda Yakin Hapus data?')"> Delete</a></li>
													
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
	

