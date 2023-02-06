<?php
include_once "connection.php";

$name = mysqli_real_escape_string($con,$_POST['name']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$username = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$c_password = mysqli_real_escape_string($con,$_POST['confirm_password']);
  
  if(!empty($name) && !empty($email) && !empty($username) &!empty($password)){
    //email vallidation
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        //check for email if it exists.
        $sql = mysqli_query($con,"SELECT email FROM user WHERE email='{$email}'");
        if(mysqli_num_rows($sql)>0){
            echo $email. "already exists!";
        }
        $query2 = mysqli_query($con,"SELECT * FROM user WHERE username = '$username'");
        if(mysqli_num_rows($query2)>0){
            echo "this username is already taken";
        }
        else{
            if(isset($_FILES['image'])){
       $img_name = $_FILES['image']['name'];//image name.
       $img_type = $_FILES['image']['type'];//image type.
       $tmp_name = $_FILES['image']['tmp_name'];

       $img_explode = explode('.',$img_name);

       $img_ext = end($img_explode);

       $extensions = ['png','jpeg','jpg'];//valid image extensions.

       if(in_array($img_ext,$extensions)==true){
             
        $time = time();//return current 

        
        $new_image_name = $time.$img_name;
       if(move_uploaded_file($tmp_name,"../frontend/images/".$new_image_name)){
       $status = "Active Now";

        $random_id = rand(time(),10000000);


//  lets insert the data into our database.

$query = mysqli_query($con,"INSERT INTO user (token, name, username,email,password,avatar,status )
 VALUES('$random_id','$name','$username','$email','$password','$new_image_name','$status')");

 if($query){
    echo "Account created";
 }
 else{
    echo "Something went wrong";
 }
 }

       }
       else{
        echo "Invallid image type...";
       }
    }
            else{
                echo "Please select an image file";
            }
        }
    }
  }


?>