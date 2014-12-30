<?php
include('connect.php'); 

$id_retur= $_GET['id_retur'];

$sql = mysql_query("SELECT*FROM retur WHERE id_retur = '$id_retur'");
$retur = mysql_fetch_array($sql);//pecah hasil query ke dalam array

$sql3 = mysql_query("SELECT*FROM barang_keluar WHERE id_keluar = '$retur[id_keluar]'");
$keluar = mysql_fetch_array($sql3);//pecah hasil query ke dalam array

											
$sql4 = mysql_query("SELECT*FROM detil_barang WHERE id_detil = '$keluar[id_detil]'");
$detil = mysql_fetch_array($sql4);//pecah hasil query ke dalam array
											
																						
$update = mysql_query("UPDATE detil_barang set status='out' where id_detil='$detil[id_detil]'");
											
$hasil = mysql_query("DELETE FROM retur WHERE id_retur = '$id_retur'");


if ($hasil){

echo '<script language="javascript">window.alert("Data Berhasil Dihapus");document.location.href="?user=karyawan&halaman=master_barang_retur"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
