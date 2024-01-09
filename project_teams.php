<?php
include('reg_con.php');  // Assuming database connection details are in this file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user inputs
    $project_id = isset($_POST['pid']) ? trim($_POST['pid']) : '';
    $project_name = isset($_POST['pname']) ? trim($_POST['pname']) : '';
    $member_01 = isset($_POST['member1']) ? trim($_POST['member1']) : '';
    $member_02 = isset($_POST['member2']) ? trim($_POST['member2']) : '';

    // Hash the password before storing it
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($con, "INSERT INTO project_team (project_id, project_name, member_01, member_02) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $project_id, $project_name, $member_01, $member_02);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        header("Location: project_teams_view.php");
        exit(); 
    } else {
        echo "<p>Registration failed. Please try again later.</p>";
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
