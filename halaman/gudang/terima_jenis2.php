<?php
include('connect.php'); 

//mengambil data dari form
$id_jenis = $_POST['id_jenis'];
$nama_jenis = $_POST['nama_jenis'];


$query = mysql_query("INSERT INTO jenis_barang (id_jenis, nama_jenis) VALUES('$id_jenis', '$nama_jenis')");

if ($query){
echo 'sukses';
echo '<script language="javascript">window.alert("Data Berhasil Ditambahkan");document.location.href="?user=admin&halaman=master_jenis_barang"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
