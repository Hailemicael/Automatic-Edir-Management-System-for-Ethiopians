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
include('library/connection.php');
?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script> 
function printContent(el){ 
var restorepage = document.body.innerHTML; 
		 var printcontent = document.getElementById(el).innerHTML; 
		 document.body.innerHTML = printcontent; window.print(); 
		 document.body.innerHTML = restorepage; 
		 } 
		 </script>
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
		<img src="images/logo.jpg" />
    </div>
 <?php include('manager/menu.php');?>
   
  <div id="sidebar-1" class="span-5 border">
  
	
    </div>
<div id="content" class="span-13 border">
<br /><br />

<h2>Punishement Report</h2>
<button onclick="printContent('div1')" >Print the Report</button><br />
 
								<?php
								$data = mysql_query("SELECT * FROM punishment ") or die(mysql_error());
echo "<b style='color: green'>Total Number of Punished Members: ".mysql_num_rows($data);

								 Print "<table border=1 cellpadding=3>"; 
 Print "<tr>";
 print "<th colspan='7'><span  style='color: #44a2ee;' /><u> Punishment Filles   </u></span></th>";
print "</tr>";
 print "<tr style='background-color: #44a2ee'>";
 Print "<th>ID</th>";
 Print "<th>Reason</th>";
Print "<th>Birr </th>";

 Print "</tr>"; 
 $data = mysql_query("SELECT * FROM punishment ") or die(mysql_error());
$sum=0;
 while($info = mysql_fetch_array( $data )) 
 { 
 $sum=$sum+$info['birr'];
Print "<tr>"; 
 print "<td>".$info['id']; 
 print "<td>".$info['reason'];  
 print "<td>".$info['birr'];  
 //echo '<td><a href="delete.php?id=' . $info['course_code'] . '">Delete</a></td>';
  
 //echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Delete: ". $info['id']." ?');\" href='del_p.php?id=".$info['id']."' class=btn><span  style='color: red;' />Delete</span></a></td><tr>";
  Print "</tr>";
 
 

 }




 Print "<tr bgcolor=aqua>";
 print "<td colspan='3' > Total : <b>".$sum;
 print "  Birr </b></tr></table>";
 ?>


</div></div>
<div class="span-6 last">
	


</div>
</body>
</html>