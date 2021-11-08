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
				<h1>Register</h1>
				<form action="functions/register-fun.php" method="post" class="login-form">
					<label>First Name :</label>
					<input type="text" name="fname" class="input-text" placeholder="type your First Name..." required>
					<br>
					<label>Last Name :</label>
					<input type="text" name="lname" class="input-text" placeholder="type your Last Name..." required>
					<br>
					<label>Phone :</label>
					<input type="text" name="phone" class="input-text" placeholder="type your phone..." required>
					<br>
					<label>Email :</label>
					<input type="email" name="email" class="input-text" placeholder="type your email..." required>
					<br>
					<label>Password :</label>
					<input type="password" name="pwd" class="input-text" placeholder="type your password..." required>
					<br>
					<input type="submit" name="register" class="btn login-btn" value="Signup">
				</form>
				<span class="create-account"><a href="login.php">Already</a> have an account</span>
			</div>
			
			
		</div>
		<div class="clear-fix"></div>
	</section>
<?php include 'includes/footer.php'; ?>
		