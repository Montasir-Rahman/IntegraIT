<?php
include('new_con.php');  // Assuming database connection details are in this file

// Validate and sanitize user inputs
$username = isset($_POST['user']) ? trim($_POST['user']) : '';
$service = isset($_POST['service']) ? trim($_POST['service']) : '';
$password = isset($_POST['pass']) ? trim($_POST['pass']) : '';

// Use prepared statements to prevent SQL injection
$stmt = mysqli_prepare($con, "SELECT * FROM user_login WHERE BINARY username = ? AND service = ?");
mysqli_stmt_bind_param($stmt, "ss", $username, $service);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$count = mysqli_num_rows($result);

if ($count == 1) {
    // Proceed to check password only if the username for the service is found
    $stmt = mysqli_prepare($con, "SELECT * FROM user_login WHERE BINARY username = ? AND service = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "sss", $username, $service, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // Username and password are valid
        switch ($service) {
            case 'project management':
                header('Location: pm.html');
                break;
            case 'resource management':
                header('Location: rm.html');
                break;
            case 'client & contact management':
                header('Location: ccm.html');
                break;
            case 'financial management':
                header('Location: fm.html');
                break;
            default:
                echo "<h1>Invalid service selected.</h1>";
                break;
        }
    } else {
        echo "<h1>Login Failed. Invalid password.</h1>";
    }
} else {
    echo "<h1>Login Failed. Invalid username or service.</h1>";
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($con);
?>
