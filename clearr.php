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
 <?php include('manager/menu.php');?>
   
  <div id="sidebar-1" class="span-5 border">
  
	
    </div>
<div id="content" class="span-13 border">
<h2>Members Clearance Replay Area</h2>
<br />


 
								<?php

								 Print "<table border=1 cellpadding=3>"; 
 Print "<tr>";
 print "<th colspan='7'><span  style='color: #44a2ee;' /><u>  Clearance Request   </u></span></th>";
print "</tr>";
 print "<tr style='background-color: #44a2ee'>";
 Print "<th> ID</th>";
 Print "<th>Reason</th>";
Print "<th>Date </th>";
Print "<th>Replay From Manager </th>";
Print "<th> </th>";
Print "<th> </th>";
 

 Print "</tr>"; 
 $data = mysql_query("SELECT * FROM clearance ") or die(mysql_error());

 while($info = mysql_fetch_array( $data )) 
 { 
 
Print "<tr>"; 
 print "<td>".$info['id']; 
 print "<td>".$info['content'];  
 print "<td>".$info['date']; 
 print "<td>".$info['replay']; 
 //echo '<td><a href="delete.php?id=' . $info['course_code'] . '">Delete</a></td>';
  if($info['replay']==''){
 	
 echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Allow: ". $info['id']." ?');\" href='cleara.php?id=".$info['id']."' class=btn><span  style='color: green;' />Allow</span></a></td>";
  echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Not Allowed: ". $info['id']." ?');\" href='clearaa.php?id=".$info['id']."' class=btn><span  style='color: red;' />Not Allowed</span></a></td>";
	}
  
  Print "</tr>";
 
 

 }
 Print "</table>";
 ?>
</div>
<div class="span-6 last">
	

</div>
</body>
</html>