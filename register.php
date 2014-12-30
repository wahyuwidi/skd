<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/favicon.html">

	<title>PT Telkom Indonesia</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
	<link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

	<link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="../../assets/js/html5shiv.js"></script>
	  <script src="../../assets/js/respond.min.js"></script>
	<![endif]-->

	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet" />	
	<link href="js/jquery.icheck/skins/flat/green.css" rel="stylesheet"> 

</head>

<body class="texture">

<div id="cl-wrapper" class="register-container">

	<div class="middle-register">
		<div class="block-flat success-box">
			<div class="header">							
				<h3 class="text-center"><img class="logo-img"/><b>REGISTER</b></h3>
			</div>
			<div>
				<form style="margin-bottom: 0px !important;" class="form-horizontal" action="terima_register.php" method="post">
					<div class="content">
					
					<div class="form-group">
						<label>Nama Lengkap</label> <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" class="form-control">
					</div>
					<div class="form-group">
						<label>Jabatan</label> <input type="text" name="jabatan" placeholder="Masukkan Jabatan" class="form-control">
					</div>
						
					<div class="form-group">
						<label>Username</label> <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label> <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
						 <input type="password"  name="repassword" placeholder="Ulangi Password" class="form-control">
					</div>
					<div class="form-group">
						<label>Login Sebagai : </label>
						
						  <label class="radio-inline"> <input class="icheck" type="radio" checked="" name="level" value="admin"> Admin</label> 
						  <label class="radio-inline"> <input class="icheck" type="radio" name="level" value="gudang"> Gudang</label> 
						  <label class="radio-inline"> <input class="icheck" type="radio" name="level" value="karyawan"> Karyawan</label> 
						  <label class="radio-inline"> <input class="icheck" type="radio" name="level" value="pimpinan"> Pimpinan</label> 
						
					</div>
					
													
					</div>
					<div class="foot">
						<button class="btn btn-rad btn-block btn-danger" data-dismiss="modal" type="button" onClick='location="login.php"'>Cancel</button>
						<button class="btn btn-rad btn-block btn-success" data-dismiss="modal" type="submit">Register</button>
					</div>
				</form>
			</div>
		</div>
		<div class="text-center out-links"><a href="#">Inventory Modem &copy; 2014 PT TELKOM INDONESIA CO BOYOLALI</a></div>
	</div> 
	
</div>

<script src="js/jquery.js"></script>
	<script type="text/javascript">
    $(function(){
      $("#cl-wrapper").css({opacity:1,'margin-left':0});
    });
  </script>

  
  <script type="text/javascript" src="js/jquery.icheck/icheck.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    
      
      /*Input & Radio Buttons*/
        $('.icheck').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
    });
</script>
  
  
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
  <script src="js/behaviour/voice-commands.js"></script>
  <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.flot/jquery.flot.js"></script>
<script type="text/javascript" src="js/jquery.flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="js/jquery.flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="js/jquery.flot/jquery.flot.labels.js"></script>
</body>
</html>
