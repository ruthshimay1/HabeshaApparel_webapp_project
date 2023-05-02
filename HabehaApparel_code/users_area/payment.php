<?php
// including connect.php file so that we can have access to database.
include('../include/connect.php');
include('../functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
          <!-- bootstrap CSS link -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!-- font awsome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Include script, embading for fonts from google -->
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:100,600|Montserrat:300,500" rel="stylesheet">

<!-- Include script for font awesome icon library -->
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

<!-- icon item -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- css file -->
    <link rel="stylesheet" href="../css/carousel.css">


    <style>
        .payment_img{
        width:50%;
        margin:auto;
        display:block;
        }

        .GFG {
            background-color: gray;
            border: 2px solid bisque;
            color: green;
            padding: 5px 10px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            margin: 10px 30px;
            cursor: pointer;
            text-decoration:none;
        }
    </style>
</head>
<body>


    <!-- php code to access user id -->
    <?php 
$user_ip=getIPAddress();
$get_user="select * from `user_table` where user_ip='$user_ip'";
$result = mysqli_query($con,$get_user);
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];




    ?>
    <div class="container text-center">
        <h2 class="text-center p-3 mt-3">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center my-3">  
            
            <div class="col-md-6">         
            <a class="my_button" style="height: 70px;px; display:inline-block;vertical-align: middle; margin: 10px 30px;" href="order.php?user_id=<?php echo $user_id?>"><h2 class="text-center">Pay Card</h2></a>    
            </div> 

            <div class="col-md-6">         
            <a href="https://www.paypal.com/" target="_blank"><img src="../images/payment.png" alt="photo" class="payment_img"></a>    
            </div>

            <p class="mt-5 text-end">    </br></br>Return<a href="../index.php"class="text-info"> <i class="fa fa-home" aria-hidden="true"></i></a></p>
           
        </div>
    </div>

    <!-- bootstarp JS link -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>