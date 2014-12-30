<?php
include('connect.php'); 

$id_masuk = $_GET['id_masuk'];

$query = mysql_query("Select*FROM barang_masuk WHERE id_masuk = '$id_masuk'");
$masuk=mysql_fetch_array($query);

$query2 = mysql_query("SELECT*FROM barang WHERE id_barang = '$masuk[id_barang]'");
$barang= mysql_fetch_array($query2);

$stock_baru=$barang['stock']-$masuk['jumlah'];
$total_baru=$barang['total']-$masuk['jumlah'];
$sisa_detil_baru=$barang['sisa_detil']-$masuk['jumlah'];


$update= mysql_query("UPDATE BARANG set stock='$stock_baru', total='$total_baru' , sisa_detil='$sisa_detil_baru'  where id_barang='$barang[id_barang]'");
$delete = mysql_query("DELETE FROM barang_masuk WHERE id_masuk = '$id_masuk'");


if ($delete && $update){
echo '<script language="javascript">window.alert("Data Berhasil Dihapus");document.location.href="?user=gudang&halaman=master_barang_masuk"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
