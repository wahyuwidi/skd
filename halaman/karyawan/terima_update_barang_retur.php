<?php
include('connect.php'); 

//mengambil data dari form
$id_keluar= $_POST['id_keluar'];
$id_keluar2= $_POST['id_keluar2'];
$id_retur = $_POST['id_retur'];
$setter = $_POST['setter'];
$tgl_retur = $_POST['tgl_retur'];
$ket = $_POST['ket'];

$query2 = mysql_query("SELECT*FROM barang_keluar WHERE id_keluar= '$id_keluar'");
$keluar = mysql_fetch_array($query2);

$query4 = mysql_query("SELECT*FROM barang_keluar WHERE id_keluar= '$id_keluar2'");
$keluar2 = mysql_fetch_array($query4);

$query3 = mysql_query("SELECT*FROM detil_barang WHERE id_detil='$keluar2[id_detil]'");
$detil = mysql_fetch_array($query3);


$update = mysql_query("UPDATE retur SET id_keluar = '$keluar[id_keluar]', setter = '$setter', tgl_retur = '$tgl_retur' , ket='$ket' WHERE id_retur = '$id_retur'");
$update2 = mysql_query("update detil_barang set status='retur' WHERE id_detil= '$keluar[id_detil]' ");
$update3 = mysql_query("update detil_barang set status='out' WHERE id_detil= '$detil[id_detil]' ");

if ($update && $update2 && $update3 ){
echo 'sukses';
echo '<script language="javascript">document.location.href="?user=karyawan&halaman=master_barang_retur"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
