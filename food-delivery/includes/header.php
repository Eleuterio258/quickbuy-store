<?php
include 'includes/config.php'; 
$currency_format = array('GBP'=>'£', 'USD'=>'$', 'EURO'=>'€');
$page_name  = basename($_SERVER['PHP_SELF']);
$sqlS = "SELECT * FROM settings LIMIT 1";
$resultS = $conn->query($sqlS);
$rowS = $resultS->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food Delivery</title>
	<!-- For Icon Css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Main Css -->
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<!-- Start Main Container -->
	<div class="main-container">
		<!-- Start Header -->
		<header>
			<div class="logo">
				<img src="img/logo.png" alt="">
			</div>
			<div class="nav-bar">
				<div class="nav" id="myTopnav">
				  <a href="index.php" <?php if($page_name== "index.php"){?>class="active"<?php } ?>>Home</a>
				  <a href="menu.php" <?php if($page_name== "menu.php"){?>class="active"<?php } ?>>Menu</a>
				  <?php if (isset($_SESSION['logged_in_type'])) { ?>
				  <?php if ($_SESSION['logged_in_type'] == 'admin') { ?>
				  <a href="admin-food.php" <?php if($page_name== "admin-food.php"){?>class="active"<?php } ?>>Food Menu</a>
				  <a href="admin-food-cat.php" <?php if($page_name== "admin-food-cat.php"){?>class="active"<?php } ?>>Food Category</a>
				  <a href="admin-order.php" <?php if($page_name== "admin-order.php" || $page_name== "admin-order-detail.php"){?>class="active"<?php } ?>>Orders</a>
				  <a href="users.php" <?php if($page_name== "users.php" || $page_name== "edit-user.php"){?>class="active"<?php } ?>>Users</a>
				  <a href="settings.php" <?php if($page_name== "settings.php" || $page_name== "edit-usser.php"){?>class="active"<?php } ?>>Settings</a>
				  <?php } ?>
				  <a href="account.php" <?php if($page_name== "account.php"){?>class="active"<?php } ?>>My Account</a>
				  <a href="order.php" <?php if($page_name== "order.php" || $page_name== "order-detail.php"){?>class="active"<?php } ?>>My Order</a>
				  <a href="logout.php">Logout</a>
				  <?php } else {?>
				  <a href="login.php">Login</a>
				  <?php } ?>
				  <?php if(!empty($_SESSION["cart_item"])) { ?>
				  	<a href="cart.php" class="cart-menu" <?php if($page_name== "cart.php"){?>class="active"<?php } ?>><i class="fa fa-shopping-cart" aria-hidden="true"></i> (<?php echo count($_SESSION["cart_item"]);?>)</a>
				  <?php } else  { ?>
				  	<a href="cart.php" class="cart-menu" <?php if($page_name== "cart.php"){?>class="active"<?php } ?>><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
				  <?php }?>
				  <a href="javascript:void(0);" class="icon" onclick="responsiveMenu()">
				    <i class="fa fa-bars"></i>
				  </a>
				</div>
			</div>
			<div class="clear-fix"></div>
		</header>
		<!-- End Header -->