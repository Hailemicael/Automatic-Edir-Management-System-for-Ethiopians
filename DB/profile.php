<form id="form2" action="upload.php" method="post" enctype="multipart/form-data">
<p id="p1">Change profile picture:</p> <br />
<input type="file" name="fileToUpload" id="fileToUpload"><br />
<br><input id="sub1" type="submit" value="Change profile picture" name="change"><br />
</form>

<!-- Trigger the Modal -->
<img id="myImg" src="default.jpg" width="200" height="150">

<?php
$username = $_SESSION['username'];

if(isset($_FILES['image'])){
$errors= array();
$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];
$file_type = $_FILES['image']['type'];
$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

$extensions= array("jpeg","jpg","png");

if(in_array($file_ext,$extensions)=== false){
 $errors[]="extension not allowed, please choose a JPG, JPEG or PNG file.";
}

if($file_size > 2097152) {
 $errors[]='File size must be 2 MB';
}

 if(empty($errors)==true) {
 move_uploaded_file($file_tmp,"images/uploads/".$file_name);

$store=mysqli_query($conn,"UPDATE users SET userPic='$userPic' WHERE username='$username'");
mysqli_query($conn,$store);
 echo "Success";
}else{
 print_r($errors);
 echo"it failed";
}
}
?>

<?php
$getimg = mysqli_query($conn,"SELECT userPic FROM users WHERE username='" . 
$username . "'");
$rows=mysqli_fetch_array($getimg);
$img = $rows['userPic'];

?>



<img id="myImg" src="images/uploads/<?php echo $img?>"  alt="<?php echo $img ?>" width="200" height="150">


<?php
    $servername = "localhost";
    $username = "";
    $password = "";
    $database = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

$user = $_SESSION['username'];

   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

      $extensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152) {
         $errors[]='File size must be 2 MB';
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"uploads/".$file_name);

        $store=mysqli_query($conn,"UPDATE tbl SET avatar='$file_name' WHERE username='$user'");
        mysqli_query($conn,$store);
         echo "Success";
      }else{
         print_r($errors);
         echo"it failed";
      }
   }
?>

      <form action="" method="POST" enctype="multipart/form-data">
<p id="p1">Change profile picture:</p> <br />
         <input type="file" name="image" />
         <input type="submit"/>
      </form>

<?php

$getimg = mysqli_query($conn,"SELECT avatar FROM tbl WHERE username='$user'");
$rows=mysqli_fetch_array($getimg);
$img = $rows['avatar'];

?>



<img id="myImg" src="uploads/<?php echo $img?>"  alt="<?php echo $img ?>" width="200" height="150">




<?php


    
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : "";

    $conn = mysqli_connect("localhost", "root", "", "test");
    
    if(!empty($username))
    {
        if(isset($_FILES['image']))
        {
          $errors= array();
          $file_name = $_FILES['image']['name'];
          $file_size = $_FILES['image']['size'];
          $file_tmp = $_FILES['image']['tmp_name'];
          $file_type = $_FILES['image']['type'];
          $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
          $extensions= array("jpeg","jpg","png");
    
          if(in_array($file_ext,$extensions)=== false){
             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
          }
    
          if($file_size > 2097152) {
             $errors[]='File size must be 2 MB';
          }
    
          if(empty($errors)==true)
          {
             move_uploaded_file($file_tmp,"uploads/".$file_name);
    
            $store = "UPDATE users SET userPic='$file_name' WHERE username='$username'";
    
            if(mysqli_query($conn, $store))
            {
                echo "Success";
            }
            else
            {
                echo "Update failed!";
            }
    
          }else{
             print_r($errors);
             echo"it failed";
          }
        }
    ?>
    
    <?php
    $getimg = mysqli_query($conn,"SELECT userPic FROM users WHERE 
    username='$username'");
    $rows=mysqli_fetch_array($getimg);
    $img = $rows['userPic'];
    
    ?>
    
    
    
     <img id="myImg" src="images/uploads/<?php echo $img?>"  alt="<?php echo $img ?>" width="200" height="150">
    
    
     <?php  
    }
    else
    {
        echo "Invalid Username";
    }