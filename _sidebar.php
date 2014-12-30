     <div class="side-user">
            <div class="avatar"><img src="images/telkomindonesia.png" width="200px" alt="Avatar" /></div>
            
          </div>
	 <!-----------------------------------------------SIDEBAR ADMIN----------------------------------------------------------------->      
	<?php
		if($_SESSION['level']=="admin")
		{
	?>
		  
		  <ul class="cl-vnavigation">
            <li><a href="index.php"><i class="fa fa-home"></i><span>Home</span></a></li>
			<li><a href="#"><i class="fa fa-user"></i><span>User</span></a>
              <ul class="sub-menu">
				<li><a href="?user=admin&halaman=master_user"><i class="fa fa-gear"></i>Master User</a></li>
                <li><a href="?user=admin&halaman=tampil_user"><i class="fa fa-eye"></i>Lihat User</a></li>        
              </ul>
            </li>
			
            <li><a href="#"><i class="fa fa-hand-o-down"></i><span>Modem Masuk</span></a>
              <ul class="sub-menu">
                <li><a href="?user=admin&halaman=tampil_barang_masuk"><i class="fa fa-eye"></i>Lihat Barang Masuk</a></li>              
              </ul>
            </li>
			
            <li><a href="#"><i class="fa fa-laptop"></i><span>Modem</span></a>
              <ul class="sub-menu">    
                <li><a href="?user=admin&halaman=tampil_barang"><i class="fa fa-eye"></i>Lihat Modem</a></li>
				<li><a href="?user=admin&halaman=lihat_jenis_barang"><i class="fa fa-eye"></i>Lihat Jenis Modem</a></li>
              </ul>			
            </li>
			
			<li><a href="#"><i class="fa fa-th-list"></i><span>Detil Modem</span></a>
              <ul class="sub-menu">               
                <li><a href="?user=admin&halaman=tampil_detil_barang_all"><i class="fa fa-eye"></i>Lihat Detil Modem</a></li>
              </ul>
            </li>
			
            <li><a href="#"><i class="fa fa-truck"></i><span>Supplier</span></a>
              <ul class="sub-menu">              
                <li><a href="?user=admin&halaman=tampil_supplier"><i class="fa fa-eye"></i>Lihat Supplier</a></li>
              </ul>
            </li>
			
            <li><a href="#"><i class="fa fa-hand-o-up"></i><span>Modem Keluar</span></a>
              <ul class="sub-menu">
                <li  ><a href="?user=admin&halaman=tampil_barang_keluar"><i class="fa fa-eye"></i>Lihat Modem Keluar</a></li>               
              </ul>
            </li>
			
            <li><a href="#"><i class="fa fa-refresh"></i><span>Retur Modem</span></a>
              <ul class="sub-menu">
                <li  ><a href="?user=admin&halaman=tampil_barang_retur"><i class="fa fa-eye"></i>Lihat Modem Retur</a></li>          
              </ul>
            </li>
		
			<li><a href="#"><i class="fa fa-eye"></i><span>Riwayat Modem</span></a>
              <ul class="sub-menu">
                <li  ><a href="?user=admin&halaman=riwayat_modem"><i class="fa fa-eye"></i>Lihat Riwayat Modem</a></li>        
              </ul>
            </li>
          </ul>

<!-----------------------------------------------SIDEBAR GUDANG-----------------------------------------------------------------> 		  
	<?php
		}elseif($_SESSION['level']=="gudang")
		{
	?>
		  <ul class="cl-vnavigation">
            <li><a href="index.php"><i class="fa fa-home"></i><span>Home</span></a></li>
			
            <li><a href="#"><i class="fa fa-hand-o-down"></i><span>Modem Masuk</span></a>
              <ul class="sub-menu">
			    <li  ><a href="?user=gudang&halaman=master_barang_masuk"><i class="fa fa-gear"></i>Master Barang Masuk</a></li>
                <li  ><a href="?user=gudang&halaman=tampil_barang_masuk"><i class="fa fa-eye"></i>Lihat Barang Masuk</a></li>              
              </ul>
            </li>
			
            <li><a href="#"><i class="fa fa-laptop"></i><span>Modem</span></a>
              <ul class="sub-menu">
                <li><a href="?user=gudang&halaman=master_jenis_barang"><i class="fa fa-gear"></i>Master Jenis Modem</a></li>
                <li><a href="?user=gudang&halaman=master_barang"><i class="fa fa-gear"></i>Master Modem</a></li>
                <li><a href="?user=gudang&halaman=tampil_barang"><i class="fa fa-eye"></i>Lihat Modem</a></li>            
              </ul>
            </li>
			
            <li><a href="#"><i class="fa fa-th-list"></i><span>Detil Modem</span></a>
              <ul class="sub-menu">
                <li><a href="?user=gudang&halaman=master_detil_barang"><i class="fa fa-gear"></i>Master Detil Modem</a></li>
                <li><a href="?user=gudang&halaman=tampil_detil_barang_all"><i class="fa fa-eye"></i>Lihat Detil Modem</a></li>
              </ul>
            </li>
			
            <li><a href="#"><i class="fa fa-hand-o-up"></i><span>Modem Keluar</span></a>
              <ul class="sub-menu">
                <li><a href="?user=gudang&halaman=tampil_barang_keluar"><i class="fa fa-eye"></i>Lihat Modem Keluar</a></li>              
              </ul>
            </li>
			
            <li><a href="#"><i class="fa fa-refresh"></i><span>Retur Modem</span></a>
              <ul class="sub-menu">
                <li><a href="?user=gudang&halaman=tampil_barang_retur"><i class="fa fa-eye"></i>Lihat Modem Retur</a></li>         
              </ul>
            </li>
			
			<li><a href="#"><i class="fa fa-truck"></i><span>Supplier</span></a>
              <ul class="sub-menu">
				<li  ><a href="?user=gudang&halaman=master_supplier"><i class="fa fa-gear"></i>Master Supplier</a></li>
                <li  ><a href="?user=gudang&halaman=tampil_supplier"><i class="fa fa-truck"></i>Lihat Supplier</a></li>          
              </ul>
            </li>
			
			<li><a href="#"><i class="fa fa-eye"></i><span>Riwayat Modem</span></a>
              <ul class="sub-menu">
                <li  ><a href="?user=gudang&halaman=riwayat_modem"><i class="fa fa-eye"></i>Lihat Riwayat Modem</a></li>          
              </ul>
            </li>
					
          </ul>	
		  
<!-----------------------------------------------SIDEBAR KARYAWAN-----------------------------------------------------------------> 			  
	<?php
		}elseif($_SESSION['level']=="karyawan")
		{
	?>
		  <ul class="cl-vnavigation">
            <li  ><a href="index.php"><i class="fa fa-home"></i><span>Home</span></a></li>
            <li><a href="#"><i class="fa fa-hand-o-down"></i><span>Modem Masuk</span></a>
              <ul class="sub-menu">
			    
                <li  ><a href="?user=karyawan&halaman=tampil_barang_masuk"><i class="fa fa-eye"></i>Lihat Barang Masuk</a></li>              
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-laptop"></i><span>Modem</span></a>
              <ul class="sub-menu">
                
                <li  ><a href="?user=karyawan&halaman=tampil_barang"><i class="fa fa-eye"></i>Lihat Modem</a></li>
               
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-th-list"></i><span>Detil Modem</span></a>
              <ul class="sub-menu">
                
                <li  ><a href="?user=karyawan&halaman=tampil_detil_barang_all"><i class="fa fa-eye"></i>Lihat Detil Modem</a></li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-hand-o-up"></i><span>Modem Keluar</span></a>
              <ul class="sub-menu">
			  <li  ><a href="?user=karyawan&halaman=master_barang_keluar"><i class="fa fa-gear"></i>Master Modem Keluar</a></li>
                <li  ><a href="?user=karyawan&halaman=tampil_barang_keluar"><i class="fa fa-eye"></i>Lihat Modem Keluar</a></li>
               
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-refresh"></i><span>Retur Modem</span></a>
              <ul class="sub-menu">
			  <li  ><a href="?user=karyawan&halaman=master_barang_retur"><i class="fa fa-gear"></i>Master Modem Retur</a></li>
                <li  ><a href="?user=karyawan&halaman=tampil_barang_retur"><i class="fa fa-eye"></i>Lihat Modem Retur</a></li>
           
              </ul>
            </li>
			<li><a href="#"><i class="fa fa-truck"></i><span>Supplier</span></a>
              <ul class="sub-menu">
			
                <li  ><a href="?user=karyawan&halaman=tampil_supplier"><i class="fa fa-truck"></i>Lihat Supplier</a></li>
           
              </ul>
            </li>
			<li><a href="#"><i class="fa fa-eye"></i><span>Riwayat Modem</span></a>
              <ul class="sub-menu">
                <li  ><a href="?user=karyawan&halaman=riwayat_modem"><i class="fa fa-eye"></i>Lihat Riwayat Modem</a></li>
           
              </ul>
            </li>
			
          </ul>	
	<!-----------------------------------------------SIDEBAR PIMPINAN-----------------------------------------------------------------> 			  
	<?php
		}elseif($_SESSION['level']=="pimpinan")
		{
	?>
		  <ul class="cl-vnavigation">
            <li  ><a href="index.php"><i class="fa fa-home"></i><span>Home</span></a></li>
            <li><a href="#"><i class="fa fa-hand-o-down"></i><span>Barang Masuk</span></a>
              <ul class="sub-menu">
			    
                <li  ><a href="?user=pimpinan&halaman=laporan_barang_masuk"><i class="fa fa-eye"></i>Laporan Barang Masuk</a></li>              
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-laptop"></i><span>Modem</span></a>
              <ul class="sub-menu">
                
                <li  ><a href="?user=pimpinan&halaman=laporan_barang"><i class="fa fa-eye"></i>Laporan Modem</a></li>
               
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-th-list"></i><span>Detil Modem</span></a>
              <ul class="sub-menu">
                
                <li  ><a href="?user=pimpinan&halaman=laporan_detil_barang_all"><i class="fa fa-eye"></i>Laporan Detil Modem</a></li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-hand-o-up"></i><span>Modem Keluar</span></a>
              <ul class="sub-menu">
			  
                <li  ><a href="?user=pimpinan&halaman=laporan_barang_keluar"><i class="fa fa-eye"></i>Laporan Modem Keluar</a></li>
               
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-refresh"></i><span>Retur Modem</span></a>
              <ul class="sub-menu">
			
                <li  ><a href="?user=pimpinan&halaman=laporan_barang_retur"><i class="fa fa-eye"></i>Laporan Modem Retur</a></li>
           
              </ul>
            </li>
			<li><a href="#"><i class="fa fa-truck"></i><span>Supplier</span></a>
              <ul class="sub-menu">
			
                <li  ><a href="?user=pimpinan&halaman=laporan_supplier"><i class="fa fa-truck"></i>Laporan Supplier</a></li>
           
              </ul>
            </li>
			<li><a href="#"><i class="fa fa-user"></i><span>User</span></a>
              <ul class="sub-menu">
			
                <li  ><a href="?user=pimpinan&halaman=laporan_user"><i class="fa fa-user"></i>Laporan Data User</a></li>
           
              </ul>
            </li>
			<li><a href="#"><i class="fa fa-eye"></i><span>Riwayat Modem</span></a>
              <ul class="sub-menu">
                <li  ><a href="?user=pimpinan&halaman=riwayat_modem"><i class="fa fa-eye"></i>Lihat Riwayat Modem</a></li>
           
              </ul>
            </li>
			
          </ul>	
	<?php
		}
	?>