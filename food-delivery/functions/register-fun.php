<?php 
session_start();
include 'flash.php';
include '../includes/config.php';
$flash = new \FlashMessage();
if(isset($_POST['register'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$password = password_hash($pwd,PASSWORD_DEFAULT);
	$sql2 = "SELECT * FROM users WHERE email  = '$email'";
	$result2 = $conn->query($sql2);

	if ($result2->num_rows > 0) {
	    	$flash->add("notification_msg","This Email Already Used.");
		  	$flash->add("notification_type","error");
		  	?>
	      <script type="text/javascript">
	       location.href = '../register.php';
	  	 </script>
	      <?php
	      exit;
	}else{
		$sql = "INSERT INTO `users` (`id`, `email`, `phone`, `password`, `fname`, `lname`, `address`, `type`) VALUES (NULL, '".$email."', '".$phone."', '".$password."', '".$fname."', '".$lname."', '', 'user');";
		if ($conn->query($sql) === TRUE) {
	      	$flash->add("notification_msg","Your Account created successfully.Please Login To Continue.");
	  	  	$flash->add("notification_type","success");
	  	  	?>
	        <script type="text/javascript">
	         location.href = '../login.php';
	    	 </script>
	        <?php
	        exit;
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
}else{
  	$flash->add("notification_msg","You Are Not Allowed!");
	$flash->add("notification_type","error");
	?>
    <script type="text/javascript">
     location.href = '../login.php';
	 </script>
    <?php
    exit;
}