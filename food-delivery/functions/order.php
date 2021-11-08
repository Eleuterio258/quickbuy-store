<?php 
session_start();
include 'flash.php';
$flash = new \FlashMessage();
include '../includes/config.php';
if(isset($_POST['place_order'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$payment_option = $_POST['payment_option'];

	$sql = "UPDATE `users` SET 
	`phone` = '".$phone."', 
	`fname` = '".$fname."', 
	`lname` = '".$lname."', 
	`address` = '".$address."' 
	WHERE `id` = ".$_SESSION['logged_in_id'];
	if ($conn->query($sql)) {
		$order_total_amount = 0; 
		$order_total_quantity = 0; 
		$sqlO = "INSERT INTO `orders` (`id`, `user_id`, `delivery_address`, `contact_no`, `full_name`, `payment_option`, `order_total_amount`, `order_total_quantity`) VALUES (NULL, '".$_SESSION['logged_in_id']."', '".$address."', '".$phone."', '".$fname." ".$lname."', '".$payment_option."', '".$order_total_amount."', '".$order_total_quantity."')";
		if ($conn->query($sqlO) === TRUE) {
		  $order_id = $conn->insert_id;
		  foreach($_SESSION["cart_item"] as $k => $v) {
		  	$order_total_quantity++;
		  	$item_total = $v['Price']*$v['quantity'];
		  	$order_total_amount += $item_total;
		  	$sqlOI = "INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `item_quantity`, `item_price`) VALUES (NULL, '".$order_id."', '".$v['id']."', '".$v['quantity']."', '".$v['Price']."')";
		  	$conn->query($sqlOI);
		  }
		  $sqlOU  = "UPDATE `orders` SET `order_total_amount` = '".$order_total_amount."', `order_total_quantity` = '".$order_total_quantity."' WHERE `id` = ".$order_id;
		  if($conn->query($sqlOU)){
		  		unset($_SESSION['cart_item']);
		  	  	$flash->add("notification_msg","Order Placed Successfully!");
		  		$flash->add("notification_type","success");
		  		?>
		  	    <script type="text/javascript">
		  	     location.href = '../order.php';
		  		 </script>
		  	    <?php
		  	    exit;
		  }

		} else {
		  	$flash->add("notification_msg","Error: " . $sql . "<br>" . $conn->error);
			$flash->add("notification_type","error");
			?>
		    <script type="text/javascript">
		     location.href = '../index.php';
			 </script>
		    <?php
		    exit;
		}
		
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