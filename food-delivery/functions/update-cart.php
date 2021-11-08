<?php 
session_start();
include 'flash.php';
$flash = new \FlashMessage();
if(isset($_POST['update_cart'])){
	$ids = $_POST['id'];
	$quantity = $_POST['quantity'];
	foreach ($ids as $k => $v) {
		if($quantity[$k]==0){
			unset($_SESSION['cart_item']["food_".$v]);
		}else{
			$_SESSION["cart_item"]["food_".$v]["quantity"] = $quantity[$k];
		}
		
	}

  	$flash->add("notification_msg","Cart Updated Successfully!");
	$flash->add("notification_type","success");
	?>
    <script type="text/javascript">
     location.href = '../cart.php';
	 </script>
    <?php
    exit;

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