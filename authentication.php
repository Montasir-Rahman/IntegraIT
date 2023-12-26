<?php
    include('connection.php');
    $username = $_POST['user'];
    $service = $_POST['service'];
    $password = $_POST['pass'];

        $username = stripcslashes($username);
        $service = stripcslashes($service);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($con, $username);
        $service = mysqli_real_escape_string($con, $service);
        $password = mysqli_real_escape_string($con, $password);

        $sql = "select *from user_login where username = '$username' and service = '$service' and password = '$password'"; 
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1){
            // echo "<h1><center>Login Successful</center></h1>";
            // header('Location: homepage.html'); // Change 'welcome.html' to the desired HTML page
            // exit(); // Make sure to exit after sending the header
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
                    exit();
            }
            exit(); // Make sure to exit after sending the header
        }
        else{
            echo "<h1> Login Failed. Invalid username or service or password. </h1>";
        }
?>
       