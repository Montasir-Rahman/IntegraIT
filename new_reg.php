<?php
include('reg_con.php');  // Assuming database connection details are in this file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user inputs
    $username = isset($_POST['user']) ? trim($_POST['user']) : '';
    $user_service = isset($_POST['user_service']) ? trim($_POST['user_service']) : '';
    $user_password = isset($_POST['user_password']) ? trim($_POST['user_password']) : '';

    // Hash the password before storing it
    $hashedPassword = password_hash($user_password, PASSWORD_DEFAULT);

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($con, "INSERT INTO user_info (username, user_service, user_password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $username, $user_service, $hashedPassword);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        header("Location: homepage.html");
        exit(); 
    } else {
        echo "<p>Registration failed. Please try again later.</p>";
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
