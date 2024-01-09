<!-- PHP code to establish connection with the localserver -->
<?php
// Username is root
$user = 'root';
$password = '';
 
// Database name is geeksforgeeks
$database = 'integrait';
 
// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
// SQL query to select data from database
$sql = " SELECT project_id, project_name, project_start, project_end, project_status from scheduling ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>View Schedule</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
 
<body>
    <section>
        <center><h1>View Schedule</h1></center>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Project_ID</th>
                <th>Project_Name</th>
                <th>Project_Start</th>
                <th>Project_End</th>
                <th>Project_Status</th>
                
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['project_id'];?></td>
                <td><?php echo $rows['project_name'];?></td>
                <td><?php echo $rows['project_start'];?></td>
                <td><?php echo $rows['project_end'];?></td>
                <td><?php echo $rows['project_status'];?></td>
               
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
 
</html>