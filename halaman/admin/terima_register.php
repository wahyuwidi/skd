<?php
include('connect.php'); 

//mengambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$level = $_POST['level'];


// Proses Pengecekan Jika terdapat username yang sama
$check_user = mysql_query("SELECT * FROM user WHERE username='$username'");
$fetch_user = mysql_num_rows($check_user);

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
else if ($fetch_user == 1)
{
echo '<script language="javascript">alert("Username yang anda masukkan sudah ada! Silahkan masukkan username lain! "); window.history.go(-1);</script>';
} 
else { 
$query = mysql_query ("INSERT INTO user (username, password, nama, jabatan, level) VALUES('$username', '$password', '$nama', '$jabatan', '$level')");

if ($query) {echo '<script language="javascript">window.alert("User Baru Berhasil Ditambahkan! "); document.location.href="?user=admin&halaman=master_user"</script>';}
 
else {echo '<script language="javascript">window.alert("Sorry an error has occurred. Data Tidak Valid"); window.history.go(-1);</script>'; }
} 

?>
