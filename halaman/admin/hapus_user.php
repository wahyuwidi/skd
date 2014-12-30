<?php
include('connect.php'); 

$id_user = $_GET['id_user'];

$hasil = mysql_query("DELETE FROM user WHERE id_user = '$id_user'");


if ($hasil){
echo 'sukses';
echo '<script language="javascript">document.location.href="?user=admin&halaman=master_user"</script>';

}else{
echo '<script language="javascript">window.alert("Gagal : '.mysql_error().' "); window.history.go(-1);</script>';
}
?>
