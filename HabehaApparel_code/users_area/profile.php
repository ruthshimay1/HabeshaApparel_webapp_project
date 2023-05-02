<?php

// including connect.php file so that we can have access to database.
include('../include/connect.php');
include('../functions/common_functions.php');
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <metta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-witdth" , intial-scale=1.0">
        <title> Welcome <?php echo $_SESSION['username'] ?> </title>
        <!-- bootstrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- font awsome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Include script, embading for fonts from google -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:100,600|Montserrat:300,500" rel="stylesheet">

        <!-- Include script for font awesome icon library -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

        <!-- icon item -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


        <!-- icon item -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <!-- css file -->
        <link rel="stylesheet" href="../css/style.css">
        <!-- <link rel="stylesheet" href="../css/style_1.css"> -->
        <link rel="stylesheet" href="../css/link.css">
        <link rel="stylesheet" href="../css/carousel.css">

        <!-- <style>
            .profile_img {
                width: 100%;
                height: 50;

            }
        </style> -->
</head>

<body>
    <!-- navbar -- >

<div class="container-fluid p-0">

<!-- First Child -->

    <nav class="navbar navbar-expand-sm navbar-dark first-nav sticky-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php" style="font-family: cursive">
                <img src="../images/logo_img.png" width="35" height="35" class="d-inline-block align-top" alt="" class="logo">Habesha Apparel</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">My Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup class='cart_total'><?php cart_item(); ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price:$ <?php total_cart_price(); ?></a>
                    </li>
                </ul>
                <form class="d-flex" action="../search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
                    <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                </form>
            </div>
        </div>
    </nav>


    <!-- calling cart function -->
    <?php
    cart();
    ?>
    <!-- second child --->
    <nav class="navbar navbar-expand-sm sticky-top second-nav" style="color:white;">
        <ul class="navbar-nav me-auto">
            <?php
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
        <a class='nav-link text-light text-strong' href='#'>Welcome Guest</a>
      </li>";
            } else {
                echo "<li class='nav-item'>
        <a class='nav-link text-light text-strong' href='#'>Welcome " . $_SESSION['username'] . "</a>
      </li>";
            }
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/users_login.php'>Login</a>
      </li>";
            } else {
                echo "<li class='nav-item'>
                <a class='nav-link text-strong' style='color: #0e1111' href='logout.php'>Logout</a>        
      </li>";
            }

            ?>
        </ul>
    </nav>

    <!-- third child-->
    <div class="bg-light">
        <!-- 
    <h3 class="text-center">Habesha Apparel Web Store </h3> -->


    </div>
    <!-- Fourth child-->
    <div class="row px-4 py-4">
        <div class="col-md-2 p-0">
            <ul class="navbar-nav second-nav text-center">

                <li class="nav-item">
                    <a class="nav-link text-light p-1" href="#">
                        <h3 class="bolded"> Your Profile </h3>
                    </a>
                </li>
                <?php
                $username = $_SESSION['username'];
                $user_image = "select * from `user_table` where username='$username'";
                $user_image = mysqli_query($con, $user_image);
                $row_image = mysqli_fetch_array($user_image);
                $user_image = $row_image['user_image'];
                echo "<li class='nav-item second-nav'>
                <img src='./user_images/$user_image' class='profile_img my-4' alt='user image'
            </li>";

                ?>

                <li class="nav-item second-nav">
                    <a class="nav-link text-light" href="profile.php?my_orders">Pending Orders</a>
                </li>
                <li class="nav-item second-nav">
                    <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
                </li>
                <li class="nav-item second-nav">
                    <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
                </li>
                <li class="nav-item second-nav">
                    <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
                </li>
                <li class="nav-item second-nav">
                    <a class="nav-link text-light" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>

        <div class="col-md-10 text-center">
            <?php
            get_user_order_details();
            if (isset($_GET['edit_account'])) {
                include('edit_account.php');
            }
            if (isset($_GET['my_orders'])) {
                include('user_orders.php');
            }
            if (isset($_GET['delete_account'])) {
                include('delete_account.php');
            }
            ?>
        </div>
    </div>
    </dv>


    <!-- Last child -->
    <!-- include footer -->
    <?php include("footer1.php") ?>
    </div>


    <!-- bootstarp JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>