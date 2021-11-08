<?php 
session_start();
include 'functions/flash.php'; 
$flash = new \FlashMessage();
if (isset($_SESSION['logged_in_type'])) {
  	$flash->add("notification_msg","You Are Already Loggedin!");
	$flash->add("notification_type","success");
	?>
	<script type="text/javascript">
	location.href = 'account.php';
	 </script>
	<?php
	exit; 
} 
include 'includes/header.php'; 
?>

	<section class="inner-page-sec login-page">
		<div class="container">
			<div class="login-page">
				<h1>Login</h1>
				<form action="functions/login-fun.php" method="post" class="login-form">
					<label>Email :</label>
					<input type="email" name="email" class="input-text" placeholder="type your email..." required>
					<br>
					<label>Password :</label>
					<input type="password" name="pwd" class="input-text" placeholder="type your password..." required>
					<br>
					<input type="submit" name="login" class="btn login-btn" value="Login">
				</form>
				<span class="create-account">Create an  Account <a href="register.php">Here</a></span>
			</div>
			
			
		</div>
		<div class="clear-fix"></div>
	</section>
<?php include 'includes/footer.php'; ?>
		