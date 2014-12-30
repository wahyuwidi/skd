<!DOCTYPE html>
<?php 
$cryptinstall="crypt/cryptographp.fct.php";
include $cryptinstall; 
?>
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

</head>

<body class="texture">

<div id="cl-wrapper" class="login-container">

	<div class="middle-login">
		<div class="block-flat">
			<div class="header">							
				<h3 class="text-center"><img class="logo-img"/><b>LOGIN</b></h3>
			</div>
			<div>
				<form style="margin-bottom: 0px !important;" class="form-horizontal" action="proses_login.php?op=in" method="post">
					<div class="content">
						<h4 class="title">Login Access</h4>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" name="username" placeholder="Username" id="username" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password"  name="password" placeholder="Password" id="password" class="form-control">
									</div>
								</div>
							</div>
							<?php dsp_crypt(0,1); ?>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
									
										Masukkan kode diatas : 
										<input type="text"  name="code" placeholder="Kode" class="form-control">
									</div>
								</div>
							</div>
							
					</div>
					<div class="foot">
						<button class="btn btn-rad btn-block btn-success" data-dismiss="modal" type="submit">Login</button>
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
