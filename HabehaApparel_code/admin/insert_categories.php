<?php 
// including connect.php file so that we can have access to database.
include('../include/connect.php');
if(isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_title'];

    //select data from database 
    $select_query="Select * from categories where category_title='$category_title' ";
    $result_select = mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
if($number>0){
  // $message = "Category already exists.";
  // echo '<div id="message">'.$message.'<div id="close-button"></div></div>';

    echo "<script>alert('Category already exists')</script>";
}elseif($category_title==''){
  echo "<script>alert('Category can not be empty')</script>";
}else{

    $insert_query="insert into categories (category_title) values ('$category_title')";  
    $result = mysqli_query($con,$insert_query);
    if($result){
      $message = "Category has been successfully inserted.";

        echo "<script>alert('Category has been successfully inserted')</script>";
    }
    // echo '<div id="message">'.$message.'<div id="close-button"></div></div>';
}}

?>

<h2 class="text-center">Insert Catagories</h2>

<form action="" method="post" class=mb-2>

<div class="input-group w-90 mb-2">
  <span class="input-group-text" id="basic-addon1"><i 
  class="fa-solid fa-tags"></i></span>
  <input type="text" class="form-control" name="cat_title" 
  placeholder="Insert category" aria-label="Categories" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-2 m-auto">
 
  <input type="submit" style="background-color: #40e0d0;" class="border-0 p-2 my-3 text-light" name="insert_cat" value="Insert Categories">

  <!-- <button class="bg-info p-2 my-3 border-0">Insert Categories</button> -->

</div>


</form> 