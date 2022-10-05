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
 <?php include('accountant/menu.php');?>
   
  <div id="sidebar-1" class="span-5 border">
  
	
    </div>
<div id="content" class="span-13 border">
<br /><br />
<br /><br />
<h3>Monthly Payment Form</h3>

<form action="" method="POST" name="stud" onsubmit="return errorins();" target="_self">
                               
								<p> 
								

<br /><br /> 	
<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Member ID: </b>
<?php
echo "<select name=id required=required>";

$query = "SELECT * FROM member  ";
$result = mysql_query($query) or die(mysql_error());


?>
<option value="" >----Select Customer Id----</option>
<?php
while ($row = mysql_fetch_array($result))
{


	

	 echo "<option value='".$row['id']."'>".$row['id'] ."</option>";

}
      
echo "</select>";
?><br />
 <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Birr:</b><input  name="pay"  type="number" min="1"   required="required"/><br /><br /> 
 					                                                               
					</p>                               									
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                               
									<input type="submit" value="Paid" name="reg" class="btn"/> 
									<input  type="reset" value="Reset" class="btn"/><br /><br />
								
								
								</p>		
                            </form>
                            		<?php
								$data = mysql_query("SELECT * FROM payment ") or die(mysql_error());
echo "<b style='color: green'>Total Number of Monthly Paid Members: ".mysql_num_rows($data);

								 Print "<table border=1 cellpadding=3>"; 
 Print "<tr>";
 print "<th colspan='7'><span  style='color: #44a2ee;' /><u> Member Payments   </u></span></th>";
print "</tr>";
 print "<tr style='background-color: #44a2ee'>";
 Print "<th>Member Id</th>";
 Print "<th>Date</th>";
Print "<th>Birr </th>";

 

 Print "</tr>"; 
 $data = mysql_query("SELECT * FROM payment ") or die(mysql_error());
$sum=0;
 while($info = mysql_fetch_array( $data )) 
 { 
 $sum=$sum+$info['status'];
Print "<tr>"; 
 print "<td>".$info['member_id']; 
 print "<td>".$info['date'];  
 print "<td>".$info['status']; 
 
 //echo '<td><a href="delete.php?id=' . $info['course_code'] . '">Delete</a></td>';
  
  
  Print "</tr>";
 
 

 }
Print "<tr bgcolor=aqua>";
 print "<td colspan='3' > Total : <b>".$sum;
 print "  Birr </b></tr></table>";
 ?>
            <?php

if(isset($_POST['reg']))
{
	
$id=$_POST['id'];		
		
$pay=$_POST['pay'];


$d=date("d-m-Y");
$dataa = mysql_query("SELECT * FROM payment WHERE member_id='$id' ") or die(mysql_error());
$info=mysql_fetch_array($dataa);
$r=$info['date'];
$dd=date("m");
         list($ed, $em, $ey) = explode("-", $r);
         //while(mysql_fetch_array($dataa)){
		 	
if($dd == $em){
	echo "<script>alert(\"Error: This  is Already Paid\") </script>";
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="audit.php" </SCRIPT>'; 
}else{
	$sql1 = mysql_query("insert into payment values('','$id','$d','$pay')");
       
$query1 = mysql_query( $sql1, $conn );

   
if($sql1 > 0)
{
echo "<script>alert(\"Successfully Paid\") </script>";
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="audit.php" </SCRIPT>';  
  
}
 
else
{
echo "<script>alert(\"Error: This  is Already Exit\") </script>";
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="audit.php" </SCRIPT>';    
}

	
	}


}
 
?>               

</div>
<div class="span-6 last">
	



</div>
</body>
</html>