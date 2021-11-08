<?php 
if (!isset($_SESSION['logged_in_type'])) {
	  	$flash->add("notification_msg","You Are not Loggedin!");
		$flash->add("notification_type","error");
	?>
	<script type="text/javascript">
	location.href = 'login.php';
	 </script>
	<?php
	exit; 
}
?>