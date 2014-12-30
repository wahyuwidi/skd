<!DOCTYPE html>
<?php
include('connect.php'); 
$sql = mysql_query("SELECT * FROM barang_masuk ORDER BY id_masuk");


$query = mysql_query("SELECT MAX(id_masuk) AS id FROM barang_masuk");
$kode = mysql_fetch_array($query);
$max_id = $kode['id'];
$id_masuk = (int) substr($max_id,3,4);
$id_masuk++;
$NewID = "bIN".sprintf("%04s",$id_masuk);
$tgl=getdate();
?>
<html lang="en">

<script type="text/javascript"> 
	
function openwindow()
{

window.open("halaman/select_barang.php","mywindow","menubar=1,scrollbars=yes,resizable=1,width=800,height=500");

}
 </script>
<body>
   
	<div class="cl-mcont">		
    <div class="row"> 
<div class="col-sm-8 col-md-8">    
        <div class="block-flat purple-box">
          <div class="header">							
            <h3>Master Barang Masuk</h3>
          </div>
          <div class="content">
             <form class="form-horizontal group-border-dashed" method="post" action="?user=gudang&halaman=terima_barang_masuk" style="border-radius: 0px;">
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Masuk</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_masuk" value="<?php echo $NewID?>" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Masuk</label>
                <div class="col-sm-4">
                  <input type="text" name="tanggal_masuk" id="tanggal" class="form-control" value=<?php echo $tgl[year]."-".$tgl[mon]."-".$tgl[mday]?>>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Supplier</label>
				<div class="col-sm-4">
                <select  name="nama_supplier" data-placeholder="Pilih nama supplier..." class="select2">
													<option value=""></option>
													 <?php 
														$sql2 = mysql_query("SELECT *FROM supplier order by nama_supplier");
														  while($supplier = mysql_fetch_array($sql2)){
														  echo "<option>$supplier[nama_supplier]</option>";
														  }
														  ?>
													
												  </select>

				</div>
              </div>
			  
              <div class="form-group">
                <label class="col-sm-3 control-label">Id Barang</label>
                <div class="col-sm-4">
                  <input type="text" name="id_barang"  id="id_barang" class="form-control" onclick="javascript:openwindow();">
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Nama Modem</label>
                <div class="col-sm-6">
                  <input type="text" name="nama_barang" id="nama_barang" class="form-control" readonly="readonly" >
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-3 control-label">Merk</label>
                <div class="col-sm-4">
                  <input type="text" name="merk" id="merk" class="form-control" readonly="readonly"> 
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Jenis</label>
                <div class="col-sm-4">
                  <input type="text" name="jenis" id="jenis" class="form-control" readonly="readonly">
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-3 control-label">Jumlah</label>
                <div class="col-sm-3">
                  <input type="text" name="jumlah"  class="form-control" >
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
							<h3>Data Barang Masuk</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Id Masuk</th>
											<th>Tanggal</th>
											<th>Supplier</th>
											<th>Nama Barang</th>
											<th>Merk</th>
											<th>Jenis</th>
											<th>Jumlah</th>
											<th></th>
											
										</tr>
									</thead>
									<tbody>
									<?php
										while ($masuk = mysql_fetch_array($sql)){
											$sql5 = mysql_query("SELECT*FROM supplier WHERE id_supplier = '$masuk[id_supplier]'");
											$supplier = mysql_fetch_array($sql5);//pecah hasil query ke dalam array
											$sql3 = mysql_query("SELECT*FROM barang WHERE id_barang = '$masuk[id_barang]'");
											$barang = mysql_fetch_array($sql3);//pecah hasil query ke dalam array
											$sql4 = mysql_query("SELECT*FROM jenis_barang WHERE id_jenis = '$barang[jenis]'");
											$jenis = mysql_fetch_array($sql4);//pecah hasil query ke dalam array
										echo "
										<tr class='odd gradeX'>
											<td class='center'>$masuk[id_masuk]</td>
											<td class='center'>$masuk[tgl_masuk]</td>
											<td>$supplier[nama_supplier]</td>
											<td>$barang[nama_barang]</td>
											<td>$barang[merk]</td>
											<td>$jenis[nama_jenis]</td>
											<td class='center'>$masuk[jumlah]</td>
											<td><div class='btn-group'>
												  <button type='button' class='btn btn-warning'>Action</button>
												  <button type='button' class='btn btn-warning btn-mono2 dropdown-toggle' data-toggle='dropdown'>
													<span class='caret'></span>
													<span class='sr-only'>Toggle Dropdown</span>
												  </button>
												  <ul class='dropdown-menu' role='menu'>";
												
													echo "
													<li><a href='?user=gudang&halaman=update_barang_masuk&id_masuk=$masuk[id_masuk]'>Edit</a></li>"; ?>
													<li><a  <?php echo "href=?user=gudang&halaman=hapus_barang_masuk&id_masuk=$masuk[id_masuk]"?> onClick="return confirm('Apakah Anda Yakin Hapus data?')"> Delete</a></li>
													
												  </ul>
												</div>	
											</td>
										</tr>
				
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
	

