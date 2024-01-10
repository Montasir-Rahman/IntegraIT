<?php 

    require_once("index.php");
    $query = " select * from records ";
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


    <h1 style="background: #CCFA64" class=" text-center badge badge-pill  w-50 ">Invoice</h1>
  </div>
  <div class="display-4 px-5 py-4 d-flex justify-content-between ">
    <div><h1 style="background: #76DD8E" class=" text-center badge badge-pill ">Primary</h1></div>
    <div>
      <h1 style="color: #146D79" class="">IntegraIt</h1>
    </div>
    
  </div>



    <div class="p-5">
        <table class="table table-bordered">
            <thead class="font-weight-bold">
              <tr>
                <th scope="col">Items</th>
                <th scope="col"  >Description</th>
                <th scope="col" >Quantity</th>
                <th scope="col">Price</th>
                
            
                
              </tr>
              </tr>

<?php 
        
        while($row=mysqli_fetch_assoc($result))
        {
            $UserID = $row['User_ID'];
            $UserName = $row['User_Name'];
            $UserEmail = $row['User_Email'];
            $UserAge = $row['User_Age'];
?>
        <tr>
            <td><?php echo $UserID ?></td>
            <td><?php echo $UserName ?></td>
            <td><?php echo $UserEmail ?></td>
            <td><?php echo $UserAge ?></td>
            
        </tr>        
<?php 
        }  
?>                                                                    
       
          </table>
         <div class="d-flex justify-content-end display-4">
          <h1 style="background: #146D79" class="   badge badge-pill ">Total:0$</h1>
         </div>
    </div>
   </section>
</body>
</html>