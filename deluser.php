<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the 'players' table
*/

 // connect to the database
 
require("library\connection.php");
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $dataa = mysql_query("SELECT * FROM manager WHERE id='$id' ") or die(mysql_error());

$info = mysql_fetch_array( $dataa );
 $p=$info['password'];
 if($p!=0){
 	
 $result = mysql_query("update manager set password='0' WHERE id='$id' ")
 or die(mysql_error()); 
	}else if($p==0){
	 $result = mysql_query("update manager set password='12345' WHERE id='$id' ")
 or die(mysql_error()); 	
	}
	
	 $data = mysql_query("SELECT * FROM accountant WHERE id='$id' ") or die(mysql_error());

$inf = mysql_fetch_array( $data );
 $pp=$inf['password'];
 if($pp!=0){
  $result = mysql_query("update accountant set password='0' WHERE id='$id'")
 or die(mysql_error()); 
	}else if($pp==0){
	 $result = mysql_query("update accountant set password='12345' WHERE id='$id' ")
 or die(mysql_error()); 	
	}
 // redirect back to the view page
 header("Location: admin_create.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: admin_create.php");
 }
 
?>