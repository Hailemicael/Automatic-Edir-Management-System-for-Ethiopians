
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
 <?php include('menu.php');?>
   
  <div id="sidebar-1" class="span-5 border">
  
	
    </div>
<div id="content" class="span-13 border">
<br /><br />
<?php

include('library/connection.php');
?>
<?php
if(isset($_POST['submit']))
{

$email=$_POST['email'];
$comment=$_POST['comment'];
		
if( $comment!="") 
{
	
	$Y=date("Y-m-d");
$query=mysql_query("insert into comment values('$email','$comment','$Y','')");
if($query==1)
{
echo "<script>alert(\"Thank you for your comment\") </script>";
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="feed.php" </SCRIPT>';  
  
}
 
else
{
echo "<script>alert(\"Incorrect\") </script>";
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="feed.php" </SCRIPT>';    
}
}
else
{
echo "<script>alert(\"Incorrect\") </script>";
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="feed.php" </SCRIPT>';   
}

}
?>
<marquee behavior="scroll" direction="ltr"><h3>Welcome to comment area</h3></marquee>
<fieldset>
	<legend align="center"><b><h2 style="color: #20df2f">Write your comment here</h2></b></legend>
<form action="feed.php" method="POST" enctype="multipart/form-data" name="user" onsubmit="return error();">
		<br /><br /> Email: <input type="text" name="email"  placeholder="email" size="50"><br /><br />
			<textarea required="required" onKeyPress="check_length(this.form);" onKeyDown="check_length(this.form);" rows="5" cols="50" wrap="wrap" placeholder="comment" name="comment"></textarea><br /><br />
		<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Send" name="submit" class="btn"/>&nbsp;&nbsp;&nbsp;<input type="Reset" value="Clear" class="btn"/><br /><br />
		</form></fieldset>
</div>
<div class="span-6 last">
	



</div>
</body>
</html>