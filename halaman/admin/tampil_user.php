<!DOCTYPE html>
<?php
include('connect.php'); 
$sql = mysql_query("SELECT * FROM user ORDER BY nama");

?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
	  
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
			
			               <!-- Nifty Modal -->
                <div class="md-modal colored-header custom-width md-effect-9" id="form-primary">
                    <div class="md-content">
                      <div class="modal-header">
                        <h3>Jenis Barang</h3>
                        <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      </div>
                      <div class="modal-body form">
					  <form method="post" action="?user=admin&halaman=terima_jenis">
                        <div class="form-group">
                          <label>Id Jenis</label> <input type="text" class="form-control" name="id_jenis" value="<?php echo $NewID2?>" readonly="readonly">
                        </div>
                        <div class="form-group">
                          <label>Nama Jenis</label> <input type="text"  name="nama_jenis" class="form-control">
                        </div>
                     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-flat md-close" name="Submit" value="Submit" data-dismiss="modal">OK</button>
                      </div>
                    </div>
					</form>
                </div>
 
	  
</div>
	

