	
<div class="row">

	 <!-----------------------------------------------MENU ADMIN----------------------------------------------------------------->      
	<?php
		if($_SESSION['level']=="admin")
		{
	?>

			
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-green">
				<div class="content"><h1 class="text-left">User</h1><p>Master Data User</p></div>
				<div class="icon"><i class="fa fa-user"></i></div>
				<a class="details" href="?user=admin&halaman=master_user">Go <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
		
			
		
<!-----------------------------------------------MENU GUDANG-----------------------------------------------------------------> 		  
	<?php
		}elseif($_SESSION['level']=="gudang")
		{
	?>
	
	<div class="col-md-4 col-sm-6">
			<div class="fd-tile detail tile-green">
				<div class="content"><h1 class="text-left">Modem Masuk</h1><p>Master Modem Masuk</p></div>
				<div class="icon"><i class="fa fa-hand-o-down"></i></div>
				<a class="details" href="?user=gudang&halaman=master_barang_masuk">Go <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-red">
				<div class="content"><h1 class="text-left">Modem</h1><p>Master Data Modem</p></div>
				<div class="icon"><i class="fa fa-laptop"></i></div>
				<a class="details" href="?user=gudang&halaman=master_barang">Go <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
			<div class="col-md-3 col-sm-6">
			<div class="fd-tile detail tile-prusia">
				<div class="content"><h1 class="text-left">Detil Modem</h1><p>Master Data Rincian Data Modem</p></div>
				<div class="icon"><i class="fa fa-th-list"></i></div>
				<a class="details" href="?user=gudang&halaman=master_detil_barang">Go <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
			
			
		  
<!-----------------------------------------------MENU KARYAWAN-----------------------------------------------------------------> 			  
	<?php
		}elseif($_SESSION['level']=="karyawan")
		{
	?>
		  <div class="col-md-4 col-sm-6">
			<div class="fd-tile detail tile-green">
				<div class="content"><h1 class="text-left">Modem Keluar</h1><p>Master Modem Keluar</p></div>
				<div class="icon"><i class="fa fa-hand-o-up"></i></div>
				<a class="details" href="?user=karyawan&halaman=master_barang_keluar">Go <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
			<div class="col-md-4 col-sm-6">
			<div class="fd-tile detail tile-red">
				<div class="content"><h1 class="text-left">Modem Retur</h1><p>Master Data Pengembalian Modem</p></div>
				<div class="icon"><i class="fa fa-refresh"></i></div>
				<a class="details" href="?user=karyawan&halaman=master_barang_retur">Go <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
			</div>
			</div>
			<div class="col-md-4 col-sm-6">
			<div class="fd-tile detail tile-red">	
				<div class="content"><h1 class="text-left">Menu Baru</h1><p>Master Data Pengembalian Modem</p></div>
				<div class="icon"><i class="fa fa-refresh"></i></div>
				<a>
			</div>
			
			</div>
		  
	
	<?php } ?>
</div>