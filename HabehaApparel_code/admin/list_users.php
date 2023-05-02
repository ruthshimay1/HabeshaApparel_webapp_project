<h2 class="text-center">All Users</h2>
<table class="table table-bordered mt-2">
    <thead style="background-color: #40e0d0;">
        <?php
    $get_users="select * from `user_table`";
 
    $result=mysqli_query($con,$get_users);
    $row_count=mysqli_num_rows($result);
    

if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'> No Registered Users Yet</h2>";

}else{
    echo "
        
    <tr>
    <th>Sr.N<span><sup style='text-decoration:underline;'>o</sup></span> </th>
    <th>User Name</th>
    <th>User Email Address</th>
   <!-- <th>User Image</th>  -->      
    <th>User Address</th>
    <th>User Phone</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class='text-light' style='background-color:#3399ff;'>";
 
$number=0;
while($row_data=mysqli_fetch_assoc($result)){
    $user_id=$row_data['user_id'];
    $user_name=$row_data['username'];
    $user_email=$row_data['user_email'];
    $user_image=$row_data['user_image'];
    $user_address=$row_data['user_address'];
    $user_phone=$row_data['user_phone'];
    $number++;
    ?>
    <tr>
    <td><?php echo $number;?></td>
    <td><?php echo $user_name;?></td>
    <td><?php echo $user_email;?></td>
    <!-- <td><?php echo "<img src='../user_area/user_images/$user_image'/>";?></td> -->
    <td><?php echo $user_address;?></td>
    <td><?php echo $user_phone;?></td>
    
    <td><a href='index.php?delete_user=<?php echo $user_id ?>' 
            type="button" class="text-light" data-toggle="modal" 
            data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a>
            </td>
    
    </tr>

    <?php

    }

}

?>
 
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <h4> Are you sure you want delete this User ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" 
        data-dismiss="modal"><a href="./index.php?list_users" 
        class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_user=<?php echo $user_id ?>' 
            class="text-light text-decoration-none" >Yes</a></button>
      </div>
    </div>
  </div>
</div>