<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['level']))
{
	echo "<script>window.location='login.php'</script>";
}
include("connect.php");
$level=$_SESSION['level'];
$username=$_SESSION['username'];

$sql=mysql_query ("select *from user where username='$username'");
$user = mysql_fetch_array($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Inventory Modem | PT Telkom Indonesia</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
	<link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="js/jquery.gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="../../assets/js/html5shiv.js"></script>
	  <script src="../../assets/js/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />
	
	<link rel="stylesheet" type="text/css" href="js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" type="text/css" href="js/jquery.select2/select2.css" />
	<link rel="stylesheet" type="text/css" href="js/bootstrap.slider/css/slider.css" />
	<link type="text/css" rel="stylesheet" href="js/chosen/chosen.css">
	
	<link rel="stylesheet" type="text/css" href="js/jquery.niftymodals/css/component.css" />  
<link href="js/jquery.icheck/skins/flat/green.css" rel="stylesheet">  
	
	
	<link rel="stylesheet" type="text/css" href="js/jquery.datatables/bootstrap-adapter/css/datatables.css" />

    
	<link href="css/style.css" rel="stylesheet" />	
	
 <link rel="stylesheet" type="text/css" href="js/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="js/jquery.timeline/css/component.css" />
    
</head>
<body>

<div id="cl-wrapper">

  <div class="cl-sidebar">
    <div class="cl-toggle"><i class="fa fa-bars"></i></div>
    <div class="cl-navblock">
      <div class="menu-space">
        <div class="content">
          <div class="sidebar-logo">
            <div class="logo">
                <a href="index.php">INVENTORY MODEM</a>
            </div>
			
          </div>
          
		  <?php include ("_sidebar.php"); ?>

		  
        </div>
      </div>
      <div class="text-right collapse-button" style="padding:7px 9px;">
        
        <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
      </div>
    </div>
  </div>
	<div class="container-fluid" id="pcont">
   <!-- TOP NAVBAR -->
  <div id="head-nav" class="navbar navbar-default">
  
    <div class="container-fluid">
      <div class="navbar-collapse">
        <ul class="nav navbar-nav navbar-right user-nav">
          <li class="dropdown profile_menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img alt="Avatar" src="images/user.png" width="30px"/><span> <?php echo $username; ?> (<?php echo $level; ?>)</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#" class="md-trigger" data-modal="ganti_password">Ubah Profil</a></li>
              
              <li class="divider"></li>
              <li><a href="logout.php">Sign Out</a></li>
            </ul>
          </li>
        </ul>			

      </div><!--/.nav-collapse animate-collapse -->
    </div>
  </div>
  
    
	<div >
	<!-- page start-->
              <?php
			 
				$v_cat = (isset($_REQUEST['user'])&& $_REQUEST['user'] !=NULL)?$_REQUEST['user']:'';
				$v_page = (isset($_REQUEST['halaman'])&& $_REQUEST['halaman'] !=NULL)?$_REQUEST['halaman']:'';
				if(file_exists("halaman/".$v_cat."/".$v_page.".php"))
				{
					include("halaman/".$v_cat."/".$v_page.".php");
				}else{
					include("home.php");
				}
				
				
				?>
    <!-- page end-->
	
	           <!-- Nifty Modal -->
                <div class="md-modal colored-header custom-width md-effect-9" id="ganti_password">
                    <div class="md-content">
                      <div class="modal-header">
                        <h3>Ganti Password</h3>
                        <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      </div>
                      <div class="modal-body form">
					  <form method="post" action="ubah_profil.php">
					  <input type="hidden" class="form-control" name="id_user" value="<?php echo $user['id_user']?>">
                        <div class="form-group">
                          <label>Username</label> <input type="text" class="form-control" name="username" value="<?php echo $username?>">
                        </div>
                        <div class="form-group">
                          <label>Password Lama</label> <input type="password"  name="passwordlama" class="form-control">
                        </div>
						<div class="form-group">
                          <label>Password Baru</label> <input type="password"  name="passwordbaru" class="form-control">
                        </div>
						<div class="form-group">
                          <label>Konfirmasi Password Baru</label> <input type="password"  name="konfirmasipasswordbaru" class="form-control">
                        </div>
                     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-flat md-close" name="Submit" value="Submit" data-dismiss="modal">OK</button>
                      </div>
                    </div>
					</form>
                </div>
 
	
	</div>
	
	</div> 
	
</div>

  
	<script src="js/jquery.js"></script>
	<script src="js/jquery.cookie/jquery.cookie.js"></script>
  <script src="js/jquery.pushmenu/js/jPushMenu.js"></script>
	<script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
	<script type="text/javascript" src="js/jquery.sparkline/jquery.sparkline.min.js"></script>
  <script type="text/javascript" src="js/jquery.ui/jquery-ui.js" ></script>
	<script type="text/javascript" src="js/jquery.gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="js/behaviour/core.js"></script>
	
	
	<script type="text/javascript" src="js/bootstrap.switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/jquery.select2/select2.min.js" ></script>
<script type="text/javascript" src="js/bootstrap.slider/js/bootstrap-slider.js" ></script>
<script type="text/javascript" src="js/jquery.icheck/icheck.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      
      /*Switch*/
      $('.switch').bootstrapSwitch();
      
      /*DateTime Picker*/
        $(".datetime").datetimepicker({format: 'yyyy-mm-dd'});
     
	 $('#tanggal').datepicker({
            format: 'yyyy-mm-dd',
			autoclose: true,
			todayHighlight: true
			
        });
		
		$('#tanggal2').datepicker({
            format: 'yyyy-mm-dd',
			autoclose: true,
			todayHighlight: true
			
        });
	  
      /*Select2*/
        $(".select2").select2({
          width: '100%'
        });
      
       /*Tags*/
        $(".tags").select2({tags: 0,width: '100%'});
      
       /*Slider*/
        $('.bslider').slider();     
      
      /*Input & Radio Buttons*/
        $('.icheck').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
    });
</script>


 

  <script src="js/chosen/chosen.jquery.js" type="text/javascript"></script>

  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>


</script> <script type="text/javascript" src="js/jquery.datatables/jquery.datatables.min.js"></script>
<script type="text/javascript" src="js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>

<script type="text/javascript">
      //Add dataTable Functions
     
    
    $(document).ready(function(){
      //initialize the javascript
      //Basic Instance
      $("#datatable").dataTable();
      
      //Search input style
      $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
      $('.dataTables_length select').addClass('form-control');    
          
       /* Formating function for row details */
        function fnFormatDetails ( oTable, nTr )
        {
            var aData = oTable.fnGetData( nTr );
            var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
            sOut += '<tr><td>Rendering engine:</td><td>'+aData[1]+' '+aData[4]+'</td></tr>';
            sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
            sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
            sOut += '</table>';
             
            return sOut;
        }
       
        /*
         * Insert a 'details' column to the table
         */
        var nCloneTh = document.createElement( 'th' );
        var nCloneTd = document.createElement( 'td' );
        nCloneTd.innerHTML = '<img class="toggle-details" src="images/plus.png" />';
        nCloneTd.className = "center";
         
        $('#datatable2 thead tr').each( function () {
            this.insertBefore( nCloneTh, this.childNodes[0] );
        } );
         
        $('#datatable2 tbody tr').each( function () {
            this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
        } );
         
        /*
         * Initialse DataTables, with no sorting on the 'details' column
         */
        var oTable = $('#datatable2').dataTable( {
            "aoColumnDefs": [
                { "bSortable": false, "aTargets": [ 0 ] }
            ],
            "aaSorting": [[1, 'asc']]
        });
         
        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */
        $('#datatable2').delegate('tbody td img','click', function () {
            var nTr = $(this).parents('tr')[0];
            if ( oTable.fnIsOpen(nTr) )
            {
                /* This row is already open - close it */
                this.src = "images/plus.png";
                oTable.fnClose( nTr );
            }
            else
            {
                /* Open this row */
                this.src = "images/minus.png";
                oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
            }
        } );
        
      $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
      $('.dataTables_length select').addClass('form-control');    

    });
</script>
  

</script> <script type="text/javascript" src="js/jquery.icheck/icheck.js"></script>
<script src="js/jquery.niftymodals/js/jquery.modalEffects.js"></script>
<script type="text/javascript"> 
    $(document).ready(function(){
      //initialize the javascript
			 $('.md-trigger').modalEffects();
        $('input').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
    });
</script>

 </script> <script src="js/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
    //initialize the javascript
    $("[data-mask='date']").mask("99/99/9999");
    $("[data-mask='phone']").mask("(9999) 999999");
    $("[data-mask='phone-ext']").mask("(999) 999-9999? x99999");
    $("[data-mask='phone-int']").mask("+33 999 999 999");
    $("[data-mask='taxid']").mask("99-9999999");
    $("[data-mask='ssn']").mask("999-99-9999");
    $("[data-mask='product-key']").mask("a*-999-a999");
    $("[data-mask='percent']").mask("99%");
    $("[data-mask='currency']").mask("$999,999,999.99");
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
