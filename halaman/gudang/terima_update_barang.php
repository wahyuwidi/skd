<?php
include('connect.php'); 

//mengambil data dari form
$id_barang= $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$merk= $_POST['merk'];
$nama_jenis = $_POST['nama_jenis'];


$query1 = mysql_query("SELECT id_jenis FROM jenis_barang WHERE nama_jenis= '$nama_jenis'");
$jenis = mysql_fetch_array($query1);


$update = mysql_query("UPDATE barang SET jenis = '$jenis[id_jenis]', nama_barang = '$nama_barang', merk = '$merk' WHERE id_barang = '$id_barang'");



if ($update){
echo 'sukses';
echo '<script language="javascript">window.alert("Update Data Berhasil");document.location.href="?user=gudang&halaman=master_barang"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
