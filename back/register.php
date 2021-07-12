<?php
include("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

if($password==$cpassword){
    move_uploaded_file($tmp_name,"../upload/ $image");
    $insert = mysqli_query($conn, "INSERT INTO user (name, mobile, password, photo, role, status, votes) VALUES ('$name', '$mobile', '$password', '$image', '$role', 0, 0)");

    if($insert){
        echo'
        <script> 
            alert("Registration Successfull!"); 
            window.location = "../";
        </script>
        ';
    }
    else{

        echo'
        <script> 
            alert("Some Error Occured!"); 
            window.location = "../pages/register.html";
        </script>
        ';
        
    }

}
else{
    echo'
        <script> 
            alert("Password and Confirm Password not matched!"); 
            window.location = "../pages/register.html";
        </script>
    ';
}


?>