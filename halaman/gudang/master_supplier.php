<!DOCTYPE html>
<?php
include('connect.php'); 
$sql = mysql_query("SELECT * FROM supplier ORDER BY id_supplier");

$query = mysql_query("SELECT MAX(id_supplier) AS id FROM supplier");
$kode = mysql_fetch_array($query);
$max_id = $kode['id'];
$id_supplier = (int) substr($max_id,4,4);
$id_supplier++;
$NewID = "SPLR".sprintf("%04s",$id_supplier);
?>
<html lang="en">
<body>
   
	<div class="cl-mcont">		
    <div class="row"> 
<div class="col-sm-8 col-md-8">    
        <div class="block-flat purple-box">
          <div class="header">							
            <h3>Master Supplier</h3>
          </div>
          <div class="content">
             <form class="form-horizontal group-border-dashed" method="post" action="?user=gudang&halaman=terima_supplier" style="border-radius: 0px;">
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Jenis</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_supplier" value="<?php echo $NewID?>" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Supplier</label>
                <div class="col-sm-6">
                  <input type="text" name="nama_supplier" class="form-control">
                </div>
              </div>
			   <div class="form-group">
                <label class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-6">
                  <textarea type="text" name="alamat" class="form-control"></textarea>
                </div>
              </div>
			   <div class="form-group">
                <label class="col-sm-3 control-label">No. Telp</label>
                <div class="col-sm-6">
                  <input type="text" name="phone" class="form-control" data-mask="phone" placeholder="(9999) 999999">
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
							<h3>Data Spplier</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Id Supplier</th>
											<th>Nama Supplier</th>
											<th>Alamat</th>
											<th>No. Telp</th>
											<th></th>
										
											
										</tr>
									</thead>
									<tbody>
									<?php
										while ($supplier = mysql_fetch_array($sql)){
										echo "
										<tr class='gradeA'>
											<td class='center'>$supplier[id_supplier]</td>
											<td>$supplier[nama_supplier]</td>
											<td>$supplier[alamat_supplier]</td>
											<td>$supplier[phone]</td>
											  <td><div class='btn-group'>
												  <button type='button' class='btn btn-warning'>Action</button>
												  <button type='button' class='btn btn-warning btn-mono2 dropdown-toggle' data-toggle='dropdown'>
													<span class='caret'></span>
													<span class='sr-only'>Toggle Dropdown</span>
												  </button>
												  <ul class='dropdown-menu' role='menu'>
													<li><a href=?user=gudang&halaman=update_supplier&id_supplier=$supplier[id_supplier]>Edit</a></li>
													
													<li class='divider'></li>"; ?>
													<li><a  <?php echo "href=?user=gudang&halaman=hapus_supplier&id_supplier=$supplier[id_supplier]"?> onClick="return confirm('Apakah Anda Yakin Hapus data?')"> Delete</a></li>
													
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


