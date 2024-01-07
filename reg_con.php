<?php
$host = "localhost";
$user = "montasir";
$password = "01633605153";
$db_name = "login";

$con = mysqli_connect($host, $user, $password, $db_name);

if(mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_errno());
}
?>
