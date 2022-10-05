
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Edir management syste</title>
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
 <?php include('menu.php');?>
   
  <div id="sidebar-1" class="span-5 border">
  
	
    </div>
<div id="content" class="span-13 border">
</br>
</br>

<h1>Group Members</h1>
</br>
<ul>
	<li>Hailemicael Lulseged  ID: Ru1608/10-0</li>
	<li>Hunduma Otomsa   ID: RU1685/10-0</li>
	<li>Eden Degefu      ID: RU1373/10</li>
	<li>Misgan Abera    ID: RU1943/10-0</li>
	<li>Robsen Abera    ID: RU2122/10-0</li>
	
</ul>

</div>
<div class="span-6 last">
	


</div>
</body>
</html>