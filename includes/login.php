<?php ob_start(); ?>
<?php include("db.php"); ?>
<?php

if(isset($_POST['login']))
{
   $username = mysqli_real_escape_string($connection, trim($_POST['username']));
   $password = mysqli_real_escape_string($connection, trim($_POST['password']));

   $query = "SELECT * FROM users WHERE username = '$username'";
   $result = mysqli_query($connection, $query);

   

}

?>