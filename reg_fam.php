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
table
{
width:615;
margin-left:-100;

}
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

<br />
<form action="" method="POST" name="stud" onsubmit="return errorins();" target="_self">
                               <h2>Member Family Registration Form</h2>
								<p> 
							<b>Member ID:</b>	<?php
echo "<select name=mid required=required>";

$query = "SELECT * FROM member ";
$result = mysql_query($query) or die(mysql_error());


?>
<option value="" >----Select Member ID----</option>
<?php
while ($row = mysql_fetch_array($result))
{


	

	 echo "<option value='".$row['id']."'>".$row['id'] ."</option>";

}
      
echo "</select>";
?>
<br />
<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ID: </b><input  name="iid"  type="text"   placeholder="Enter ID" required="required" /><br /><br /> 	
<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Full Name:</b><input  name="iname"  type="text"   placeholder="Enter Name" pattern="[a-zA-Z ]+" title="please enter only characters" required="required"/><br /><br /> 
 <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Address:</b><input  name="address"  type="text" pattern="[a-zA-Z ]+" title="please enter only characters"   required="required"/><br /><br /> 
<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tel:</b><input  name="tel" pattern="[0-9+]+" title="please enter only characters"  type="tel" /><br /><br /> 
<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gender:</b><select name="sex" required="true">
	<option value="">--Select--</option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
</select><br /><br /> 

 					                                                               
					</p>                               									
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                               
									<input type="submit" value="Register" name="reg" class="btn"/> 
									<input  type="reset" value="Reset" class="btn"/><br /><br />
								
								
								</p>		
                            </form>
                           

 <?php

if(isset($_POST['reg']))
{
	
$iid=$_POST['iid'];	
$mid=$_POST['mid'];	
$address=$_POST['address'];	
$tel=$_POST['tel'];	
$sex=$_POST['sex'];	

$iname=strtoupper($_POST['iname']);
	

 $dept=$_SESSION['dept'];

		
$query=mysql_query("insert into family values('$mid','$iid','$iname','$address','$tel','$sex')");
if($query==1)
{
echo "<script>alert(\"Successfully Regestered\") </script>";
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="reg_fam.php" </SCRIPT>';  
  
}
 
else
{
echo "<script>alert(\"Error: ID is duplicatied\") </script>";
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="reg_fam.php" </SCRIPT>';    
}

	
	



}
?>
 
								<?php
								$data = mysql_query("SELECT * FROM family ") or die(mysql_error());
echo "<b style='color: green'>Total Number of Members Family: ".mysql_num_rows($data);

								 Print "<table border=1 cellpadding=3>"; 
 Print "<tr>";
 print "<th colspan='7'><span  style='color: #44a2ee;' /><u> Member family Filles   </u></span></th>";
print "</tr>";
 print "<tr style='background-color: #44a2ee'>";
 Print "<th>Member ID</th>";
 Print "<th>Family ID</th>";
 Print "<th>Name</th>";
Print "<th>Address </th>";
Print "<th>Tel </th>";
Print "<th>Gender </th>";
 

 Print "</tr>"; 
 $data = mysql_query("SELECT * FROM family ") or die(mysql_error());

 while($info = mysql_fetch_array( $data )) 
 { 
 
Print "<tr>"; 
 print "<td>".$info['mid']; 
 print "<td>".$info['id']; 
 print "<td>".$info['name'];  
 print "<td>".$info['address']; 
 print "<td>".$info['mobile']; 
 print "<td>".$info['sex']; 
 //echo '<td><a href="delete.php?id=' . $info['course_code'] . '">Delete</a></td>';
  
 echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Delete: ". $info['id']." ?');\" href='del_fam.php?id=".$info['id']."' class=btn><span  style='color: red;' />Delete</span></a></td><tr>";
  Print "</tr>";
 
 

 }
 Print "</table>";
 ?>
</div></div>
<div class="span-6 last">
	


</div>
</body>
</html>