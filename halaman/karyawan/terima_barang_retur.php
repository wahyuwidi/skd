<?php
include('connect.php'); 

//mengambil data dari form
$id_keluar= $_POST['id_keluar'];
$id_retur = $_POST['id_retur'];
$setter = $_POST['setter'];
$tgl_retur = $_POST['tgl_retur'];
$ket = $_POST['ket'];

$query2 = mysql_query("SELECT*FROM barang_keluar WHERE id_keluar= '$id_keluar'");
$keluar = mysql_fetch_array($query2);


$query = mysql_query("INSERT INTO retur (id_retur, id_keluar, setter, tgl_retur, ket) VALUES('$id_retur', '$id_keluar','$setter','$tgl_retur','$ket')");

$query3 = mysql_query("update detil_barang set status='retur' WHERE id_detil= '$keluar[id_detil]' ");



if ($query && $query3 ){
echo '<script language="javascript">window.alert("Data Berhasil Ditambahkan");document.location.href="?user=karyawan&halaman=master_barang_retur"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
