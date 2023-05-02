<?php
// including connect.php file so that we can have access to database.
include('include/connect.php');
include('functions/common_functions.php');
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <metta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-witdth" , intial-scale=1.0">
        <title> E-commerce Website- Cart details. </title>

        <!-- botstrap CSS link -->
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
     <!-- css file -->
     <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style_1.css">
    <link rel="stylesheet" href="./css/link.css">
    <link rel="stylesheet" href="./css/carousel.css">

        <!-- internal css -->
     
        <!-- <style>
            .cart_img {
                width: 80px;
                height: 80px;
                object-fit: contain;
            }
        </style> -->
</head>

<body>
    <!-- navbar -- >

<div class="container-fluid p-0">

<!-- First Child -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-info"> -->
    <nav class="navbar navbar-expand-sm navbar-dark first-nav sticky-top bg-dark">    
        <div class="container-fluid">
        <a class="navbar-brand" href="index.php" style="font-family: cursive">
    <img src="./images/logo_img.png" width="35" height="35" class="d-inline-block align-top" alt="" class="logo">Habesha Apparel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_all.php">Products</a>
                    </li>
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/profile.php'>My Account</a>
          </li>";
                    } else {
                        echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/users_registration.php'>Register</a>
          </li>";
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                </ul>
            </div>
        </div>
    </nav>

    <!-- calling cart function -->
    <?php
    cart();
    ?>

    <!-- second child --->
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-secondary"> -->
    <nav class="navbar navbar-expand-sm sticky-top second-nav" style= "color:white;">
        <ul class="navbar-nav me-auto">
            <?php
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
                <a class='nav-link text-light text-strong' style='color: #0e1111' href='#'>Welcome Guest</a>
      </li>";
            } else {
                echo "<li class='nav-item'>
                <a class='nav-link text-light text-strong' style='color: #0e1111' href='#'>Welcome ".$_SESSION['username']."</a>
      </li>";
            }
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
        <a class='nav-link' style='color: #0e1111' href='./users_area/users_login.php'>Login</a>
      </li>";
            } else {
                echo "<li class='nav-item'>
        <a class='nav-link' style='color: #0e1111' href='./users_area/logout.php'>Logout</a>
      </li>";
            }

            ?>
        </ul>
    </nav>

    <!-- third child-->
    <div class="bg-light">
        <!-- <h3 class="text-center">Hidden Store</h3> -->
        <!-- <p class="text-center">Welcome to HabeshaApparel </p> -->
    </div>

    <!--  fourth child -->
    <div class="container">
        <div class="row p-5">
            <form action="" method="post">
                <table class="table table-bordered text-center">
                    <!--  php code to display dynamic data -->
                    <?php
                    $get_ip_add = getIPAddress();
                    $total = 0;
                    $cart_query = "select * from `cart_details` where ip_address='$get_ip_add'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "<thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Qty</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th 'colspan='2'>Operations</th>
                        </tr>
                    </thead>
                    <tbody>";

                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $select_products = "select * from `products` where product_id='$product_id'";
                            $result_products = mysqli_query($con, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];
                                $product_values = array_sum($product_price);
                                $total += $product_values;
                    ?>
                                <tr>
                                    <td><?php echo $product_title ?></td>
                                    <td><img src="./admin/product_images/<?php echo $product_image1 ?>" alt"" class="cart_img"></td>
                                    <td align='center'><input type="number" style="width:100px;" name="qty"  min="1" max="10" class="form-input w-5 text-align-center"></td>
                                    <?php
                                    $get_ip_add = getIPAddress();
                                    if (isset($_POST['update_cart'])) {
                                        $quantities = $_POST['qty'];
                                        $update_cart = "update `cart_details` set quantity=$quantities where  ip_address='$get_ip_add'";
                                        $result_products_quantity = mysqli_query($con, $update_cart);
                                        $total = floatval($total) * intval($quantities);
                                    }

                                    ?>
                                    <td><?php echo $price_table ?></td>
                                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                    <td>
                                        <!-- <button class="bg-info px-3 py-2 border-0">Update</button> -->
                                        <input type="submit" style="width:40%; display:inline-block;" value="Update" class="my_button  px-1 py-1" name="update_cart"> &nbsp;  
                                        <!-- <button class="bg-info px-3 py-2 border-0">Remove</button> -->
                                        <input type="submit" style="width:40%; display:inline-block;" value="Remove" class="px-1 py-1  my_button" name="remove_cart">
                                    </td>
                                </tr>

                    <?php
                            }
                        }
                    } else {

                        echo "<h2 class='text-center'>Your Cart is Empty</h2>";
                    } ?>
                    </tbody>
                </table>

                <!--  Subtotal -->
                <div class="d-flex mb-5 mt-3">
               
                    
                    <?php
                    $get_ip_add = getIPAddress();
                    // $total=0;                  
                    $cart_query = "select * from `cart_details` where ip_address='$get_ip_add'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {   
                        echo "<span class='text-start'><h4 class='text-left'>Subtotal:&nbsp;&nbsp;&nbsp;<strong class='text-warning'>$$total</strong></h4>  </span>
                        
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;                   
                                         
                       <input type='submit' style='width: 175px; height: 40px;' value='Continue Shopping' class='my_button' name='continue_shopping'>&nbsp; &nbsp;
                         <button style='width: 175px; height: 40px;' class='my_button '><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout </a></button>";
                    } else {
                        echo "<input type='submit' style='width: 175px' value='Continue Shopping' class='text-center my_button' name='continue_shopping'></pre>";
                    }
                    if (isset($_POST['continue_shopping'])) {
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                    ?>
                    

                </div>

        </div>

    </div>
    </form>
    <!-- function to remove items -->
    <?php
    function remove_cart_item()
    {
        global $con;
        if (isset($_POST['remove_cart'])) {
            foreach ($_POST['removeitem'] as $remove_id) {
                echo $remove_id;
                $delete_query = "Delete from `cart_details` where product_id=$remove_id";
                $run_delete = mysqli_query($con, $delete_query);
                if ($run_delete) {
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }

    echo $remove_item = remove_cart_item();


    ?>

    <!-- Last child -->
    <!-- include footer -->
    <?php include("./include/footer.php") ?>
    </div>




    <!-- bootstarp JS link -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
     <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>




</body>


</html>