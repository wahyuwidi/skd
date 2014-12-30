<?php
include('connect.php'); 

//mengambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$level = $_POST['level'];
$enc_password = md5($password);

// Proses Pengecekan Jika terdapat username yang sama
$check_user = mysql_query("SELECT * FROM user WHERE username='$username'");
$fetch_user = mysql_num_rows($check_user);

if ($password != $repassword)
{
echo '<script language="javascript">window.alert("Password salah! Ulangi kembali"); window.history.go(-1);</script>';
} 
else if ($nama==null)
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
else if ($fetch_user == 1)
{
echo '<script language="javascript">alert("Username yang anda masukkan sudah ada! Silahkan masukkan username lain! "); window.history.go(-1);</script>';
} 
else { 
$query = mysql_query ("INSERT INTO user (username, password, nama, jabatan, level) VALUES('$username', '$enc_password', '$nama', '$jabatan', '$level')");

if ($query) {echo '<script language="javascript">window.alert("Register SUKSESS!! Silahkan login kembali! "); document.location="login.php";</script>';}
 
else {echo '<script language="javascript">window.alert("Terjadi Kesalahan Sistem! Silahkan Register Kembali! "); document.location="register.php";</script>'; }
} 

?>
