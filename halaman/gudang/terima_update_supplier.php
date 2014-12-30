<?php
include('connect.php'); 

//mengambil data dari form
$id_supplier = $_POST['id_supplier'];
$nama_supplier = $_POST['nama_supplier'];
$alamat= $_POST['alamat'];
$no_telp = $_POST['no_telp'];

$update = mysql_query("UPDATE supplier SET nama_supplier = '$nama_supplier', alamat_supplier = '$alamat', phone = '$no_telp'  WHERE id_supplier = '$id_supplier'");


if ($update){
echo 'sukses';
echo '<script language="javascript">window.alert("Update Data Berhasil");document.location.href="?user=gudang&halaman=master_supplier"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
