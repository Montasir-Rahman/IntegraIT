<?php 

    require_once("index.php");
    $query = " select * from recordex ";
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


    <h1 style="background: #BFFCC5" class=" text-center badge badge-pill  w-50 ">Expense Tracking</h1>
  </div> 
  </div>



    <div class="p-5">
        <table class="table table-bordered">
            <thead class="font-weight-bold">
              <tr style="background-color: #64CCC5;">
                <th scope="col">Date of  Payment</th>
                <th scope="col" >Method of Payment </th>
                <th scope="col" >Paid to</th>
                <th scope="col">Description </th>
                <th scope="col">Amount Paid</th>
                <th scope="col"> Running Total</th>
            
                
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