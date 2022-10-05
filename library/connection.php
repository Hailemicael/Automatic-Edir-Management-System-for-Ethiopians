<?php
	//connect to the database
	@$conn= mysql_connect("localhost","root","") or die("Couldn't connect to the database server<br />".mysql_error());
	@$con= mysql_connect("localhost","root","") or die("Couldn't connect to the database server<br />".mysql_error());
	//select the database 'test'
 mysql_select_db("edir",$conn) or die("Couldn't select to the database<br />".mysql_error());
 mysql_select_db("edir",$conn) or die("Couldn't select to the database<br />".mysql_error());
	?>