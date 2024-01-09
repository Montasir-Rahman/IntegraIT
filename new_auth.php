<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "integrait";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sanitizeInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitizeInput($_POST["user"]);
    $service = sanitizeInput($_POST["user_service"]);
    $password = $_POST["user_password"];

    $sql = "SELECT user_password FROM user_info WHERE username = ? AND user_service = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $service);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->store_result();
    $count = $stmt->num_rows;
    $stmt->fetch();
    $stmt->close();

    if ($count == 1 && password_verify($password, $hashedPassword)) {
        switch ($service) {
            case 'project management':
                header('Location: pm.html');
                break;
            case 'resource management':
                header('Location: rm.html');
                break;
            case 'client management':
                header('Location: ccm.html');
                break;
            case 'financial management':
                header('Location: fm.html');
                break;
            default:
                echo "<h1>Invalid service selected.</h1>";
                break;
        }
    } elseif ($count == 0) {
        echo "<h1>Login Failed. User not found.</h1>";
    } else {
        echo "<h1>Login Failed. Invalid password.</h1>";
    }
}

$conn->close();
?>
