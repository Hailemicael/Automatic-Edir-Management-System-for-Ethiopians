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

      $query1="select * from accountant where id='$id'";
		$result1   = mysql_query($query1,$con);
		$count1=mysql_num_rows($result1);



     $query2="select * from manager where id='$id'";
		$result2   = mysql_query($query2,$con);
		$count2=mysql_num_rows($result2);


     if( $count1==1 || $count2==1 )
	    {
                 
              if($count1==1)
                {
                   $result = mysql_query("DELETE FROM accountant WHERE id='$id'")
                    or die(mysql_error()); 
	        }
		     
            if($count2==1)
                {
                   $result = mysql_query("DELETE FROM manager WHERE id='$id'")
                  or die(mysql_error()); 
	        }
           // redirect back to the view page
            header("Location: admin_create.php");
        }
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: admin_create.php");
 }
 
?>