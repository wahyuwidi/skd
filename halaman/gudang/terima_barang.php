<?php
include('connect.php'); 

//mengambil data dari form
$id_barang= $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$merk= $_POST['merk'];
$nama_jenis = $_POST['nama_jenis'];


$query1 = mysql_query("SELECT id_jenis FROM jenis_barang WHERE nama_jenis= '$nama_jenis'");
$id_jenis = mysql_fetch_array($query1);

$query = mysql_query("INSERT INTO barang (id_barang, nama_barang, merk ,jenis,total, stock, sisa_detil ) VALUES('$id_barang', '$nama_barang','$merk', '$id_jenis[id_jenis]','0','0','0')");

if ($query){
echo 'sukses';
echo '<script language="javascript">document.location.href="?user=gudang&halaman=master_barang"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
