<?php
// including connect.php file so that we can have access to database.
include('../include/connect.php');
session_start();
if (isset($_GET['order_id'])) {
   $order_id = $_GET['order_id'];
   $select_data="select * from `user_orders` where order_id='$order_id'";
   $result=mysqli_query($con, $select_data);
   $row_fetch=mysqli_fetch_assoc($result);
   $invoice_number=$row_fetch['invoice_number'];
   $amount_due=$row_fetch['amount_due'];

}
if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $invoice_number=$_POST['invoice_number'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query= "insert into `user_payments` (order_id, invoice_number, amount, payment_mode) values($order_id,$invoice_number, $amount, '$payment_mode')";
    $result=mysqli_query($con, $insert_query);
    if($result){
        echo "<h3 class='text-center text-light'>Payment Successful</h3>";
        echo "<script>window.open('profile.php?my_orders', '_self')</script>";        
    }
    $update_orders="update `user_orders` set order_status='complete' where order_id=$order_id";$result_orders=mysqli_query($con, $update_orders); 

}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <metta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-witdth" , intial-scale=1.0">
        <title> Payment Page</title>
        <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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

</head>
<nav class="navbar navbar-expand-sm navbar-dark first-nav sticky-top bg-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="../index.php" style="font-family: cursive">
    <img src="../images/logo_img.png" width="35" height="35" class="d-inline-block align-top" alt="" class="logo"> Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
    </div>
  </nav>

<body style="background-color: #e3f2fd;"> 
   
    <div class="container my-5 p-5">
    <h2 class="text-center">Confirm Payment</h2>
    <form action="" method="post">
    <div class="form-outline my-4 text-center  w-50 m-auto">
    <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
    </div>
    <div class="form-outline my-4 text-center  w-50 m-auto">
        <label for="" class="">Amount</label>
    <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>" >
    </div>
    <div class="form-outline my-4 text-center  w-50 m-auto">
        <select name="payment_mode" class="form-select w-50 m-auto">
            <option>Select Payment Mode</option>
            <option>Credit</option>
            <option>Debit</option>
            <option>ZELLE</option>
            <!-- <option>Cash on Delivery</option> -->
            
        </select>
    </div>
    <div class="form-outline my-4 text-center  w-50 m-auto">     
    <input type="submit" class="my_button p-2 px-3 border-0" value="Confirm" name="confirm_payment">
    </div>
</form>
</div>

<!-- bootstarp JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>