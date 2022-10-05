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
require("library\connection.php");
if(isset($_POST['submit']))
{    
$comm=$_POST['comment'];
$tt=$_POST['tt'];
 	$Y=date("Y-m-d");
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	
	$new_size = $file_size/1048576; 
	
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
		$ext = pathinfo($new_file_name, PATHINFO_EXTENSION);
	if($ext != "jpeg"  && $ext != "jpg" && $ext != "gif" && $ext != "png" && $file_type!=''  ){

		
	echo "<b><span  style='color: red' />ERROR: only JPEG, JPG, GIF OR PNG files are allowed.</span></b>";
	
  }

elseif($new_size > 1048576){
	
         echo "<span  style='color: red' />Maximum File size must be excately 2 MB </span>";
		
		}
else{
	$folder="uploads/";
	 if($file!='' && $file_loc!='' && $file_size!='' && $_POST['comment']!=''){
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		
				$sql="INSERT INTO news(file,type,size,content,hday,title) VALUES('$final_file','$file_type','$new_size','$comm','$Y','$tt')";
		mysql_query($sql);
		?>
		<script>
		alert('Successfully Posted To Homepage ');
        window.location.href='news.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error ');
        window.location.href='news.php?fail';
        </script>
		<?php
	}
	}elseif($_POST['comment']!=''){
		$sql="INSERT INTO news(content,hday,title) VALUES('$comm','$Y','$tt')";
		$ee=mysql_query($sql);
		if($ee == 1){
		echo "<script>alert(\"Sucessfully posted the information to users\") </script>";
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="news.php" </SCRIPT>';   
		}
	}
}}
?>
 
<fieldset>
	<legend align="center"><b><h2 style="color: #20df2f"> <h2 align="center" style="color: #44a2ee; "> What's  News To Be Posted/Display In The Homepage? </h2> </h2></b></legend>
	
<form action="" method="POST" enctype="multipart/form-data" name="user" onsubmit="return error();">
		<br /><br /> <i style="color: #ff0000">If the new post have a photo/image click browse.</i>
		<input type="file" name="file" class="btn" />
	<br /><br />
	<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Title To Be Posted:</b> <input type="text" name="tt" size="70" required="required" placeholder="Write Here"><br /><br />
	<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Description about the post:</b><br />	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<textarea required="required"  rows="7" cols="70" wrap="wrap" placeholder="Type new Information/Message here" name="comment"></textarea><br /><br />
		<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Post" name="submit" class="btn"/>&nbsp;&nbsp;&nbsp;<input type="Reset" value="Clear" class="btn"/><br /><br />
		</form></fieldset>
	
		<?php



		$data = mysql_query("SELECT * FROM news ORDER BY id desc") or die(mysql_error());
 Print "<table border=1 width=850px>"; 
 Print "<tr style='background-color:  #44a2ee;'>"; 

 Print "<th>Recent Postes</th>";
 Print "<th>Title</th>";
 Print "<th>Image/Photo</th>";
  Print "<th>&nbsp;</th>";
   Print "<th>&nbsp;</th>"."\n";
 Print "</tr>"; 

 while($info = mysql_fetch_array( $data )) 
 { 
 $ttt=$info['title'];
Print "<tr>"; 
 print "<td>".$info['hday'];
 print "<td >".ucwords($ttt);
if($info['file'] != ''){
	
 ?> <td><a href="uploads/<?php echo $info['file'] ?>" target="_blank"><?php echo "<img src='uploads/".$info['file']."' width='100'               height='80' />" ; ?></a></td>
 <?php
	}else{
		 print "<td > No image/photo";
	}
   
 //echo '<td><a href="delete.php?id=' . $info['course_code'] . '">Delete</a></td>';
 echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete  ?');\" href='dhome.php?id=".$info['id']."'><span  style='color: red;' />X</span></a></td><tr>";
  
  Print "</tr>";

 
 

 } 
  Print "</table>";

 ?>   




</div>
<div class="span-6 last">
	



</div>
</body>
</html>