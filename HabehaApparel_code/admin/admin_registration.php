<?php
// including connect.php file so that we can have access to database.
include('../include/connect.php');
include('../functions/common_functions.php');
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <metta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-witdth" , intial-scale=1.0">
        <title> Admin Registration</title>
        <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- font awsome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css file -->
  <link rel="stylesheet" href="../style.css">

  <style>
    .admin_image{
      width: 100px;
      object-fit: contain;
    }
    body{
      overflow: hidden;
    }
    .footer {     
      position: absolute;
      bottom: 0
    }
    .product_image{
      width: 100px;
      object-fit: contain;
      
    }


  </style>

</head>
<body>

<div class="container-fluid mx-2 my-5">
    <div class="container-fluid">
      <a class="navbar-brand text-dark" href="index.php" style="font-family: cursive">
    <img src="../images/logo_img.png" width="35" height="35" class="d-inline-block align-top" alt="" class="logo"> Home</a>
    </div>
    <h2 class="text-center mb-5">Admin Registration </h2>

<div class="row d-flex justify-content-center">

<div class="col-lg-6 col-xl-5">
<img src="../images/admin_img.png" alt="Admin Registration" class="img-fluid">
</div>

<div class="col-lg-6 col-xl-4">
<form action="" method="post">
    <div class="form-outline mb-4">
        <label for="username" class="form-lable">Username</label>
        <input type="text" id="username" name="admin_username" placeholder="enter your username" required="required" class="form-control">
    </div>


    <div class="form-outline mb-4">
        <label for="email" class="form-lable">Email</label>
        <input type="text" id="email" name="admin_email" placeholder="Enter your email" required="required" class="form-control">
    </div>


    <div class="form-outline mb-4">
        <label for="password" class="form-lable">Password</label>
        <input type="text" id="username" name="admin_password" placeholder="Enter your password" required="required" class="form-control">
    </div>

    <div class="form-outline mb-4">
        <label for="confirm_password" class="form-lable">Confrim Password</label>
        <input type="text" id="confirm_password" name="conf_admin_password" placeholder="Confirm your password here" required="required" class="form-control">
    </div>

    <div class="form-outline mb-4">
       
        <input type="submit" style="background-color: #40e0d0;" class="bg-info py-2 px-3 border-0 text-light" name="admin_register" value="Register">
        <p class="small fw-bold mt-2 pt-1">Already have an count? <a href="admin_login.php" class="link-danger">Login</a></p>
    </div>


</form>
</div>                 
</div>
</div>
</body>



</html>



<!-- php code -->
<?php
if(isset($_POST['admin_register'])){
    $admin_username=$_POST['admin_username'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password, PASSWORD_DEFAULT);
    $conf_admin_password=$_POST['conf_admin_password'];

    // select query
    $select_query="select * from `admin_table` where admin_name='$admin_username' or admin_email='$admin_email'";
    $result=mysqli_query($con, $select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script> alert ('admin already exist')</script>";
    }elseif($admin_password!=$conf_admin_password){
        echo "<script> alert ('Passwords do not match. Try again.')</script>";
    }
    else{   
   //insert_query
   
   $insert_query="insert into `admin_table` (admin_name, admin_email, admin_password) values ('$admin_username', '$admin_email', '$hash_password')";
   $sql_execute=mysqli_query($con,$insert_query);
   echo "<script>alert('Registrations Successful.')</script>";
     
}

}


?>