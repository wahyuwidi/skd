<?php
include('connect.php'); 

//mengambil data dari form
$id_jenis = $_POST['id_jenis'];
$nama_jenis = $_POST['nama_jenis'];

$update = mysql_query("UPDATE jenis_barang SET nama_jenis = '$nama_jenis'  WHERE id_jenis = '$id_jenis'");

if ($update){
echo 'sukses';
echo '<script language="javascript">window.alert("Data Berhasil Ditambahkan");document.location.href="?user=gudang&halaman=master_jenis_barang"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
