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

  
  $result = mysql_query("DELETE FROM punishment WHERE id='$id'")
 or die(mysql_error()); 
 // redirect back to the view page
 header("Location: p.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: p.php");
 }
 
?>