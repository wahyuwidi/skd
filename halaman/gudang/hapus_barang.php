<?php
include('connect.php'); 

$id_barang = $_GET['id_barang'];

$hasil = mysql_query("DELETE FROM barang WHERE id_barang = '$id_barang'");


if ($hasil){
echo 'sukses';
echo '<script language="javascript">window.alert("Data Berhasil Dihapus");document.location.href="?user=gudang&halaman=master_barang"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
