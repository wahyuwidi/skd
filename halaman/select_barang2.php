<!DOCTYPE html>
<?php
include('../connect.php'); 
$sql = mysql_query("SELECT * FROM barang where sisa_detil>0 ORDER BY id_barang");
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/icon.png">

	<title>Data Modem</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
	<link href="../js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../js/jquery.gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" href="../fonts/font-awesome-4/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="../../assets/js/html5shiv.js"></script>
	  <script src="../../assets/js/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="../js/jquery.nanoscroller/nanoscroller.css" />

  	<link rel="stylesheet" type="text/css" href="../js/jquery.datatables/bootstrap-adapter/css/datatables.css" />
  
	<link href="../css/style.css" rel="stylesheet" />	
    
	
	<script>
		function sendValue (s,s2,s3,s4){

			window.opener.document.getElementById('id_barang').value = s;
			window.opener.document.getElementById('nama_barang').value = s2;
			window.opener.document.getElementById('merk').value = s3;
			window.opener.document.getElementById('jenis').value = s4;
			window.close();
			}
	</script>
</head>
<body>

<div id="cl-wrapper">

  
  
    
	<div class="cl-mcont">     
				  
	  <div class="row">
				<div class="col-md-12">
					<div class="block block-color2 primary">
						<div class="header">							
							<h3>Data Modem</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Id Barang</th>
											<th>Nama Barang</th>
											<th>Merk</th>
											<th>Jenis</th>
											<th>Jumlah</th>
											<th>Stock</th>
											<th>Belum Terdaftar</th>
											<th></th>
											
										</tr>
									</thead>
									<tbody>
									<?php
										while ($barang = mysql_fetch_array($sql)){
										echo "
										<tr>
											<td class='center'>$barang[id_barang]</td>
											<td>$barang[nama_barang]</td>
											<td>$barang[merk]</td>";
											$sql2 = mysql_query("SELECT*FROM jenis_barang WHERE id_jenis = '$barang[jenis]'");
											$jenis = mysql_fetch_array($sql2);//pecah hasil query ke dalam array

										echo "<td>$jenis[nama_jenis]</td>
											  <td>$barang[total]</td>
											  <td class='center'>$barang[stock]</td>
											  <td>$barang[sisa_detil]</td>";?>
											  <td><a href="#" onClick="sendValue('<?php echo $barang['id_barang']; ?>','<?php echo $barang['nama_barang']; ?>','<?php echo $barang['merk']; ?>','<?php echo $jenis['nama_jenis']; ?>');"><span class='btn btn-prusia'><i class='fa fa-check'></i>Pilih</span></a></td>
											  
											  
										</tr>
										<?php
										
										}
									?>
											  
											 
										
									</tbody>
								</table>							
							</div>
						</div>
					</div>				
				</div>
			</div>	</div>
	
	</div> 
	
</div>
<!-- Right Chat-->
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right side-chat">
	<div class="header">
    <h3>Chat</h3>
  </div>
  <div class="sub-header" href="#">
    <div class="icon"><i class="fa fa-user"></i></div> <p>Online (4)</p>
  </div>
  <div class="content">
    <p class="title">Family</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Michael Smith</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> John Doe</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Richard Avedon</a></li>
      <li class="busy"><a href="#"><i class="fa fa-circle-o"></i> Allen Collins</a></li>
    </ul>
    
    <p class="title">Friends</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Jaime Garzon</a></li>
      <li class="outside"><a href="#"><i class="fa fa-circle-o"></i> Dave Grohl</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Victor Jara</a></li>
    </ul>   
    
    <p class="title">Work</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li><a href="#"><i class="fa fa-circle-o"></i> Ansel Adams</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Gustavo Cerati</a></li>
    </ul>
    
  </div>
</nav>
  
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.cookie/jquery.cookie.js"></script>
  <script src="../js/jquery.pushmenu/js/jPushMenu.js"></script>
	<script type="text/javascript" src="../js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
	<script type="text/javascript" src="../js/jquery.sparkline/jquery.sparkline.min.js"></script>
  <script type="text/javascript" src="../js/jquery.ui/jquery-ui.js" ></script>
	<script type="text/javascript" src="../js/jquery.gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="../js/behaviour/core.js"></script>
  
</script> <script type="text/javascript" src="../js/jquery.datatables/jquery.datatables.min.js"></script>
<script type="text/javascript" src="../js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>
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
  
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
  <script src="../js/behaviour/voice-commands.js"></script>
  <script src="../js/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.flot/jquery.flot.js"></script>
<script type="text/javascript" src="../js/jquery.flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="../js/jquery.flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="../js/jquery.flot/jquery.flot.labels.js"></script>
</body>
</html>
