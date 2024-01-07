<?php
    // Database credentials (consider storing them securely, e.g., in environment variables)
    $host = "localhost";
    $user = "montasir"; // Change this
    $password = '01633605153'; // Change this
    $db_name = "login"; // Change this

    // Initialize the connection variable
    $con = mysqli_connect($host, $user, $password, $db_name);

    // Check the connection
    if(mysqli_connect_errno()){
        die("Failed to connect with MySQL: " . mysqli_connect_errno());
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if 'username' and 'password' keys exist in the $_POST array
        if (isset($_POST['username']) && isset($_POST['password'])) {
            // Validate and sanitize user input
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            // Use prepared statements to prevent SQL injection
            $stmt = mysqli_prepare($con, "SELECT * FROM users WHERE username = ? AND password = ?");
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
            mysqli_stmt_execute($stmt);

            // Fetch result
            $result = mysqli_stmt_get_result($stmt);

            // Check if the user exists
            if ($row = mysqli_fetch_assoc($result)) {
                // User authenticated successfully
                // Perform further actions, e.g., set session variables, redirect, etc.
                echo "Login successful!";
            } else {
                // Invalid credentials
                echo "Invalid username or password";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            // Handle the case when 'username' or 'password' keys are missing
            echo "Username or password not provided.";
        }
    } else {
        // Handle the case when the form is not submitted
        echo "Form not submitted.";
    }

    // Close connection
    mysqli_close($con);
?>
