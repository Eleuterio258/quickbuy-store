<?php 
session_start();
include 'flash.php';
$flash = new \FlashMessage();
include '../includes/config.php';
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$type = $_POST['type'];

	$sql = "UPDATE `users` SET 
	`phone` = '".$phone."', 
	`fname` = '".$fname."', 
	`lname` = '".$lname."', 
	`type` = '".$type."', 
	`address` = '".$address."' 
	WHERE `id` = ".$id;
	if ($conn->query($sql)) {
	  	$flash->add("notification_msg","User Updated  Successfully!");
		$flash->add("notification_type","success");
		?>
	    <script type="text/javascript">
	     location.href = '../users.php';
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