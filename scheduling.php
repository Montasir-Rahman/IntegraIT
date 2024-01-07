<?php
include('reg_con.php');  // Assuming database connection details are in this file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user inputs
    $project_id = isset($_POST['pid']) ? trim($_POST['pid']) : '';
    $project_name = isset($_POST['pname']) ? trim($_POST['pname']) : '';
    $project_start = isset($_POST['pstart']) ? trim($_POST['pstart']) : '';
    $project_end = isset($_POST['pend']) ? trim($_POST['pend']) : '';
    $project_status = isset($_POST['pstatus']) ? trim($_POST['pstatus']) : '';

    // Hash the password before storing it
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($con, "INSERT INTO scheduling (project_id, project_name, project_start, project_end, project_status) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $project_id, $project_name, $project_start, $project_end, $project_status);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        header("Location: #");
        exit(); 
    } else {
        echo "<p>Registration failed. Please try again later.</p>";
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
