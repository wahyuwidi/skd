<?php
include('connect.php'); 

//mengambil data dari form
$id_supplier = $_POST['id_supplier'];
$nama_supplier = $_POST['nama_supplier'];
$alamat = $_POST['alamat'];
$phone = $_POST['phone'];

$query = mysql_query("INSERT INTO supplier (id_supplier, nama_supplier, alamat_supplier, phone) VALUES('$id_supplier', '$nama_supplier', '$alamat','$phone')");

if ($query){
echo 'sukses';
echo '<script language="javascript">window.alert("Data Berhasil Ditambahkan");document.location.href="?user=gudang&halaman=master_supplier"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
