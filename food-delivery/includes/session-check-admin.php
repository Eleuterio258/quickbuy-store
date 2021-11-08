<?php 
if ($_SESSION['logged_in_type'] != 'admin') {
	  	$flash->add("notification_msg","You Are not admin!");
		$flash->add("notification_type","error");
	?>
	<script type="text/javascript">
	location.href = 'account.php';
	 </script>
	<?php
	exit; 
}
?>