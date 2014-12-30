<?php
include('connect.php'); 

//mengambil data dari form
$id_detil= $_POST['id_detil'];
$id_masuk = $_POST['id_masuk'];
$mac= $_POST['mac'];
$sn = $_POST['sn'];





$query2 = mysql_query("SELECT*FROM barang_masuk WHERE id_masuk= '$id_masuk'");
$masuk = mysql_fetch_array($query2);

$query3 = mysql_query("SELECT * FROM detil_barang where mac_address='$mac'");
$detil = mysql_num_rows($query3);

if($detil==1) {

echo '<script language="javascript">window.alert("Gagal. Mac Address sudah tersedia. Masukkan Mac Address lain. "); window.history.go(-1);</script>';

} else{

$hitung=$masuk['stock']-1;

$query = mysql_query("INSERT INTO detil_barang (id_detil, id_masuk, mac_address ,no_SN, status) VALUES('$id_detil','$masuk[id_masuk]', '$mac','$sn','available')");

$update= mysql_query("UPDATE barang_masuk set stock='$hitung' where id_masuk='$id_masuk'");

if ($query && $update){
echo 'sukses';
echo '<script language="javascript">window.alert("Data Berhasil Ditambahkan");document.location.href="?user=gudang&halaman=master_detil_barang"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
}
?>
