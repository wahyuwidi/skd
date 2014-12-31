<?php 
	session_start(); 
	include("connect.php");
	$cryptinstall="crypt/cryptographp.fct.php";
	include $cryptinstall;
	
	$username = $_POST['username']; 
	$password = $_POST['password'];
	$op = $_GET['op']; 
	$_IP_SERVER = $_SERVER['SERVER_ADDR'];
	$_IP_ADDRESS = $_SERVER['REMOTE_ADDR'];
	$chaptchaa = (chk_crypt($_POST['code']));
	
	$queries=sprintf("SELECT * FROM user where username='%s'",mysql_real_escape_string($username));
	$ceklogin=mysql_query($queries);
	$result=mysql_fetch_array($ceklogin);
	
	$username2 = $result['username'];
	$passwd = $result['password'];
	
	
	if($chaptchaa != false) {
				    if($_IP_ADDRESS == $_IP_SERVER)
    {
        ob_start();
        system('ipconfig /all');
        $_PERINTAH  = ob_get_contents();
        ob_clean();
        $_PECAH = strpos($_PERINTAH, "Physical");
        $_HASIL = substr($_PERINTAH,($_PECAH+36),17);
		} else {
			$_PERINTAH = "arp -a $_IP_ADDRESS";
        ob_start();
        system($_PERINTAH);
        $_HASIL = ob_get_contents();
		ob_clean();
        $_PECAH = strstr($_HASIL, $_IP_ADDRESS);
        $_PECAH_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_PECAH));
        $_HASIL = substr($_PECAH_STRING[1], 0, 17);

	}
	$ceklogin1=mysql_query("SELECT count(*) as total FROM log_table where MAC_address='$_HASIL' ");
$result1=mysql_fetch_assoc($ceklogin1);

	if ($result1['total'] < 3){
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
			
		$_IP_SERVER = $_SERVER['SERVER_ADDR'];
    $_IP_ADDRESS = $_SERVER['REMOTE_ADDR']; 
			///echo "username atau password salah";
			    if($_IP_ADDRESS == $_IP_SERVER){
        ob_start();
        system('ipconfig /all');
        $_PERINTAH  = ob_get_contents();
        ob_clean();
        $_PECAH = strpos($_PERINTAH, "Physical");
        $_HASIL = substr($_PERINTAH,($_PECAH+36),17);
       //echo $_HASIL;
		//echo "IP:".$_IP_SERVER;
		$queries=mysql_query("insert into log_table values('$_HASIL','$_IP_ADDRESS',now())");

		} else {
			$_PERINTAH = "arp -a $_IP_ADDRESS";
        ob_start();
        system($_PERINTAH);
        $_HASIL = ob_get_contents();
		ob_clean();
        $_PECAH = strstr($_HASIL, $_IP_ADDRESS);
        $_PECAH_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_PECAH));
        $_HASIL = substr($_PECAH_STRING[1], 0, 17);
   //     echo "IP Anda : ".$_IP_ADDRESS."
     //   MAC ADDRESS Anda : ".$_HASIL;
	$queries=mysql_query("insert into log_table values('$_HASIL','$_IP_ADDRESS',now())");
	}
			echo '<script language="javascript">alert("Login gagal! Password Salah! "); window.history.go(-1);</script>';
		}
		
		}
		else {
		
		$_IP_SERVER = $_SERVER['SERVER_ADDR'];
    $_IP_ADDRESS = $_SERVER['REMOTE_ADDR']; 
			///echo "username atau password salah";
			    if($_IP_ADDRESS == $_IP_SERVER){
        ob_start();
        system('ipconfig /all');
        $_PERINTAH  = ob_get_contents();
        ob_clean();
        $_PECAH = strpos($_PERINTAH, "Physical");
        $_HASIL = substr($_PERINTAH,($_PECAH+36),17);
       //echo $_HASIL;
		//echo "IP:".$_IP_SERVER;
		$queries=mysql_query("insert into log_table values('$_HASIL','$_IP_ADDRESS',now())");

		} else {
			$_PERINTAH = "arp -a $_IP_ADDRESS";
        ob_start();
        system($_PERINTAH);
        $_HASIL = ob_get_contents();
		ob_clean();
        $_PECAH = strstr($_HASIL, $_IP_ADDRESS);
        $_PECAH_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_PECAH));
        $_HASIL = substr($_PECAH_STRING[1], 0, 17);
   //     echo "IP Anda : ".$_IP_ADDRESS."
     //   MAC ADDRESS Anda : ".$_HASIL;
	$queries=mysql_query("insert into log_table values('$_HASIL','$_IP_ADDRESS',now())");
	}
			echo '<script language="javascript">alert("Login gagal! Username Salah! "); window.history.go(-1);</script>';
			
		}
	
	 

	}
   
else {
			echo 'tunggu selama 30 detik hingga redirect ke halaman login';
			echo '<meta http-equiv="refresh" content="30;index.php?a=1"></meta>';
			mysql_query("DELETE FROM `log_table`");
}


}	
	else {	 
		
		$_IP_SERVER = $_SERVER['SERVER_ADDR'];
    $_IP_ADDRESS = $_SERVER['REMOTE_ADDR']; 
			///echo "username atau password salah";
			    if($_IP_ADDRESS == $_IP_SERVER){
        ob_start();
        system('ipconfig /all');
        $_PERINTAH  = ob_get_contents();
        ob_clean();
        $_PECAH = strpos($_PERINTAH, "Physical");
        $_HASIL = substr($_PERINTAH,($_PECAH+36),17);
       //echo $_HASIL;
		//echo "IP:".$_IP_SERVER;
		$queries=mysql_query("insert into log_table values('$_HASIL','$_IP_ADDRESS',now())");

		} else {
			$_PERINTAH = "arp -a $_IP_ADDRESS";
        ob_start();
        system($_PERINTAH);
        $_HASIL = ob_get_contents();
		ob_clean();
        $_PECAH = strstr($_HASIL, $_IP_ADDRESS);
        $_PECAH_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_PECAH));
        $_HASIL = substr($_PECAH_STRING[1], 0, 17);
   //     echo "IP Anda : ".$_IP_ADDRESS."
     //   MAC ADDRESS Anda : ".$_HASIL;
	$queries=mysql_query("insert into log_table values('$_HASIL','$_IP_ADDRESS',now())");
	}
			echo "<script type='text/javascript'>alert('CAPTCHA ANDA SALAH');window.location='index.php';</script>";
				
		
	} 

	
	
		?>
		
