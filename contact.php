
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
width:600;
margin-left:-100;

}

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
<table border="1">
<tr bgcolor="#40bfac">
	<th><center>Name</center></th><th><center>Mobile</center></th><th><center>E-mail</center></th><th><center>Position</center></th>
	</tr>
	<tr>
		<td >Hailemicael Lulseged</td><td>0905388176</td><td>hailelulseged281913@gmail.com</td><td>Likemenber</td>
	</tr>
	<tr >
		<td >Hunduma Otomsa</td><td>0913147651</td><td>hunduma@gmail.com</td><td>Sebsabi</td>
	</tr>
	<tr>
		<td>Eden degefu</td><td>0912602706</td><td>edendegefu@gmail.com</td><td>Attendance Manager</td>
	</tr>
<tr>
		<td>robsen abera</td><td>0966924899</td><td>robsen@gmail.com</td><td>Lefafi</td>
	</tr>
</table>
</div>
<div class="span-6 last">
	

</div>
</body>
</html>