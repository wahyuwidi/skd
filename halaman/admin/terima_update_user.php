<?php
include('connect.php'); 

//mengambil data dari form
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$level = $_POST['level'];


// Proses Pengecekan Jika terdapat username yang sama
$check_user = mysql_query("SELECT * FROM user WHERE id_user='$id_user'");
$fetch_user = mysql_num_rows($check_user);

$sql=mysql_query ("select *from user where username!='$username'");
$user = mysql_fetch_array($sql);


if ($nama==null)
{
echo '<script language="javascript">alert("Nama harus diisi! "); window.history.go(-1);</script>';
} 
else if ($jabatan==null)
{
echo '<script language="javascript">alert("Jabatan harus diisi! "); window.history.go(-1);</script>';
}
else if ($username==null)
{
echo '<script language="javascript">alert("Username Tidak Boleh Kosong! "); window.history.go(-1);</script>';
} 
else if ($password==null)
{
echo '<script language="javascript">alert("Password Tidak Boleh Kosong! "); window.history.go(-1);</script>';
} 
 
else { 
$query = mysql_query ("UPDATE user set username='$username', password='$password', nama='$nama', jabatan='$jabatan', level='$level' where id_user=$id_user");

if ($query) {echo '<script language="javascript">window.alert("User Telah Terupdate! "); document.location.href="?user=admin&halaman=master_user"</script>';}
 else if (mysql_errno()==1062)
{  
echo '<script language="javascript">alert("Username yang anda masukkan sudah ada! Silahkan masukkan username lain! "); window.history.go(-1);</script>';
}
else {echo '<script language="javascript">window.alert("Sorry an error has occurred."); window.history.go(-1);</script>'; }
} 

?>
