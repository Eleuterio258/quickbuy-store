<?php 
session_start();
include 'flash.php';
$flash = new \FlashMessage();
include '../includes/config.php';
if(isset($_POST['update_profile'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];

	$sql = "UPDATE `users` SET 
	`phone` = '".$phone."', 
	`fname` = '".$fname."', 
	`lname` = '".$lname."', 
	`address` = '".$address."' 
	WHERE `id` = ".$_SESSION['logged_in_id'];
	if ($conn->query($sql)) {
	  	$flash->add("notification_msg","Profile Updated  Successfully!");
		$flash->add("notification_type","success");
		?>
	    <script type="text/javascript">
	     location.href = '../account.php';
		 </script>
	    <?php
	    exit;
	}
}
else if(isset($_POST['change_pass'])){
	$old_pass = $_POST['old_pass'];
	$new_pass = $_POST['new_pass'];
	$confirm_pass = $_POST['confirm_pass'];
	if($new_pass != $confirm_pass){
	  	$flash->add("notification_msg","Confirm Password Not Match!");
		$flash->add("notification_type","error");
		?>
	    <script type="text/javascript">
	     location.href = '../account.php';
		 </script>
	    <?php
	    exit;
	}
	$sql = "SELECT * FROM users WHERE `id` = ".$_SESSION['logged_in_id'];
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$verify = password_verify($old_pass, $row['password']);

	if ($verify) {
		if($new_pass == $old_pass){
		  	$flash->add("notification_msg","New Password And Old Password Cann't  be Same!");
			$flash->add("notification_type","error");
			?>
		    <script type="text/javascript">
		     location.href = '../account.php';
			 </script>
		    <?php
		    exit;
		}
		$hash = password_hash($new_pass,PASSWORD_DEFAULT);
		$sql = "UPDATE `users` SET 
		`password` = '".$hash."' 
		WHERE `id` = ".$_SESSION['logged_in_id'];
		if ($conn->query($sql)) {
		  	$flash->add("notification_msg","Password Changed Successfully!");
			$flash->add("notification_type","success");
			?>
		    <script type="text/javascript">
		     location.href = '../account.php';
			 </script>
		    <?php
		    exit;
		}
	}else{
	  	$flash->add("notification_msg","Old Password Not Match!");
		$flash->add("notification_type","error");
		?>
	    <script type="text/javascript">
	     location.href = '../account.php';
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