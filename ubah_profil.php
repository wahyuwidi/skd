<?php
include ('connect.php');
$id_user = $_POST['id_user'];
$passwordlama = $_POST['passwordlama'];

$passwordbaru = $_POST['passwordbaru'];

$konfirmasipasswordbaru = $_POST['konfirmasipasswordbaru'];

$username = $_POST['username'];


$cekuser = mysql_query("SELECT * FROM user where id_user='$id_user'");
$count =mysql_num_rows($cekuser);
$usr =mysql_fetch_array($cekuser);
if ($passwordbaru != $konfirmasipasswordbaru)
{
echo '<script language="javascript">window.alert("Konfirmasi Password Tidak Sama"); window.history.go(-1);</script>';
}
else if ($passwordlama != $usr['password'])
{
echo '<script language="javascript">window.alert("Password Salah"); window.history.go(-1);</script>';
}
else if($count == 1)
		{
			$querryy=mysql_query("update user set username='$username', password='$passwordbaru' where id_user='$id_user'");
			
			if ($querryy) {echo '<script language="javascript">window.alert("Profil Anda Berhasil Diganti!! Silahkan Login Kembali. "); document.location.href="logout.php"</script>';}
 else if (mysql_errno()==1062)
{  
echo '<script language="javascript">alert("Username yang anda masukkan sudah ada! Silahkan masukkan username lain! "); window.history.go(-1);</script>';
}
else {echo '<script language="javascript">window.alert("Sorry an error has occurred."); window.history.go(-1);</script>'; }
} 
		
?>