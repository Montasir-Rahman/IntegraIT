<?php 

    require_once("index.php");
    $query = " select * from recordpr ";
    $result = mysqli_query($con,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
</head>
<body>
   <section>

  <div class=" text-center display-3  ">


    <h1 style="background: #50FFAB" class=" text-center badge badge-pill  w-50 ">Profit Analysis</h1>
  </div> 
  </div>



    <div class="p-5">
        <table class="table table-bordered">
            <thead class="font-weight-bold">
              <tr style="background-color: #64CCC5;">
                <th scope="col">Project_Id</th>
                <th scope="col" >Initial Budget</th>
                <th scope="col" >Revised Budget</th>
                <th scope="col">Total Expense</th>
                <th scope="col">Total Paid</th>
                <th scope="col"> Profit/Loss</th>
            
                
              </tr>
            </thead>
            <tbody>
            </tr>

<?php 
        
        while($row=mysqli_fetch_assoc($result))
        {
            $UserID = $row['User_ID'];
            $UserName = $row['User_Name'];
            $UserEmail = $row['User_Email'];
            $UserAge = $row['User_Age'];
            $UserAgex = $row['User_Agex'];
            $UserAgey = $row['User_Agey'];
?>
        <tr>
            <td><?php echo $UserID ?></td>
            <td><?php echo $UserName ?></td>
            <td><?php echo $UserEmail ?></td>
            <td><?php echo $UserAge ?></td>
            <td><?php echo $UserAgex ?></td>
            <td><?php echo $UserAgey ?></td>
            
        </tr>        
<?php 
        }  
?>                                                                    
       
              
            </tbody>
          </table>
        
    </div>
   </section>
</body>
</html>