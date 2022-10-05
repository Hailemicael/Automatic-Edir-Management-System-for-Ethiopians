<form action="login.php" method="POST" name="user" onsubmit="return error();">
                            <br /><br />  <fieldset> <legend align="center">  <h1 style="color: #44a2ee;" > Sign In </h1> </legend> 
						  
								
 <?php
 require("incld\connection.php");	
  session_start();
 $se= date("m"); 
 
 if(($se >= '02' || $se >= '2 ') && $se < '06')
 {
 	$_SESSION['semister']=1;
 }elseif(($se >= '06' || $se >= '6') && $se < '11'){
 	$_SESSION['semister']=2;
 }elseif($se >= '11' || $se >= '11'){
 	$_SESSION['semister']=3;
 }
 
 


 
 
 
 
 
 
 if(isset($_POST['Logi']))
{
	
    session_start();

 $_SESSION['user'] = $_POST['un'];
 
 
 $key = trim($_POST['password']);
$enc = base64_encode ($key);
$dec = base64_decode ($enc);

 $_SESSION['password'] = ($enc);
  $query = "SELECT  *
    FROM admin
    WHERE  password='$_SESSION[password]' AND id='$_POST[un]'"; 
    $result = mysql_query($query, $con);
    $uuu=mysql_fetch_array($result);
    
    
    $query = "SELECT  *
    FROM president
    WHERE  password='$_SESSION[password]' AND id='$_POST[un]'"; 
    $result2 = mysql_query($query, $con);
    $uuu2=mysql_fetch_array($result2);
    
    
     $query3 = "SELECT  *
    FROM vice_president
    WHERE  password='$_SESSION[password]' AND id='$_POST[un]'"; 
    $result3 = mysql_query($query3, $con);
    $uuu3=mysql_fetch_array($result3);
    
    $query4 = "SELECT  *
    FROM transformation_directorate
    WHERE  password='$_SESSION[password]' AND id='$_POST[un]'"; 
    $result4 = mysql_query($query4, $con);
    $uuu4=mysql_fetch_array($result4); 
    
    
    $query5 = "SELECT  *
    FROM instructor
    WHERE  password='$_SESSION[password]' AND id='$_POST[un]' AND Position='Dean'"; 
    $result5 = mysql_query($query5, $con);
    $uuu5=mysql_fetch_array($result5);   
    
    
  $query6 = "SELECT  *
    FROM instructor
    WHERE  password='$_SESSION[password]' AND id='$_POST[un]' AND Position='Head'"; 
    $result6 = mysql_query($query6, $con);
    $uuu6=mysql_fetch_array($result6);  
    
    
    $query7 = "SELECT  *
    FROM instructor
    WHERE  password='$_SESSION[password]' AND id='$_POST[un]' AND Position=''"; 
    $result7 = mysql_query($query7, $con);
    $uuu7=mysql_fetch_array($result7);
    
    
     $query8 = "SELECT  *
    FROM instructor,advisor
    WHERE  instructor.password='$_SESSION[password]' AND instructor.id='$_POST[un]' AND instructor.Position='Advisor' and advisor.Id='$_POST[un]'"; 
    $result8 = mysql_query($query8, $con);
    $uuu8=mysql_fetch_array($result8);
    
    
     $query9 = "SELECT  *
    FROM student
    WHERE  password='$_SESSION[password]' AND id='$_POST[un]' and position='' "; 
    $result9 = mysql_query($query9, $con);
    $uuu9=mysql_fetch_array($result9);
    
    
     $query100 = "SELECT  *
    FROM student
    WHERE  password='$_SESSION[password]' AND id='$_POST[un]' and position='Representative'"; 
    $result100 = mysql_query($query100, $con);
    $uuu100=mysql_fetch_array($result100);
    
		
	
  //  if(mysql_num_rows($result) == 1)
    if(mysql_num_rows($result) == 1)
	{
		$logintime=date("d-m-Y h:m:s");
		
	mysql_query("insert into log_file values('$_POST[un]','$logintime','','Login-->')") ;
	 $query10 = "SELECT  * FROM log_file  WHERE  Login_time='$logintime' AND User='$_POST[un]'"; 
    $result10 = mysql_query($query10, $con);
    $uuu10=mysql_fetch_array($result10);
	
	$_SESSION['intime']=$uuu10['Login_time'];
	
	
	
	
	
	
	
	
	
	
	
		
	$_SESSION['user_name']=$uuu['Name']." ". $uuu['Father_Name'];
		header('Location: ad_page.php');
	
}
  elseif(mysql_num_rows($result2) == 1)
	{
		$logintime=date("d-m-Y h:m:s");
		
	mysql_query("insert into log_file values('$_POST[un]','$logintime','','Login-->')") ;
	 $query10 = "SELECT  * FROM log_file  WHERE  Login_time='$logintime' AND User='$_POST[un]'"; 
    $result10 = mysql_query($query10, $con);
    $uuu10=mysql_fetch_array($result10);
	
	$_SESSION['intime']=$uuu10['Login_time'];
	$_SESSION['user_name']=$uuu2['Name']." ". $uuu2['Father_Name'];
		header('Location: President_page.php');
	
}elseif(mysql_num_rows($result3) == 1){
	$logintime=date("d-m-Y h:m:s");
		
	mysql_query("insert into log_file values('$_POST[un]','$logintime','','Login-->')") ;
	 $query10 = "SELECT  * FROM log_file  WHERE  Login_time='$logintime' AND User='$_POST[un]'"; 
    $result10 = mysql_query($query10, $con);
    $uuu10=mysql_fetch_array($result10);
	
	$_SESSION['intime']=$uuu10['Login_time'];
	$_SESSION['user_name']=$uuu3['Name']." ". $uuu3['Father_Name'];
	header('Location: vice_President_page.php');
	
}elseif(mysql_num_rows($result4) == 1){
	$logintime=date("d-m-Y h:m:s");
		
	mysql_query("insert into log_file values('$_POST[un]','$logintime','','Login-->')") ;
	 $query10 = "SELECT  * FROM log_file  WHERE  Login_time='$logintime' AND User='$_POST[un]'"; 
    $result10 = mysql_query($query10, $con);
    $uuu10=mysql_fetch_array($result10);
	
	$_SESSION['intime']=$uuu10['Login_time'];
	$_SESSION['user_name']=$uuu4['Name']." ". $uuu4['Father_Name'];
	header('Location: transformation_page.php');
}elseif(mysql_num_rows($result5) == 1){
	$logintime=date("d-m-Y h:m:s");
		
	mysql_query("insert into log_file values('$_POST[un]','$logintime','','Login-->')") ;
	 $query10 = "SELECT  * FROM log_file  WHERE  Login_time='$logintime' AND User='$_POST[un]'"; 
    $result10 = mysql_query($query10, $con);
    $uuu10=mysql_fetch_array($result10);
	
	$_SESSION['intime']=$uuu10['Login_time'];
	$_SESSION['user_name']=$uuu5['Name']." ". $uuu5['Father_Name'];
	header('Location: coll_page.php');
}elseif(mysql_num_rows($result6) == 1){
	$logintime=date("d-m-Y h:m:s");
		
	mysql_query("insert into log_file values('$_POST[un]','$logintime','','Login-->')") ;
	 $query10 = "SELECT  * FROM log_file  WHERE  Login_time='$logintime' AND User='$_POST[un]'"; 
    $result10 = mysql_query($query10, $con);
    $uuu10=mysql_fetch_array($result10);
	
	$_SESSION['intime']=$uuu10['Login_time'];
	$_SESSION['user_name']=$uuu6['Name']." ". $uuu6['Father_Name'];
	header('Location: head_page.php');
}elseif(mysql_num_rows($result7) == 1){
	$logintime=date("d-m-Y h:m:s");
		
	mysql_query("insert into log_file values('$_POST[un]','$logintime','','Login-->')") ;
	 $query10 = "SELECT  * FROM log_file  WHERE  Login_time='$logintime' AND User='$_POST[un]'"; 
    $result10 = mysql_query($query10, $con);
    $uuu10=mysql_fetch_array($result10);
	
	$_SESSION['intime']=$uuu10['Login_time'];
		$_SESSION['user_name']=$uuu7['Name']." ". $uuu7['Father_Name'];
	header('Location: ins_page.php');
}elseif(mysql_num_rows($result8) == 1){
	$logintime=date("d-m-Y h:m:s");
		
	mysql_query("insert into log_file values('$_POST[un]','$logintime','','Login-->')") ;
	 $query10 = "SELECT  * FROM log_file  WHERE  Login_time='$logintime' AND User='$_POST[un]'"; 
    $result10 = mysql_query($query10, $con);
    $uuu10=mysql_fetch_array($result10);
	
	$_SESSION['intime']=$uuu10['Login_time'];
	$_SESSION['user_name']=$uuu8['Name']." ". $uuu8['Father_Name'];
	header('Location: adv_page.php');
}elseif(mysql_num_rows($result9) == 1){
	$logintime=date("d-m-Y h:m:s");
		
	mysql_query("insert into log_file values('$_POST[un]','$logintime','','Login-->')") ;
	 $query10 = "SELECT  * FROM log_file  WHERE  Login_time='$logintime' AND User='$_POST[un]'"; 
    $result10 = mysql_query($query10, $con);
    $uuu10=mysql_fetch_array($result10);
	
	$_SESSION['intime']=$uuu10['Login_time'];
	$_SESSION['user_name']=$uuu9['name'];
	header('Location: stud_page.php');
}elseif(mysql_num_rows($result100) == 1){
	$logintime=date("d-m-Y h:m:s");
		
	mysql_query("insert into log_file values('$_POST[un]','$logintime','','Login-->')") ;
	 $query10 = "SELECT  * FROM log_file  WHERE  Login_time='$logintime' AND User='$_POST[un]'"; 
    $result10 = mysql_query($query10, $con);
    $uuu10=mysql_fetch_array($result10);
	
	$_SESSION['intime']=$uuu10['Login_time'];
		$_SESSION['user_name']=$uuu100['name'];
	header('Location: rep_page.php');
}
   else{
   echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i > <font face=verdana color=red >Please enter the correct user name and password <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a></font></i><br><br>";




   }
   }
    ?>						
 <p>
           
  <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="img/u.jpg" width="25px" height="15px"/></a> User Name: </h3><input type="text" name="un" required="required" x-moz-errormessage="Enter user name" placeholder="User name"   />                           <br />
                                								
                                    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#"><img src="img/p.jpg" width="25px" height="15px"/></a>Password: </h3><input type="password" name="password" required="required" placeholder="Password" x-moz-errormessage="Enter password"/>
                                </p>
							                           									
                                <br />
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<input type="submit" class="btn" value="Login" name="Logi"/> 
									<input  type="reset" class="btn" value="Reset"/><br /><br />
                               
								
								</p>
                            </form>
                            <h3 >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="forgotpass.php"  ><span style="color: #44a2ee;">Forgot password?</a></span></h3>