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
    <title> E-commerce Website Using Php and MySQL. </title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- css file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- navbar -- >

<div class="container-fluid p-0">

<!-- First Child -->
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <img src="./images/logo_img.png" alt="" class="logo">
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
           if(isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/profile.php'>My Account</a>
          </li>";
           }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/users_registration.php'>Register</a>
          </li>";
           }          
          ?>          
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#">Total Price:$ <?php total_cart_price();?></a>
          </li>
        </ul>
        <form class="d-flex" action="search_product.php" method="get">
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
<!-- seond child --->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">      
      <?php 
      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
      </li>";
      }
      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/users_login.php'>Login</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/logout.php'>Logout</a>
      </li>";
      }
     
      ?>
    </ul>
  </nav>

  <!-- third child-->
  <div class="bg-light">

    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communications is at the heart of e-commerce adn community </p>
  </div>

  <!---fourth child-->

  <div class="row px-1">
    <div class="col-md-10">
           <!-- Pruducts -->
      <div class="row">
     <!--fetching Pruducts-->
        <?php
        //calling Functions 
        getproducts();
        get_unique_categories();
        get_unique_brands();
        $ip = getIPAddress();  
        // echo "User Real IP Address - '.$ip";
       
        ?>

        <!-- row end --->

      </div>

      <!-- col end-->


    </div>

    <div class="col-md-2 bg-secondary p-0">
      <!--sidenav-->
      <!-- Brands to be displayed-->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light">
            <h4>Delivery Brands</h4>
          </a>
        </li>

        <?php
        // calling function 
        getbrands();

        ?>

      </ul>

      <!-- Catagories to be displayed-->

      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light">
            <h4>Categories</h4>
          </a>

        </li>

        <?php

        getcategories();
        
        ?>
      </ul>
    <!-- </div> -->
    </div>

    <!-- Last child -->    
    <!-- include footer -->
    <?php include("./include/footer.php") ?>
  </div>




  <!-- bootstarp JS link -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>




</body>


</html>