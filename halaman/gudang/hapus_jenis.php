<?php
include('connect.php'); 

$id_jenis = $_GET['id_jenis'];

$hasil = mysql_query("DELETE FROM jenis_barang WHERE id_jenis = '$id_jenis'");


if ($hasil){
echo 'sukses';
echo '<script language="javascript">window.alert("Data Berhasil Dihapus");document.location.href="?user=gudang&halaman=master_jenis_barang"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
