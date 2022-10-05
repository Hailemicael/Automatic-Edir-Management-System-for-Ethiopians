<?php 
include('library/connection.php');
?>
<?php
session_start();
session_destroy();
unset($_SESSION['user']);


?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>IOT based coma patient monitering system</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="css/menu.css" type="text/css">
<link rel="stylesheet" href="css/print.css" type="text/css" media="print">
<script language="javascript" src="javascript/jquery.min.js"></script>
<script language="javascript" src="javascript/jquery.bxSlider.js"></script>
<script language="javascript" src="javascript/jcarousellite_1.0.1.js"></script>    
<script>
function noBack(){
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
}
</script> 
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

<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

<div class="container">
	<div id="header" class="span-24">
		<center><img src="images/logo.jpg" /></center>
    </div>

   
  <div id="sidebar-1" class="span-5 border">
  
	
    </div>
<div id="content" class="span-13 border">
<form action="login.php" method="POST" name="user" onsubmit="return error();">
                            <br /><br />  <fieldset> <legend align="center">  <h1 style="color: #44a2ee;"> Sign In </h1> </legend> 
						  
								
 <?php
 if(isset($_POST['Logi']))
{
	
    session_start();
	
 $_SESSION['user'] = ucwords($_POST['un']);
 
 
 $password = trim($_POST['password']);
$username=$_POST['un'];

  $query = "SELECT  *
    FROM admin
    WHERE  password='$password' AND username='$username'"; 
    $result = mysql_query($query) or die(mysql_error());
    
  $member = "SELECT  *
    FROM member
    WHERE  password='$password' AND id='$username'"; 
    $result_r = mysql_query($member) or die(mysql_error());
    
      $accountant = "SELECT  *
    FROM accountant
    WHERE  password='$password' AND id='$username' and password!=0"; 
    $result_a = mysql_query($accountant) or die(mysql_error());	
    
    
      $manager = "SELECT  *
    FROM manager
    WHERE  password='$password' AND id='$username'  and password!=0 "; 
    $result_m = mysql_query($manager) or die(mysql_error());
    
    /*
      $customer = "SELECT  *
    FROM customer
    WHERE  password='$password' AND id='$username'"; 
    $result_c = mysql_query($customer) or die(mysql_error());
    	*/
    if(mysql_num_rows($result) == 1)
    {
		
		
		header('Location: admin.php');
	
	
}elseif(mysql_num_rows($result_a) == 1)
    {
		
		
		header('Location: accountant.php');
	
	
}elseif(mysql_num_rows($result_m) == 1)
    {
		
		
		header('Location: manager.php');
	
	
}elseif(mysql_num_rows($result_r) == 1)
    {
		
		
		header('Location: member.php');
	
	
}
   else{
   echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i > <font face=verdana color=red >Please enter the correct user name and password <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or contact system administrator.<a></font></i><br><br>";
 //  session_unset($_SESSION['dept']);
  // echo "<script>alert(\"Incorrect Password or User Name\") </script>";
//echo '<SCRIPT LANGUAGE="JavaScript">
//document.location.href="login.php" </SCRIPT>';
   }
   }
    ?>			
 <p>
           
  <h3> User Name: </h3><input type="text" name="un" required="required" x-moz-errormessage="Enter user name" placeholder="User name"   />                           <br />
                                								
                                    <h3> Password: </h3><input type="password" name="password" required="required" placeholder="Password" x-moz-errormessage="Enter password"/>
                                </p>
							                           									
                                <br />
                                	<input type="submit" class="btn" value="Login" name="Logi"/> 
									<input  type="reset" class="btn" value="Reset"/><br /><br />
                               
								
								</p>
                            </form>
                            <h3 ><a href="forgotpass.php"  ><span style="color: #44a2ee;">Forgot password?</a></span></h3>
</div>
<div class="span-6 last">
	


</div>
</body>
</html>