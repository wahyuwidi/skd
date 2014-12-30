<!DOCTYPE html>
<?php
include('connect.php'); 
$sql = mysql_query("SELECT * FROM jenis_barang ORDER BY id_jenis");

$query = mysql_query("SELECT MAX(id_jenis) AS id FROM jenis_barang");
$kode = mysql_fetch_array($query);
$max_id = $kode['id'];
$id_jenis = (int) substr($max_id,3,4);
$id_jenis++;
$NewID = "JNS".sprintf("%04s",$id_jenis);
?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
    <div class="row"> 
<div class="col-sm-8 col-md-8">    
        <div class="block-flat purple-box">
          <div class="header">							
            <h3>Master Jenis Barang</h3>
          </div>
          <div class="content">
             <form class="form-horizontal group-border-dashed" method="post" action="?user=gudang&halaman=terima_jenis2" style="border-radius: 0px;">
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Jenis</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_jenis" value="<?php echo $NewID?>" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Jenis</label>
                <div class="col-sm-6">
                  <input type="text" name="nama_jenis" class="form-control">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-6">
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
							<h3>Jenis Barang</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Id Jenis</th>
											<th>Nama Jenis</th>
											<th></th>
											
										</tr>
									</thead>
									<tbody>
									<?php
										while ($jenis = mysql_fetch_array($sql)){
										echo "
										<tr class='odd gradeX'>
											<td class='center'>$jenis[id_jenis]</td>
											<td>$jenis[nama_jenis]</td>
											  <td><div class='btn-group'>
												  <button type='button' class='btn btn-warning'>Action</button>
												  <button type='button' class='btn btn-warning btn-mono2 dropdown-toggle' data-toggle='dropdown'>
													<span class='caret'></span>
													<span class='sr-only'>Toggle Dropdown</span>
												  </button>
												  <ul class='dropdown-menu' role='menu'>
													<li><a href=?user=gudang&halaman=update_jenis_barang&id_jenis=$jenis[id_jenis]>Edit</a></li>
													
													<li class='divider'></li>"; ?>
													<li><a  <?php echo "href=?user=gudang&halaman=hapus_jenis&id_jenis=$jenis[id_jenis]"?> onClick="return confirm('Apakah Anda Yakin Hapus data?')"> Delete</a></li>
													
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


