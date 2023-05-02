<?php

if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="Select * from `user_table` where username='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_phone=$row_fetch['user_phone'];
}
    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_phone=$_POST['user_phone'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];        
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");

        // update query 
        $update_data="update `user_table` set username='$username', user_email='$user_email',user_image='$user_image',
        user_address='$user_address', user_phone='$user_phone'where user_id=$update_id";
        $result_query_update=mysqli_query($con, $update_data);
        if($result_query_update){
      
        echo "<script>alert('Data Updated Successfully')</script>";
        echo "<script>window.open('logout.php','_self')</script>";
        }

    }



?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <metta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-witdth" , intial-scale=1.0">
        <title> Edit Account </title>
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
        
</head>

<body>
 
<h3 class="text-center text-success mb-4 "> Edit Account </h3>
<form action="" method="post" enctype="multipart/form-data" class="text-center">
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>" name="user_username">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo  $user_email ?>" name="user_email">
    </div>
    <div class="form-outline mb-4 d-flex w-50 m-auto">
        <input type="file" class="form-control m-auto" name="user_image">
        <img src="./user_images/<?php echo $user_image?>" alt="" 
        class="edit_img">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo  $user_address ?>" name="user_address">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_phone ?>" name="user_phone">
    </div>
    <input type="submit" style="width:20%; display:inline-block;" value="Update" class="my_button py-2 px-3 border-0" name="user_update">
</form>



<!-- bootstarp JS link -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>