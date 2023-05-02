<?php
// including connect.php file so that we can have access to database.
include('../include/connect.php');
include('../functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <metta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-witdth", intial-scale=1.0">
    <title> User Registration. </title>
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
    <link rel="stylesheet" href="../css/carousel.css">

</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark first-nav sticky-top bg-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="../index.php" style="font-family: cursive">
    <img src="../images/logo_img.png" width="35" height="35" class="d-inline-block align-top" alt="" class="logo"> Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
    </div>
  </nav>
    <div container-fluid my-3>
        <h2 class='text-center py-3 mt-3'>New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center mt-3">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                     <!--  username field -->
                    <div class="form-outline mb-4">                       
                        <label for="user_username" class="form-label">User Name</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your user name" autocomplete="off" required="required" name="user_username"/>                        
                    </div>
                    <!--  email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email"/>                        
                    </div>
                    <!--  image field -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control"  name="user_image"/>   
                    <!--  password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>                        
                    </div>   
                         <!--  confirm password field -->
                         <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required="required" name="conf_user_password"/>                        
                    </div>
                     <!--  Address field -->
                     <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address"/>                        
                    </div> 
                     <!--  Contact field -->
                     <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your phone number" autocomplete="off" required="required" name="user_contact"/>                        
                    </div>  
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="my_button py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?<a href="users_login.php"class="text-danger"> Login</a> </p>
                    </div>                
                    </div>
                </form>
            </div>
        </div>
    </div>

      <!-- bootstarp JS link -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    
    
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();  

    // select query
    $select_query="select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con, $select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script> alert ('user already exist')</script>";
    }elseif($user_password!=$conf_user_password){
        echo "<script> alert ('Passwords do not match. Try again.')</script>";
    }
    else{   
   //insert_query
   move_uploaded_file($user_image_tmp, "./user_images/$user_image");
   $insert_query="insert into `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_phone) values ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
   $sql_execute=mysqli_query($con,$insert_query);
   
     
}

// selecting cart items
$select_Cart_items="select * from `cart_details` where ip_address='$user_ip'";
$result_cart=mysqli_query($con, $select_Cart_items);
$rows_count=mysqli_num_rows($result_cart);
   if($rows_count>0){
    $_SESSION['username']=$user_username;
    echo "<script> alert ('You have items in your cart.')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
   }else{
    echo "<script> window.open('../index.php','_self')</script>";
   }
}


?>

