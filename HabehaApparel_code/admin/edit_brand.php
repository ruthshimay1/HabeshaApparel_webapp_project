
<?php

if(isset($_GET['edit_brand'])){
    $edit_brand=$_GET['edit_brand'];
    //echo $edit_category

    $get_brands= "select * from `brands` where brand_id=$edit_brand";
    $result=mysqli_query($con,$get_brands);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];

    
}

if(isset($_POST['edit_brand'])){

    $brand_title = $_POST['brand_title'];
    $update_query="update `brands` set brand_title='$brand_title' where brand_id=$edit_brand";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo "<script> alert ('Brand is updated  Successfully')</script>";
        echo "<script> window.open ('./index.php?view_brands.php','_self')</script>";
    }

}

?>


<div class="container mt-3">

<h2 class="text-center">Edit Brands</h2>
<form action="" method="post" class="text-center">
<div class="form-outline mb-4 w-50 m-auto">
    <label for="brand_title" class="form-label">Brand Title</label>
    <input type="text" name ="brand_title" id="brand_title" class="form-control" required="required" 
    value='<?php echo $brand_title;?>'>
</div>

<input type="submit" style="background-color: #40e0d0;" value="update brand" class="btn btn-info px-3 text-light" name="edit_brand">
</form>

</div>