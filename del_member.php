<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the 'players' table
*/

 // connect to the database
 include('library/connection.php');
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
$dataa = mysql_query("SELECT * FROM member WHERE id='$id' ") or die(mysql_error());

$info = mysql_fetch_array( $dataa );
 $p=$info['password'];
 if($p!=0){
 	
 $result = mysql_query("update member set password='0' WHERE id='$id' ")
 or die(mysql_error()); 
	}else if($p==0){
	 $result = mysql_query("update member set password='12345' WHERE id='$id' ")
 or die(mysql_error()); 	
	}
  
 // $result = mysql_query("DELETE FROM member WHERE id='$id'")
 //or die(mysql_error()); 
 // redirect back to the view page
 header("Location: member_list.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: member_list.php");
 }
 
?>