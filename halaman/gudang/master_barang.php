<!DOCTYPE html>
<?php
include('connect.php'); 
$sql = mysql_query("SELECT * FROM barang ORDER BY id_barang");

$query = mysql_query("SELECT MAX(id_barang) AS id FROM barang");
$kode = mysql_fetch_array($query);
$max_id = $kode['id'];
$id_barang = (int) substr($max_id,3,4);
$id_barang++;
$NewID = "BRG".sprintf("%04s",$id_barang);

$sql2 = mysql_query("SELECT * FROM jenis_barang ORDER BY id_jenis");

$query2 = mysql_query("SELECT MAX(id_jenis) AS id FROM jenis_barang");
$kode2 = mysql_fetch_array($query2);
$max_id2 = $kode2['id'];
$id_jenis = (int) substr($max_id2,3,4);
$id_jenis++;
$NewID2 = "JNS".sprintf("%04s",$id_jenis);
?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
    <div class="row"> 
	<div class="col-sm-8 col-md-8">    
       <div class="block-flat purple-box">
          <div class="header">							
            <h3>Master Barang</h3>
          </div>
          <div class="content">
             <form class="form-horizontal group-border-dashed" method="post" action="?user=gudang&halaman=terima_barang" style="border-radius: 0px;">
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Barang</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_barang" value="<?php echo $NewID?>" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Barang</label>
                <div class="col-sm-6">
                  <input type="text" name="nama_barang" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Jenis Barang</label>
				<div class="input-group col-sm-5">
                <select name="nama_jenis" data-placeholder="Pilih jenis barang..." class="select2" style="width:250px;" tabindex="2">
													<option value=""></option>
													 <?php 
														$hasil = mysql_query("SELECT *FROM jenis_barang order by nama_jenis");
														  while($jenis = mysql_fetch_array($hasil)){
														  echo "<option>$jenis[nama_jenis]</option>";
														  }
														  ?>
													
				</select>
				<span class="input-group-btn">
                    <button type="button" class="btn btn-success md-trigger" data-modal="form-primary"><i class="fa fa-plus-square"></i></button>
                    </span>
				
				</div>
              </div>
			  
              <div class="form-group">
                <label class="col-sm-3 control-label">Merk</label>
                <div class="col-sm-4">
                  <input type="text" name="merk" class="form-control">
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
							<h3>Data Modem</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Id Barang</th>
											<th>Nama Barang</th>
											<th>Merk</th>
											<th>Jenis</th>
											<th>Stock</th>
											<th>Belum Terdaftar</th>
											<th></th>
											
										</tr>
									</thead>
									<tbody>
									<?php
										while ($barang = mysql_fetch_array($sql)){
										echo "
										<tr>
											<td class='center'>$barang[id_barang]</td>
											<td>$barang[nama_barang]</td>
											<td>$barang[merk]</td>";
											$sql2 = mysql_query("SELECT*FROM jenis_barang WHERE id_jenis = '$barang[jenis]'");
											$jenis = mysql_fetch_array($sql2);//pecah hasil query ke dalam array

										echo "<td>$jenis[nama_jenis]</td>
											  <td class='center'>$barang[stock]</td>
											   <td class='center'>$barang[sisa_detil]</td>
											  <td><div class='btn-group'>
												  <button type='button' class='btn btn-warning'>Action</button>
												  <button type='button' class='btn btn-warning btn-mono2 dropdown-toggle' data-toggle='dropdown'>
													<span class='caret'></span>
													<span class='sr-only'>Toggle Dropdown</span>
												  </button>
												  <ul class='dropdown-menu' role='menu'>";
													if ($barang['sisa_detil']<=0) {
														echo "
														<li><a href='?user=gudang&halaman=tampil_detil_barang2&id_barang=$barang[id_barang]'>Detil</a></li>";
													} else{
														echo "
														<li><a href='?user=gudang&halaman=tambah_detil_barang&id_barang=$barang[id_barang]'>Create Detil</a></li>
														<li><a href='?user=gudang&halaman=tampil_detil_barang2&id_barang=$barang[id_barang]'>Detil</a></li>";												  
													}
													echo "
													<li class='divider'></li>
													<li><a href='?user=gudang&halaman=update_barang&id_barang=$barang[id_barang]'>Edit</a></li>"; ?>
													
													
													<li><a  <?php echo "href=?user=gudang&halaman=hapus_barang&id_barang=$barang[id_barang]"?> onClick="return confirm('Apakah Anda Yakin Hapus data?')"> Delete</a></li>
													
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
	

