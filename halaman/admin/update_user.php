<!DOCTYPE html>
<?php
include('connect.php');  
$id_user = $_GET['id_user'];

$query = mysql_query("SELECT * FROM user WHERE id_user = '$id_user'");
$user = mysql_fetch_array($query);
?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
    <div class="row"> 
<div class="col-sm-8 col-md-8">    
        <div class="block-flat info-box">
          <div class="header">							
            <h3>Edit User</h3>
          </div>
          <div class="content">
            <form class="form-horizontal group-border-dashed" method="post" action="?user=admin&halaman=terima_update_user" style="border-radius: 0px;">
			 <input type="hidden" name="id_user" value="<?php echo $id_user?>">
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Lengkap</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama" value="<?php echo $user['nama']?>" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Jabatan</label>
                <div class="col-sm-4">
                  <input type="text" name="jabatan" class="form-control" value="<?php echo $user['jabatan']?>">
                </div>
              </div>
			 
              <div class="form-group">
                <label class="col-sm-3 control-label">Username</label>
                <div class="col-sm-4">
                  <input type="text" name="username" class="form-control" value="<?php echo $user['username']?>">
                </div>
              </div>
			   <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-4">
                  <input type="text" name="password" class="form-control" value="<?php echo $user['password']?>">
                </div>
              </div>
			 <div class="form-group">
						<label class="col-sm-3 control-label">Hak Akses : </label>
						 <div class="col-sm-4">
						  <select name="level" data-placeholder="Pilih Level..." class="select2" style="width:250px;" tabindex="2">
													<option selected="selected"><?php echo $user['level']?></option>
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
                  <input class="btn btn-danger" type="submit" name="Submit" value="Update" />
                </div>
              </div>
            </form>
          </div>

          </div>
        </div>
        
      </div>
	  
	 
			</div>


