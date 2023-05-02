<!-- connect file -->
<?php
// including connect.php file so that we can have access to database.
include('../include/connect.php');
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <metta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-witdth" , intial-scale=1.0">
    <title> HabeshaApparel - Checkout Page </title>

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

    <!-- icon item -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <!-- css file -->
    <!-- <link rel="stylesheet" href="../css/style.css">   
    <link rel="stylesheet" href="../css/link.css"> -->
    <link rel="stylesheet" href="../css/carousel.css">



    <style>
      .logo {
        width: 4%;
        height: 4%;
      }
    </style>
</head>

<body>
  <!-- navbar -- >
<div class="container-fluid p-0">

<!-- First Child -->
  <nav class="navbar navbar-expand-sm navbar-dark first-nav sticky-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php" style="font-family: cursive">
        <img src="../images/logo_img.png" width="35" height="35" class="d-inline-block align-top" alt="" class="logo">Habesha Apparel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../display_all.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users_registration.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
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

  <!-- seond child --->
  <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-secondary"> -->
  <nav class="navbar navbar-expand-sm sticky-top second-nav" style="background-color:#c39797;">
    <ul class="navbar-nav me-auto">
      <?php
      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
        <a class='nav-link text-light text-strong' style='color: #0e1111'' href='#'>Welcome Guest</a>
      </li>";
      } else {
        echo "<li class='nav-item'>
        <a class='nav-link text-light text-strong' style='color: #0e1111' href='#'>Welcome " . $_SESSION['username'] . "</a>
      </li>";
      }
      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
        <a class='nav-link text-strong' style='color: #0e1111' href='users_login.php'>Login</a>
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

    <!-- <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communications is at the heart of e-commerce adn community </p> -->
  </div>

  <!---fourth child-->
  <div class="row px-1">
    <div class="col-md-12">
      <!-- Pruducts -->
      <div class="row p-5">
        <?php
        if (!isset($_SESSION['username'])) {
          include('users_login.php');
        } else {
          include('payment.php');
        }
        ?>

      </div>
      <!--col end-->

    </div>
  </div>



  <!-- Last child -->
  <!-- include footer -->
  <!-- <?php include("footer1.php") ?> -->
  </div>




  <!-- bootstarp JS link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>


</html>