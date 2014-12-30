<?php 
	session_start(); 
	include("connect.php");
	$cryptinstall="crypt/cryptographp.fct.php";
	include $cryptinstall;
	
	$username = $_POST['username']; 
	$password = $_POST['password'];
	$op = $_GET['op']; 
	$chaptchaa = (chk_crypt($_POST['code']));
	
	$queries=sprintf("SELECT * FROM user where username='%s'",mysql_real_escape_string($username));
	$ceklogin=mysql_query($queries);
	$result=mysql_fetch_array($ceklogin);
	
	$username2 = $result['username'];
	$passwd = $result['password'];
	
	
	if($chaptchaa != false) {
	
		if($username == $username2) {
			if($password == $passwd) {
			
			$_SESSION['username'] = $result['username'];
			$_SESSION['password'] = $result['password'];	
	        $_SESSION['level'] = $result['level'];
			
			if($result['level']=="admin"){ 
	            header("location:index.php"); 
	        }else if($result['level']=="gudang"){ 
	            header("location:index.php"); 
	        } else if($result['level']=="karyawan"){ 
	            header("location:index.php"); 
	        } else if($result['level']=="pimpinan"){ 
	            header("location:index.php"); 
	        }  
			
			} else {
			echo '<script language="javascript">alert("Login gagal! Password Salah! "); window.history.go(-1);</script>';
		}
		
		}else {
			echo '<script language="javascript">alert("Login gagal! Username Salah! "); window.history.go(-1);</script>';
		}
	
	   

	} else {	 
		
			echo "<script type='text/javascript'>alert('CAPTCHA ANDA SALAH');window.location='index.php';</script>";
				
		
	}
	
	
	
		?>