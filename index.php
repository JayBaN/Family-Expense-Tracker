<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Expense Manager Alden</title>
    <link href="css/style.css" rel="stylesheet">
  </head>
  <?php 
  	require('connection/connection.php');
  	require('functions/system.php');
  	$system = new System();

  	$page = (isset($_GET['rdf_rd']) && $_GET['rdf_rd'] != '') ? $_GET['rdf_rd'] : '';
	$page = (isset($_GET['rdf_rd']) && $_GET['rdf_rd'] != '') ? $_GET['rdf_rd'] : '';
  ?>
  <body>
  <div id="container">
  	<div id="header">
  		<!-- CSS DROPDOWN-->
  		<ul>
  		  <li class="dropdown">
		    <a href="index.php?rdf_rd=95dd1ee0abf4c20f8562fhsfhfuy898ca4c13be7ee4a355d0ec974aasdfsdfwec875c3d2ca2f7960847807e5cc80ab03058618306a" class="dropbtn">Home</a>
		  </li>
		  <li class="dropdown">
		    <a href="javascript:void(0)" class="dropbtn">Accounts</a>
		    <div class="dropdown-content">
		      <a href="index.php?rdf_rd=95dd1ee0abf4c20f8562fhsfhfuy898ca4c13be7ee4a3552i3b42i3b42b34ibibfwiubfisub80ab03058618306a">Show Accounts</a>
		      <a href="index.php?rdf_rd=95dd1ee0abf4c20f8562fhsfhfuy898ca4c13be7ee4a355d0ec974c875c3d2ca2f7960847807e5cc80ab03058618306a">Add New Account</a>
		    </div>
		  </li>
		  <li class="dropdown">
		    <a href="javascript:void(0)" class="dropbtn">Generate Reports</a>
		    <div class="dropdown-content">
		      <a href="#">Monthly</a>
		    </div>
		  </li>
		</ul>
		<!-- CSS END DROPDOWN-->
  	</div>
  	<div id="body"> 
	  	<div id="information">
	  	<?php
		    require('controller/pages.php');
		?>
	  	</div>
  	</div>
  </div>
  </body>
</html>
