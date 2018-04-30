<?php ob_start(); ?>
<?php session_start(); ?>
<?php include("db.php"); ?>
<?php

if(isset($_POST['login']))
{
   $username = mysqli_real_escape_string($connection, trim($_POST['username']));
   $password = mysqli_real_escape_string($connection, trim($_POST['password']));

   $query = "SELECT * FROM users WHERE username = '$username'";
   $result = mysqli_query($connection, $query);

   if(!$result)
   {
        die("Query failed " . mysqli_error($connection));
   }

   while($row = mysqli_fetch_array($result))
   {
      $user_id          = $row['user_id'];
      $username         = $row['username'];
      $password         = $row['password'];
      $user_firstname   = $row['user_firstname'];
      $user_lastname    = $row['user_lastname'];

      
   }

   

}

?>