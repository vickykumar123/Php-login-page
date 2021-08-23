<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "users";
$conn = mysqli_connect($server, $username, $password, $database);
if(!$conn){
    // echo "successfully connect
      // echo "not successfull".mysqli_error($conn);
    die("error".mysqli_connect_error());
}
?>
