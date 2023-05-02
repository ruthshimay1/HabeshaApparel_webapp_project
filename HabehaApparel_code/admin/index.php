<!-- connect file -->
<?php
// including connect.php file so that we can have access to database.
include('../include/connect.php');
include('../functions/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- bootstrap CSS link -->
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
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../css/carousel.css">

  <style>
    .admin_image{
      width: 100px;
      object-fit: contain;
    }
    body{
      overflow-x: hidden;
    }
    .footer {     
      position: absolute;
      bottom: 0
    }
    .product_image{
      width: 125px;
      object-fit: contain;
      
    }
    .button {
      background-color: #66cdaa;
      font-size: 15px; 
      border:none;
      padding: 14px 25px;
      border-radius: 5px;
 
    }


  </style>
</head>

<body>
  <!-- navigation bar-->
  <div class="container-fluid p-0">
  <nav class="navbar navbar-expand-sm navbar-dark first-nav sticky-top" style="background-color:#20b2aa;">
 
    <!--First Child-->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-info"> -->
      <div class="container-fluid">
      <a class="navbar-brand" href="index.php" style="font-family: cursive">
    <img src="../images/logo_img.png" width="35" height="35" class="d-inline-block align-top" alt="" class="logo">Habesha Apparel</a>
        <nav class="navbar navbar-expand-lg">
          <ul class="navbar-nav">
            <li class="nav-item">
            <?php 
      if(!isset($_SESSION['admin_username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Admin</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome ".$_SESSION['admin_username']."</a>
      </li>";
      }
      if(!isset($_SESSION['admin_username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='admin_login.php'>Login</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='logout.php'>Logout</a>  
           
      </li>";
      }
      // echo "<script>window.open('index.php', '_self')</script> ";
      ?>
            </li>
          </ul>
        </nav>
      </div>
    </nav>

    <!--second child-->
    <div class="bg-light">
      <h2 class="text-center text-strong p-2 mb-2"> Admin Dashboard</h2>
    </div>

    <!--third child-->
    <!-- <div class="row">
      <div class="col-md-12 bg-light p-1 d-flex align-items-center">
        <div class="p-3">
          <a href="#"> <img src="../images/admin_img.png" alt="admin image" class="admin_image"></a> -->
          
<!-- <?php
          if(!isset($_SESSION['admin_username'])){
        echo "<p class='text-dark text-center'></p>";
        
      }else{
        echo "
        <p class='text-light text-center-item'>
        Welcome ".$_SESSION['admin_username']."
      <p>";
      }
          
?> -->
        </div>

        <div class="text-center">
          <button class="my-center"><a href="index.php?insert_product" class="nav-link button text-light my-1">Insert Products</a></button>
          <button class="my-center"><a href="index.php?view_products" class="nav-link button  text-light  my-1">View Products</a></button>
          <button class="my-center"><a href="index.php?insert_category" class="nav-link button text-light  my-1">Insert Categories</a></button>
          <button class="my-center"><a href="index.php?view_categories"class="nav-link button  text-light my-1">View Categories</a></button>
          <button class="my-center"><a href="index.php?insert_brand" class="nav-link button text-light my-1">Insert Brands</a></button>
          <button class="my-center"><a href="index.php?view_brands" class="nav-link button text-light my-1">View Brands</a></button>
          <button class="my-center"><a href="index.php?list_orders" class="nav-link button text-light my-1">All Orders</a></button>
          <button class="my-center"><a href="index.php?list_payments" class="nav-link button text-light my-1">All Payments</a></button>
          <button class="my-center"><a href="index.php?list_users" class="nav-link button text-light my-1">List Users</a></button>
          <!-- <button class="my-center"><a href="logout.php" class="nav-link button text-light my-1">Logout</a></button> -->
        </div>
      </div>
    </div>


    <!--fourth child-->
    <div class="container my-3">
      <?php
      if (isset($_GET['insert_product'])) {
        include('insert_product.php');
      }
      if (isset($_GET['insert_category'])) {
        include('insert_categories.php');
      }
      if (isset($_GET['insert_brand'])) {
        include('insert_brands.php');
      }
      if (isset($_GET['view_products'])) {
        include('view_products.php');
      }

      if (isset($_GET['edit_products'])) {
        include('edit_products.php');
      }

      if (isset($_GET['delete_product'])) {
        include('delete_product.php');
      }

      if (isset($_GET['view_categories'])) {
        include('view_categories.php');
      }

      if (isset($_GET['view_brands'])) {
        include('view_brands.php');
      }

      if (isset($_GET['edit_category'])) {
        include('edit_category.php');
      }


      if (isset($_GET['edit_brand'])) {
        include('edit_brand.php');
      }

      if (isset($_GET['delete_category'])) {
        include('delete_category.php');
      }

      if (isset($_GET['delete_brand'])) {
        include('delete_brand.php');
      }

      if (isset($_GET['list_orders'])) {
        include('list_orders.php');
      }
      

      if (isset($_GET['delete_order'])) {
        include('delete_order.php');
      }

      if (isset($_GET['list_payments'])) {
        include('list_payments.php');
      }

      if (isset($_GET['delete_payment'])) {
        include('delete_payment.php');
      }

      if (isset($_GET['list_users'])) {
        include('list_users.php');
      }

      if (isset($_GET['delete_user'])) {
        include('delete_user.php');
      }
      

      
      ?>
    </div>






    <!--Last child-->
    <div>
     <!-- include footer -->       
     <!-- <?php include("../include/footer_admin.php") ?> -->
     </div>
    </div>
  </div>
<!-- bootstarp JS link -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

 

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>