<?php
include('connect.php'); 

//mengambil data dari form
$id_keluar= $_POST['id_keluar'];
$id_detil = $_POST['id_detil'];
$id_detil2 = $_POST['id_detil2'];
$setter = $_POST['setter'];
$tgl_keluar = $_POST['tgl_keluar'];
$no_telp = $_POST['no_telp'];
$no_speedy = $_POST['no_speedy'];
$keterangan = $_POST ['keterangan'];

if($id_detil==$id_detil2){
	$update = mysql_query("UPDATE barang_keluar SET id_detil = '$id_detil', no_speedy = '$no_speedy', no_telp = '$no_telp' ,  setter = '$setter' , keterangan='$keterangan',tgl_instalasi = '$tgl_keluar'  WHERE id_keluar = '$id_keluar'");

	$query = mysql_query("SELECT * FROM barang_keluar WHERE id_keluar = '$id_keluar'");
	$keluar = mysql_fetch_array($query);

	$update2 = mysql_query("UPDATE detil_barang SET status = 'out'  WHERE id_detil = '$keluar[id_detil]'");


	if ($update && $update2){
		echo '<script language="javascript">window.alert("Data Berhasil Terupdate");document.location.href="?user=karyawan&halaman=master_barang_keluar"</script>';
	}else{
		echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
	}
}

else{
	$update = mysql_query("UPDATE barang_keluar SET id_detil = '$id_detil', no_speedy = '$no_speedy', no_telp = '$no_telp' ,  setter = '$setter' , keterangan='$keterangan',tgl_instalasi = '$tgl_keluar'  WHERE id_keluar = '$id_keluar'");

	$query = mysql_query("SELECT * FROM barang_keluar WHERE id_keluar = '$id_keluar'");
	$keluar = mysql_fetch_array($query);

	$update2 = mysql_query("UPDATE detil_barang SET status = 'out'  WHERE id_detil = '$keluar[id_detil]'");
	$update3 = mysql_query("UPDATE detil_barang SET status = 'available'  WHERE id_detil = '$id_detil2'");


	if ($update && $update2){
		echo '<script language="javascript">window.alert("Data Berhasil Terupdate");document.location.href="?user=karyawan&halaman=master_barang_keluar"</script>';
	}else{
		echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
	}

}
?>