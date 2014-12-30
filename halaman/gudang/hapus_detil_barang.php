<?php
include('connect.php'); 
$id_detil = $_GET['id_detil'];

$sql_detil = mysql_query("SELECT * FROM detil_barang where id_detil='$id_detil'");
$detil=mysql_fetch_array($sql_detil);

$sql2 = mysql_query("SELECT * FROM barang where id_barang='$detil[id_barang]'");
$barang = mysql_fetch_array($sql2);

$sisa_detil_baru=$barang['sisa_detil']+1;

$sql1 = mysql_query("UPDATE barang set sisa_detil='$sisa_detil_baru' WHERE id_barang = '$barang[id_barang]'");
$sql = mysql_query("DELETE FROM detil_barang WHERE id_detil = '$id_detil'");


if ($sql && $sql1){

echo '<script language="javascript">window.alert("Data Berhasil Dihapus");document.location.href="?user=gudang&halaman=master_detil_barang"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
