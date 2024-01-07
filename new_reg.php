<?php
include('reg_con.php');  // Assuming database connection details are in this file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user inputs
    $username = isset($_POST['user']) ? trim($_POST['user']) : '';
    $password = isset($_POST['pass']) ? trim($_POST['pass']) : '';

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($con, "INSERT INTO user_login (username, password) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);

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
