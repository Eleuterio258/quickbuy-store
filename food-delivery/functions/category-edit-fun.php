<?php 
session_start();
include 'flash.php';
include '../includes/config.php';
$flash = new \FlashMessage();
if(isset($_POST['update'])){
	$title = $_POST['title'];
  $id = $_POST['id'];
  $sql = "UPDATE `category` SET `title` = '".$title."' WHERE `id` = '".$id."'";
	if ($conn->query($sql)) {
      	$flash->add("notification_msg","Category Updated successfully");
  	  	$flash->add("notification_type","success");
  	  	?>
        <script type="text/javascript">
         location.href = '../admin-food-cat.php';
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
}else{
  	$flash->add("notification_msg","You Are Not Allowed!");
	$flash->add("notification_type","error");
	?>
    <script type="text/javascript">
     location.href = '../index.php';
	 </script>
    <?php
    exit;
}
?>