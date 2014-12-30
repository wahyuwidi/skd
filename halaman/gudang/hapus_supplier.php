<?php
include('connect.php'); 

$id_supplier = $_GET['id_supplier'];

$hasil = mysql_query("DELETE FROM supplier WHERE id_supplier = '$id_supplier'");


if ($hasil){
echo 'sukses';
echo '<script language="javascript">document.location.href="?user=gudang&halaman=master_supplier"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
