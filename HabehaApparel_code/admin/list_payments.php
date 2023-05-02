<h2 class="text-center">All Payments</h2>
<table class="table table-bordered mt-2">
    <thead style="background-color: #40e0d0;">
        <?php
    $get_payments="select * from `user_payments`";
 
    $result=mysqli_query($con,$get_payments);
    $row_count=mysqli_num_rows($result);
    

if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'> No payments received yet </h2>";

}else{
    echo "
        
    <tr>
    <th>Sr.N<span><sup style='text-decoration:underline;'>o</sup></span> </th>
    <th>Invoice Number</th>
    <th>Amount</th>
    <th>Payment Mode</th>        
    <th>Order Date</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class='text-light' style='background-color:#3399ff;'>";
 
$number=0;
while($row_data=mysqli_fetch_assoc($result)){
    $order_id=$row_data['order_id'];
    $payment_id=$row_data['payment_id'];
    $amount=$row_data['amount'];
    $invoice_number=$row_data['invoice_number'];
    $payment_mode=$row_data['payment_mode'];
    $date=$row_data['date'];
    $number++;
    ?>
    <tr>
    <td class=''><?php echo $number;?></td>
    <td><?php echo $invoice_number;?></td>
    <td><?php echo $amount;?></td>
    <td><?php echo $payment_mode;?></td>
    <td><?php echo $date;?></td>
    <td><a href='index.php?delete_payment=<?php echo $payment_id ?>' 
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
      <h4> Are you sure you want delete this Payment ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" 
        data-dismiss="modal"><a href="./index.php?list_payments" 
        class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_payment=<?php echo $order_id ?>' 
            class="text-light text-decoration-none" >Yes</a></button>
      </div>
    </div>
  </div>
</div>