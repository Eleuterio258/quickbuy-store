<?php 
session_start();
include 'functions/flash.php';
$flash = new \FlashMessage();
include 'includes/session-check.php';
include 'includes/session-check-admin.php';

include 'includes/header.php';
if(isset($_GET['id'])){
	$sql = "DELETE FROM `foods` WHERE `id` = ".$_GET['id'];
	$result = $conn->query($sql);
  	$flash->add("notification_msg","Food item Deleted Successfully!");
	$flash->add("notification_type","success");
	?>
    <script type="text/javascript">
     location.href = 'admin-food.php';
	 </script>
    <?php
    exit;	
}else{
  	$flash->add("notification_msg","You Are Not Allowed!");
	$flash->add("notification_type","error");
	?>
    <script type="text/javascript">
     location.href = 'index.php';
	 </script>
    <?php
    exit;
}

?>
	
<?php include 'includes/footer.php'; ?>
		