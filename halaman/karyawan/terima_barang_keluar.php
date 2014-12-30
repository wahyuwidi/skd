<?php
include('connect.php'); 
//mengambil data dari form
$id_keluar= $_POST['id_keluar'];
$id_detil = $_POST['id_detil'];
$setter = $_POST['setter'];
$tgl_keluar = $_POST['tgl_keluar'];
$no_telp = $_POST['no_telp'];
$no_speedy = $_POST['no_speedy'];
$keterangan = $_POST['keterangan'];

$query2 = mysql_query("SELECT*FROM detil_barang WHERE id_detil= '$id_detil'");
$detil = mysql_fetch_array($query2);

$query3 = mysql_query("SELECT*FROM barang WHERE id_barang= '$detil[id_barang]'");
$barang = mysql_fetch_array($query3);

$hasil=$barang['stock']-1;


if ($id_detil==null){
	echo '<script language="javascript">window.alert("Anda Harus Memilih Modem Terlebih Dahulu"); window.history.go(-1);</script>';
} else if ($barang['stock']==0){
	echo '<script language="javascript">window.alert("Maaf Stock Barang Telah Habis"); window.history.go(-1);</script>';
} else{

	$query = mysql_query("INSERT INTO barang_keluar (id_keluar, id_detil, no_speedy, no_telp ,tgl_instalasi, setter,keterangan) 
	VALUES('$id_keluar','$id_detil','$no_speedy','$no_telp','$tgl_keluar','$setter','$keterangan')");
	$query4 = mysql_query("update barang set stock='$hasil' WHERE id_barang= '$barang[id_barang]' ");
	$query5 = mysql_query("update detil_barang set status='out' WHERE id_detil= '$id_detil' ");

	if ($query && $query5){

		echo '<script language="javascript">window.alert("Data Berhasil Ditambahkan");document.location.href="?user=karyawan&halaman=master_barang_keluar"</script>';

	}else{
		echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
	}
}
?>