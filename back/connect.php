<?php
session_start();
$host="localhost";
$user="root";
$pwd="";
$dbname="voting";

$conn = new mysqli($host, $user, $pwd, $dbname);

//check connection
if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}
else{
    // echo "connected successfully";
}


?>