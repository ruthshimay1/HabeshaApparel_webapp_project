<?php 
// including connect.php file so that we can have access to database.
include('../include/connect.php');
if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];

    //select data from database 
    $select_query="Select * from brands where brand_title='$brand_title' ";
    $result_select = mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
if($number>0){

    echo "<script>alert('Brand already exists.')</script>";
}elseif($brand_title==''){
  echo "<script>alert('Brand can not be empty.')</script>";
}

else{

    $insert_query="insert into brands (brand_title) values ('$brand_title')";  
    $result = mysqli_query($con,$insert_query);
    if($result){

        echo "<script>alert('Brand has been successfully inserted')</script>";
    }
}}

?>




<h3 class="text-center">Insert Brands</h3>
<form action="" method="post" class=mb-2>

<div class="input-group w-90 mb-2">
  <span class="input-group-text" id="basic-addon1"><i 
  class="fa-solid fa-tag"></i></span>
  <input type="text" class="form-control" name="brand_title" 
  placeholder="Insert brand" aria-label="brands" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-2 m-auto">
 

<input type="submit" style="background-color: #40e0d0;" class="border-0 p-2 my-3 text-light" name="insert_brand" value="Insert Brands">

  <!-- <input type="submit" class="form-control bg-info" name="insert_cat" 
  value="Insert Categories" aria-label="Username" 
  aria-describedby="basic-addon1" class="bg-info"> -->
  <!-- <button class="bg-info p-2 my-3 border-0">Insert Brands</button> -->

</div>


</form> 