<?php
include('connect.php'); 

//mengambil data dari form
$id_masuk= $_POST['id_masuk'];
$nama_supplier = $_POST['nama_supplier'];
$id_barang= $_POST['id_barang'];
$nama_barang= $_POST['nama_barang'];
$tanggal_masuk = $_POST['tanggal_masuk'];
$jumlah = $_POST['jumlah'];
$jumlah_awal = $_POST['jumlah_awal'];
$sisa_detil_awal = $_POST['sisa_detil_awal'];
$total_awal=$_POST['total_awal'];
$stock_awal=$_POST['stock_awal'];

$query1 = mysql_query("SELECT*FROM supplier WHERE nama_supplier= '$nama_supplier'");
$supplier = mysql_fetch_array($query1);
$query2 = mysql_query("SELECT*FROM barang WHERE id_barang= '$id_barang'");
$barang = mysql_fetch_array($query2);

$total_baru=($total_awal-$jumlah_awal)+$jumlah;
$stock_baru=($stock_awal-$jumlah_awal)+$jumlah;
$sisa_detil_baru=($sisa_detil_awal-$jumlah_awal)+$jumlah;


$query3 = mysql_query("update barang set stock='$stock_baru' , sisa_detil='$sisa_detil_baru', total='$total_baru' WHERE id_barang= '$id_barang' ");

$update = mysql_query("UPDATE barang_masuk SET id_supplier = '$supplier[id_supplier]', id_barang = '$id_barang', tgl_masuk = '$tanggal_masuk', jumlah = '$jumlah'  WHERE id_masuk = '$id_masuk'");

if ($update && $query3 ){
echo 'sukses';
echo '<script language="javascript">window.alert("Update Data Berhasil");document.location.href="?user=gudang&halaman=master_barang_masuk"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
