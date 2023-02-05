<?php
 include_once "connection.php";

   $username = mysqli_real_escape_string($con,$_POST['username']);
   $password = mysqli_real_escape_string($con,$_POST['password']);

   if(!empty($username) && !empty($password)){
    echo "All good";
   }
   else{
    echo "Both fields are required";
   }

?>