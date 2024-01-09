<?php
    $host = "localhost";
    $user = "root"; 
    $password = ""; 
    $db_name = "integrait";


    $con = mysqli_connect($host, $user, $password, $db_name);


    if(mysqli_connect_errno()){
        die("Failed to connect with MySQL: " . mysqli_connect_errno());
    }

 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (isset($_POST['username']) && isset($_POST['password'])) {
            
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

          
            $stmt = mysqli_prepare($con, "SELECT * FROM users WHERE username = ? AND password = ?");
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
            mysqli_stmt_execute($stmt);

           
            $result = mysqli_stmt_get_result($stmt);

         
            if ($row = mysqli_fetch_assoc($result)) {
                
                echo "Login successful!";
            } else {
              
                echo "Invalid username or password";
            }

     
            mysqli_stmt_close($stmt);
        } else {
         
            echo "Username or password not provided.";
        }
    } else {
        
        echo "Form not submitted.";
    }

    mysqli_close($con);
?>
