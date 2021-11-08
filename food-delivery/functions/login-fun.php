<?php 
session_start();
include 'flash.php';
include '../includes/config.php';
$flash = new \FlashMessage();
if(isset($_POST['login'])){
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$sql = "SELECT * FROM users WHERE email  = '$email'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		// Verify the hash against the password entered
		$verify = password_verify($pwd, $row['password']);
		// Print the result depending if they match
		  if ($verify) {
		  	 $_SESSION['logged_in_type'] = $row['type'];
		  	 $_SESSION['logged_in_id'] = $row['id'];
		  	 $_SESSION['logged_in_fullname'] = $row['fname']." ".$row['lname'];
		  	 $_SESSION['logged_in_email'] = $row['email'];
		  	 $flash->add("notification_msg","Logged in Successfully");
		     $flash->add("notification_type","success");
		     if(isset($_SESSION['cart_pending'])){
		     	unset($_SESSION['cart_pending']);
		     	?>
		     	    <script type="text/javascript">
		     	     location.href = '../checkout.php';
		     		 </script>
		     	<?php
		     }
		     ?>
		     <script type="text/javascript">
		      location.href = '../account.php';
		 	 </script>
		     <?php
		     exit; 
		  } else {
		  	$flash->add("notification_msg","Incorrect Password!");
			$flash->add("notification_type","error");
		    ?>
		    <script type="text/javascript">
		     location.href = '../login.php';
			 </script>
		    <?php
		    exit; 
		  }
	}else{
	  	$flash->add("notification_msg","Incorrect Email!");
		$flash->add("notification_type","error");
		?>
	    <script type="text/javascript">
	     location.href = '../login.php';
		 </script>
	    <?php
	    exit;
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


// // The plain text password to be hashed
//  $plaintext_password = "admin";
 
//  // The hash of the password that
//  // can be stored in the database
//  $hash = password_hash($plaintext_password, 
//          PASSWORD_DEFAULT);
 
//  // Print the generated hash
//  echo "Generated hash: <br>".$hash;
?>