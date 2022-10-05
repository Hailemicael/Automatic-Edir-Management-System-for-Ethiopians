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
 <?php include('manager/menu.php');?>
   
  <div id="sidebar-1" class="span-5 border">
  
	
    </div>
<div id="content" class="span-13 border">
<br /><br />


    <?php
if(isset($_POST['submit']))
{


session_start();
 $id= $_SESSION['user'];
 $opass=$_POST['old'];
 
 $pass = $_POST['pass'];
 $cpass = $_POST['con'];
 
if ($pass==$cpass){
$sq = "SELECT  *
    FROM manager
    WHERE password='$opass' and id = '$id';";
$retva = mysql_query( $sq, $conn );
if(mysql_num_rows($retva) == 0)
{
	
  echo "<script>alert(\"Incorrect old password\") </script>";
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="mpass.php" </SCRIPT>';
}
else{
	$enc = $pass;
	$sql = "UPDATE manager ".
       "SET password = '$enc' ".
       "WHERE id = '$id' and password = '$opass'" ;

$retva = mysql_query( $sql, $conn );
echo "<script>alert(\"Successfully Changed The Password\") </script>";
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="login.php" </SCRIPT>';
}

}
else{
	
	echo "<script>alert(\"The Password is not Mached\") </script>";
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="mpass.php" </SCRIPT>';
}
}
?>

   
<form method="post" action="" name="user" onsubmit="return error();">
<b><i><h3>Please fill the following form to Change your password </h3> </i></b><br /><br />
Enter your Old Password: &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;<input type="password" required="required" name="old" placeholder="Old Password"/><br /><br />
Enter your New Password: &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;<input type="password" onKeyPress="check_length(this.form);" onblur="check_lengthh(this.form);" required="required" name="pass" placeholder="New Password"/><br /><br />
Confirm New Password: &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;<input type="password" required="required" name="con" onKeyPress="check_length(this.form);" onblur="check_lengthh(this.form);" placeholder="Confirm Password"/><br /><br />

	<br /><br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit" value="Changed" class="btn">
<input type="Reset" name ="reset" value ="Cancel" class="btn"/><br /><br />

</form>
</div>
<div class="span-6 last">
	


</div>
</body>
</html>