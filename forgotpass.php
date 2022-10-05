
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
		<center> <img src="images/logo.jpg" /></center>
    </div>
 <?php include('menu.php');?>
   
  <div id="sidebar-1" class="span-5 border">
  	
    </div>
<div id="content" class="span-13 border">
<br /><br />
<?php
		require("library\connection.php");
	if (isset($_POST['mobile'])){
	    $username = $_POST['mobile'];
	    $query1="select * from doctor where mobile='$username'";
		$result1   = mysql_query($query1,$con);
		$count1=mysql_num_rows($result1);
		 $query2="select * from nurse where mobile='$username'";
		$result2   = mysql_query($query2,$con);
		$count2=mysql_num_rows($result2)


   	    // If the count is equal to one, we will send password other wise display an error message.
        if( $count1==1 || $count2==1  )
	    {
                 
              if($count1==1)
                {
                $rows=mysql_fetch_array($result1);
	          $pass  =  $rows['password'];//FETCHING PASS
	        //echo "your pass is ::".($pass)."";
	        }
		     
            if($count2==1)
                {
                $rows=mysql_fetch_array($result2);
	          $pass  =  $rows['password'];//FETCHING PASS
	        //echo "your pass is ::".($pass)."";
	        }


        echo "<span style='color: green;'> <h3>Your password is:    ".$pass ." </h3>  </span>";	
	    } 
        else 
	    
	    echo "<br /><br /> <span style='color: #ff0000;'>  In our databse ".$_POST['mobile'] ." mobile  could not found! </span>";
	      
	         
	
	}
	?>
<pre>

	<form action="" method="post">
	        
<h3 >  Enter your mobile :</h3>   <input id="username"  name="mobile" required="required"  placeholder="mobile here..." /> <input class="btn" type="submit" name="button" value="Submit" />
	    </form>
		
		
		
		
		
		
	                       	</pre>
</div>
<div class="span-6 last">
	


</div>
</body>
</html>