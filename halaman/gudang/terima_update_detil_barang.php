<?php
include('connect.php'); 

//mengambil data dari form
$id_detil= $_POST['id_detil'];
$id_barang = $_POST['id_barang'];
$id_barang2 = $_POST['id_barang2'];
$mac= $_POST['mac'];

$query3 = mysql_query("SELECT*FROM barang WHERE id_barang= '$id_barang'");
$barang = mysql_fetch_array($query3);


$query4 = mysql_query("SELECT*FROM barang WHERE id_barang= '$id_barang2'");
$barang2 = mysql_fetch_array($query4);

if ($id_barang==$id_barang2){
$update = mysql_query("UPDATE detil_barang SET mac_address = '$mac',  id_barang = '$id_barang'  WHERE id_detil = '$id_detil'");

if ($update){
echo '<script language="javascript">window.alert("Update Data Berhasil");document.location.href="?user=gudang&halaman=master_detil_barang"</script>';
}
else if (mysql_errno()==1062)
{  
echo '<script language="javascript">alert("Gagal. Mac Address sudah tersedia. Masukkan Mac Address lain!"); window.history.go(-1);</script>';
}

else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}

}else{

$hitung2=($barang2['sisa_detil'])+1;
$hitung=($barang['sisa_detil'])-1;



/*if($status=='available') {
$delete =mysql_query("delete from barang_keluar where id_detil='$id_detil'");
$update = mysql_query("UPDATE detil_barang SET mac_address = '$mac', no_SN = '$sn', id_masuk = '$id_masuk'  WHERE id_detil = '$id_detil'");

} else {

$update = mysql_query("UPDATE detil_barang SET mac_address = '$mac', no_SN = '$sn', id_masuk = '$id_masuk'  WHERE id_detil = '$id_detil'");
}
*/
$update = mysql_query("UPDATE detil_barang SET mac_address = '$mac',  id_barang = '$id_barang'  WHERE id_detil = '$id_detil'");
$update1 = mysql_query("UPDATE barang SET sisa_detil = '$hitung2' WHERE id_barang = '$id_barang2'");
$update2 = mysql_query("UPDATE barang SET sisa_detil = '$hitung' WHERE id_barang = '$id_barang'");



if ($update && $update1 && $update2){
echo '<script language="javascript">window.alert("Update Data Berhasil");document.location.href="?user=gudang&halaman=master_detil_barang"</script>';
}
else if (mysql_errno()==1062)
{  
echo '<script language="javascript">alert("Gagal. Mac Address sudah tersedia. Masukkan Mac Address lain!"); window.history.go(-1);</script>';
}

else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}

}
?>
