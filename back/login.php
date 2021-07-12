<?php

session_start();

include("connect.php");
 
// Take data from user

$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

// Check login data is correct or not

$check = mysqli_query($conn, "SELECT * FROM user WHERE mobile='$mobile' AND password='$password' AND role='$role'");

if(mysqli_num_rows($check)>0){

    $userdata = mysqli_fetch_array($check);
    $groups = mysqli_query($conn, "SELECT * FROM user WHERE role=2");
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata'] = $userdata;
    $_SESSION['groupsdata'] = $groupsdata;

 
    echo'
        <script>  
            window.location = "../pages/dashboard.php";
        </script>
    ';


}
else{

    echo'
        <script> 
            alert("User not found!"); 
            window.location = "../";
        </script>
    ';


}


?>