
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
<?php
include('library/connection.php');
$query = "SELECT * FROM news ORDER BY id desc ";

$result = mysql_query($query) or die('Error couldn\'t get the data').mysql_error();

$Y=date("Y-m-d");
	echo "<h2 style='color: #44a2ee'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Welcome </h2>";
	
	while($row=mysql_fetch_array($result))
	{
		
		?>
		<fieldset>
        
		
      <?php  
   echo "<legend> <b style='color:  #44a2ee'> ".$row['title'] ." </b></legend>";	
  if($row['file'] !=''){
  	
   ?>
   <a href="uploads/<?php echo $row['file'] ?>" target="_blank"><?php echo "<img src='uploads/".$row['file']."' width='200'               height='100' alt=Image />" ; ?></a><br />
   <?php
	}
	echo $row['content'];

        
        ?>
        
        
       
     </fieldset>   <br />
        <?php
	
	}
	?>


</div>
<div class="span-6 last">
	


<?php include('footer.php'); ?>
</div>
</body>
</html>