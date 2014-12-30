<?php

//mengambil data dari form
$id_masuk= $_POST['id_masuk'];
$nama_supplier = $_POST['nama_supplier'];
$id_barang= $_POST['id_barang'];
$nama_barang= $_POST['nama_barang'];
$tanggal_masuk = $_POST['tanggal_masuk'];
$jumlah = $_POST['jumlah'];


$query1 = mysql_query("SELECT id_supplier from supplier WHERE nama_supplier= '$nama_supplier'");
$supplier = mysql_fetch_array($query1);
$query2 = mysql_query("SELECT*FROM barang WHERE id_barang= '$id_barang'");
$barang = mysql_fetch_array($query2);
$hasil=$jumlah+$barang['stock'];
$sisa_detil=$jumlah+$barang['sisa_detil'];
$hasil2=$jumlah+$barang['total'];

$query3 = mysql_query("update barang set total='$hasil2', stock='$hasil', sisa_detil='$sisa_detil' WHERE id_barang= '$id_barang' ");

$query = mysql_query("INSERT INTO barang_masuk (id_masuk, id_supplier, id_barang ,tgl_masuk , jumlah) VALUES('$id_masuk', '$supplier[id_supplier]','$barang[id_barang]', '$tanggal_masuk','$jumlah')");

if ($query && $query3 ){

echo '<script language="javascript">window.alert("Data Berhasil Ditambahkan");document.location.href="?user=gudang&halaman=master_barang_masuk"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
