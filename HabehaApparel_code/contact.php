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
    <title> Habesha Apparel Contact Us. </title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Include script, embading for fonts from google -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:100,600%7CMontserrat:300,500" rel="stylesheet">

    <!-- Include script for font awesome icon library -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <!-- icon item -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <!-- css file -->
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <!-- <link rel="stylesheet" href="./css/style_1.css"> -->
    <!-- <link rel="stylesheet" href="./css/link.css"> -->
    <link rel="stylesheet" href="./css/carousel.css">

<!--  receiving email-->

    <script>
function submitToAPI(event) {
       event.preventDefault();
         var URL = "https://mkkp3zkm17.execute-api.us-east-1.amazonaws.com/habeshaapparel";
         
         
       var name = document.getElementById("name-input").value;
       var phone = document.getElementById("phone-input").value;
       var email = document.getElementById("email-input").value;
       var desc = document.getElementById("description-input").value;
	   if (name=="" || phone=="" || email=="" || desc=="")
        {
            alert("Please Fill All Required Field");
            return false;
        }
		
		nameRE = /^[A-Z]{1}[a-z]{2,20}[ ]{1}[A-Z]{1}[a-z]{2,20}/;
		if(!nameRE.test(name)) {
			alert("Name entered, is not valid");
				return false;
		}
		
		phoneRE = /^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$/;
		if(!phoneRE.test(phone)) {
				alert("Phone number entered, is not valid");
				return false;
            }
		
		emailRE = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(!emailRE.test(email)) {
			alert("Email Address entered, is not valid");
				return false;
		}
       var data = {
          name : name,
          phone : phone,
          email : email,
          desc : desc
        };

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("POST", "https://mkkp3zkm17.execute-api.us-east-1.amazonaws.com/habeshaapparel");
		xmlhttp.setRequestHeader("Content-Type", "application/json");
		xmlhttp.send(JSON.stringify(data));
		xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState === 4) {
			var response = JSON.parse(xmlhttp.responseText);
			if (xmlhttp.status === 200 ) {
				console.log('successful');
				document.getElementById("contact-form").innerHTML = "<h1>Thank you for your message/feedback<br>our team will get back to you soon!</h1>";
		    } else {
			    console.log('failed');
			}
		}
	}
	
	document.getElementById('contact-form').reset();
	  
	} 
</script>
</head>

<body>
  <!-- navbar -- >

<div class="container-fluid p-0">

<!-- First Child -->
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
            <a class="nav-link" href="index.php?SUBMIT">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup class='cart_total'><?php cart_item(); ?></sup></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Total Price:$ <?php total_cart_price(); ?></a>
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
  <nav class="navbar navbar-expand-sm sticky-top second-nav" style="background-color:#c39797;">
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-secondary"> -->
    <ul class="navbar-nav me-auto">
      <?php
      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
        <a class='nav-link text-light text-strong' style='color: #0e1111' href='#'>Welcome Guest</a>
      </li>";
      } else {
        echo "<li class='nav-item'>
        <a class='nav-link text-light text-strong' style='color: #0e1111' href='#'>Welcome " . $_SESSION['username'] . "</a>
      </li>";
      }
      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
        <a class='nav-link text-strong' style='color: #0e1111' href='./users_area/users_login.php'>Login</a>
      </li>";
      } else {
        echo "<li class='nav-item'>
        <a class='nav-link text-strong' style='color: #0e1111' href='./users_area/logout.php'>Logout</a>
      </li>";
      }

      ?>
    </ul>
  </nav>



  <?php

  if (isset($_POST['SUBMIT'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //Checking empty conditiin 
    if ($first_name == '' or $last_name == '' or $email == '' or $message == '') {
      echo "<script>alert('all fields should be filled out.')</script>";
      exit();
    } else {
      //insert query
      $inset_contact = "insert into `contact` (first_name, last_name, email, message,date) values ('$first_name','$last_name', '$email', '$message', NOW())";
      $result_query = mysqli_query($con, $inset_contact);
      if ($result_query) {
        echo "<script>alert('Message successfully sent.')</script>";
        echo "<script>window.open('index.php?', '_self')</script>";
      }
    }
  }
  ?>


  <!-- <main style="margin:auto 83px;">

  <div id="contact" class="form-1 bg-gray">

    <div class="container">

        <div class="row">
            <div class="col-lg-12"> -->
  <!-- <body calss="bg-light"> -->
  <div class="container mt-3">
    <h2 class="text-center">Contact Form</h2>
    <!--        
        <form action="" method="post" enctype="multipart/form-data"> -->
    <!-- title -->

    <!-- Contact Form -->

    <form action="" class="form" id="contact-form" method="post" style=" width: 50vw; margin-left : 25vw;">
      <!-- <h3>First Name<span style="color: #1ab188;">*</span>:</h3>
                    <input type="text" style="height:55px;" id="name-input" placeholder="First Name" name="first_name" class="form-control" style="width:100%;" /><br/> -->
      <div class="form-outline mb-4">
        <label for="first_name" class="form-lable">First Name</label>
        <input type="text" id="first_name" name="first_name" placeholder="enter your first name" required="required" class="form-control">
      </div>

      <!-- <h3>Last Name<span style="color: #1ab188;">*</span>:</h3>
                    <input type="text" style="height:55px;" id="name-input" placeholder="Last Name" name="last_name" class="form-control" style="width:100%;" /><br/> -->
      <div class="form-outline mb-4">
        <label for="last_name" class="form-lable">Last Name</label>
        <input type="text" id="last_name" name="last_name" placeholder="enter your last name" required="required" class="form-control">
      </div>

      <!-- 
                    <h3>Email<span style="color: #1ab188;">*</span>:</h3>
                    <input type="email" style="height:55px;" id="email-input" placeholder="Email Adress..." name="email" class="form-control" style="width:100%;"/><br/> -->
      <div class="form-outline mb-4">
        <label for="email" class="form-lable">Email</label>
        <input type="email" id="email" name="email" placeholder="enter your email" required="required" class="form-control">
      </div>


      <!-- <h3>Message</h3>
                    <textarea id="description-input" rows="10" placeholder="Message..." name="message" class="form-control" style="width:100%;"></textarea><br/> -->
      <div class="form-outline mb-4">
        <label for="message" class="form-lable">Message....</label>
        <input type="text" id="message" name="message" placeholder="enter your message" required="required" rows="10" class="form-control">
      </div>


      <!-- <div class="g-recaptcha" data-sitekey="6Lc7cVMUAAAAAM1yxf64wrmO8gvi8A1oQ_ead1ys" class="form-control" style="width:100%;"></div>
                    <button type="button" onClick="submitToAPI(event)" name="contact" class="my_button" style="margin-top:20px;">submit</button> -->

      <!-- <div class="form-outline mb-4 w-50 m-auto"> -->
      <div class="form-outline mb-4 w-50 text-left">
        <input type="submit" style="width:50%;" name="SUBMIT" class="btn my_button" value="SUBMIT">
      </div>
    </form>

  </div>
  <!-- end of contact form -->
  <!-- </div> -->
  <!-- end of contact form -->

  <!-- </div> end of container -->
  <!-- </div> end of form-1 -->
  <!-- end of contact -->

  <hr class="featurette-divider">  

   <!-- bootstarp JS link -->

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>