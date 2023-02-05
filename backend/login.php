<?php
 include_once "connection.php";

   $username = mysqli_real_escape_string($con,$_POST['username']);
   $password = mysqli_real_escape_string($con,$_POST['password']);
$output = [];
   if(!empty($username) && !empty($password)){
   $query = mysqli_query($con,"SELECT * FROM user WHERE (username='$username' OR email='$username') AND password='$password'");
   if(mysqli_num_rows($query)>0){
   $output = json_encode(array('message'=>'success', 'username'=>$username));
   echo $output;
   }
   else{
    $output = json_encode(array('message'=>'invalid username or password', 'username'=>''));
   echo $output;
   }
   }
   else{
    echo "Both fields are required";
   }

?>