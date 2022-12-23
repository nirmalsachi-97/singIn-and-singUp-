<?php
//BD connection
$dbServer = "localhost";
$dbUser = "root";
$dbPass = "";
$database = "studentid"; 

//connect
$conn = mysqli_connect($dbServer, $dbUser ,$dbPass, $database);

if(!$conn){
    die("Error connecting :".mysqli_connect_error());
}
// $conn=new mysqli("localhost","root","","studentid");
    
//     if($conn->connect_error){
//         die("Connection failed ".$conn->connect_error);
//     }
//     else{
//         echo "Connection Success";
//     }

?>