<?php 
 
 include_once "connection.php";

 $username = $_GET['username'];
$user = [];
 $query = mysqli_query($con,"SELECT * FROM user WHERE username='$username' OR email='$username'");

 if(mysqli_num_rows($query)>0){
    while($row=mysqli_fetch_assoc($query)){
        $user = json_encode(array(
            'name'=>$row['name'],
            'username'=>$row['username'],
            'image'=>$row['avatar']
            
        ));
    }
    echo $user;
 }
 else{
    echo "no user found";
 }

?>