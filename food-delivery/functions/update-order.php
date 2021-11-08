<?php 
session_start();
include 'flash.php';
$flash = new \FlashMessage();
include '../includes/config.php';
if(isset($_POST['update_order'])){
	$order_status = $_POST['order_status'];
	$order_id = $_POST['order_id'];
	$updated = date( 'Y-m-d H:i:s');
	$sqlOU  = "UPDATE `orders` SET `status` = '".$order_status."', `updated` = '".$updated."' WHERE `id` = ".$order_id;
	if($conn->query($sqlOU)){
		  	$flash->add("notification_msg","Order Status Updated Successfully!");
			$flash->add("notification_type","success");
			?>
		    <script type="text/javascript">
		     location.href = '../admin-order-detail.php?id=<?php echo $order_id;?>';
			 </script>
		    <?php
		    exit;
	}
}
else{
  	$flash->add("notification_msg","You Are Not Allowed!");
	$flash->add("notification_type","error");
	?>
    <script type="text/javascript">
     location.href = '../index.php';
	 </script>
    <?php
    exit;
}