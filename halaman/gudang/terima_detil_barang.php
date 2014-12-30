<?php
include('connect.php'); 

//mengambil data dari form
$id_detil= $_POST['id_detil'];
$id_barang = $_POST['id_barang'];
$mac= $_POST['mac'];



$query2 = mysql_query("SELECT*FROM barang WHERE id_barang= '$id_barang'");
$barang = mysql_fetch_array($query2);

$query3 = mysql_query("SELECT * FROM detil_barang where mac_address='$mac'");
$detil = mysql_num_rows($query3);

if($detil==1) {

	echo '<script language="javascript">window.alert("Gagal. Mac Address sudah tersedia. Masukkan Mac Address lain. "); window.history.go(-1);</script>';

} else if($barang['sisa_detil']<=0){

	echo '<script language="javascript">window.alert("Gagal. Semua barang sudah terdaftar. "); window.history.go(-1);</script>';
} else{

$sisa_detil_baru=$barang['sisa_detil']-1;

$query = mysql_query("INSERT INTO detil_barang (id_detil, id_barang, mac_address, status) VALUES('$id_detil','$barang[id_barang]', '$mac','available')");

$update= mysql_query("UPDATE barang set sisa_detil='$sisa_detil_baru' where id_barang='$id_barang'");

if ($query && $update){
echo '<script language="javascript">window.alert("Data Berhasil Ditambahkan");document.location.href="?user=gudang&halaman=master_detil_barang"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
}
?>
