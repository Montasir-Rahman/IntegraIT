<?php
include('reg_con.php');  // Assuming database connection details are in this file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user inputs
    $employee_id = isset($_POST['eid']) ? trim($_POST['eid']) : '';
    $employee_name = isset($_POST['ename']) ? trim($_POST['ename']) : '';
    $contact = isset($_POST['contact']) ? trim($_POST['contact']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    // Hash the password before storing it
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($con, "INSERT INTO employee_management (eid, ename, contact, email) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $employee_id, $employee_name, $contact, $email);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        header("Location: employee_management_view.php");
        exit(); 
    } else {
        echo "<p>Registration failed. Please try again later.</p>";
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
