<!DOCTYPE HTML>
<html lang="en">

<head>
    <metta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-witdth" , intial-scale=1.0">
        <title> Document </title>
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
<body>
    <?php
    $username=$_SESSION['username'];
    $get_user="Select * from `user_table` where username='$username'";
    $result=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];
    ?>
    <h3 class="text-center">Your Orders</h3>
    <table class="table table-border mt-2">
        <thead class="bg-warning">
            <tr>
                <th>No.</th>
                <th>Amount Due</th>
                <th>Total Product</th>
                <th>Invoice number</th>
                <th>Date</th>
                <th>Pending/Complete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="text-light" style="background-color:#0e2f44;">

        <?php

        $get_order_details="Select * from `user_orders` where user_id=$user_id";
        $result_orders=mysqli_query($con,$get_order_details);
        $number=1;
        While($row_orders=mysqli_fetch_assoc($result_orders)){
            $order_id=$row_orders['order_id'];
            $amount_due=$row_orders['amount_due'];
            $total_products=$row_orders['total_products'];
            $invoice_number=$row_orders['invoice_number'];
            $order_status=$row_orders['order_status'];
            if($order_status=='pending'){
                $order_status='Pending';
            }else{
                $order_status='Complete';
            }
            $order_date=$row_orders['order_date'];
            
            echo "  <tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>";
            ?>
            <?php 
            if($order_status=='Complete'){
                echo"<td>Paid</td>";
            }else{
            echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
            </tr>";
            }        
        $number++;
        }
        
        
        ?>

            
        </tbody>
    </table>


    <!-- bootstarp JS link -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>