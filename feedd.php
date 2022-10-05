<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
session_start();
if(!isset($_SESSION['user'])){
    echo "<script>alert(\"Session has been expired\") </script>";
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="login.php" </SCRIPT>';
}
?>
<?php

include('library/connection.php');
?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Edir management system</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="css/menu.css" type="text/css">
<link rel="stylesheet" href="css/print.css" type="text/css" media="print">
<script language="javascript" src="javascript/jquery.min.js"></script>
<script language="javascript" src="javascript/jquery.bxSlider.js"></script>
<script language="javascript" src="javascript/jcarousellite_1.0.1.js"></script>    
<!--[if IE]>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection">
<![endif]-->
<style>
body{ margin-top:10px; background:#ffffff url(images/bg-body.jpg) repeat-x;  }
</style>
<script type="text/javascript">
	$(document).ready(function(){
        $(".newsticker-jcarousellite").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 3,
		auto:500,
		speed:1000
	});
	$('div#listBox').hover(
			function(){
				$(this).addClass('mouseHover');
			},
			function(){
				$(this).removeClass('mouseHover');
			}
	);//hover
});
</script>
<style>
</style>
</head>

<body>

<div class="container">
	<div id="header" class="span-24">
		<center><img src="images/logo.jpg" /></center>
    </div>
 <?php include('Manager/menu.php');?>
   
  <div id="sidebar-1" class="span-5 border">
  
	
    </div>
<div id="content" class="span-13 border">
<br /><br />
<br /><br />

<marquee behaviour='slid' direction='right'><h1>User's Comment</h1></marquee>
  <?php 
 // Connects to your Database 
 
 $data = mysql_query("SELECT * FROM comment where cday!='' ORDER BY cday desc") or die(mysql_error());
 Print "<table border=1  width=550px>"; 
 Print "<tr style='background-color:  #44a2ee;'>"; 

 Print "<th >Comment</th>";
 Print "<th>emal</th>";
 Print "<th>Date</th>";
 Print "<th>&nbsp;</th>"."\n";  ;
 Print "</tr>"; 

 while($info = mysql_fetch_array( $data )) 
 { 
 
Print "<tr>"; 
 print "<td>".wordwrap($info['comment'],40,"<br>\n",TRUE);
 print "<td>".$info['emaill']; 
print "<td>".$info['cday'];
   
  
  Print "</tr>";

 
 

 } 
  Print "</table>";

 ?>   
</div>
<div class="span-6 last">
	

</div>
</body>
</html>