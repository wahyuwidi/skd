<?php
include('connect.php'); 

$id_keluar = $_GET['id_keluar'];

$query = mysql_query("SELECT * FROM barang_keluar WHERE id_keluar = '$id_keluar'");
$keluar = mysql_fetch_array($query);

$query3 = mysql_query("SELECT * FROM detil_barang WHERE id_detil = '$keluar[id_detil]'");
$detil = mysql_fetch_array($query3);


$query5 = mysql_query("SELECT * FROM barang WHERE id_barang = '$detil[id_barang]'");
$barang = mysql_fetch_array($query5);

$stock1=$barang['stock']+1;


$update1 = mysql_query("UPDATE detil_barang set status='available' where id_detil='$detil[id_detil]'");
$update2 = mysql_query("UPDATE barang set stock='$stock1' where id_barang='$barang[id_barang]'");

$delete = mysql_query("DELETE FROM barang_keluar WHERE id_keluar = '$id_keluar'");


if ($sql && $delete && $update1 && $update2 ){

echo '<script language="javascript">window.alert("Data Berhasil Dihapus");document.location.href="?user=karyawan&halaman=master_barang_keluar"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
