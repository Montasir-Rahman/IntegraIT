<?php
$host = "localhost";
$user = "admin_user";
$password = "12345";
$db_name = "integrait";

$con = mysqli_connect($host, $user, $password, $db_name);

if(mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_errno());
}
?>
