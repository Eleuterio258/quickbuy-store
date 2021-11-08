<?php 
session_start();
include 'flash.php';
include '../includes/config.php';
$flash = new \FlashMessage();
if(isset($_POST['save'])){
	$name = $_POST['name'];
	$category_id = $_POST['category_id'];
	$short_desc = $_POST['short_desc'];
	$price = $_POST['price'];
	$available = $_POST['available'];
	$file = $_FILES["image"];

	//Image Upload Code
	$max_size = 5000000;
	$allowed = "jpg,png,jpeg";
	$target_dir = "../img/foods/";
	

	$target_file =  basename($file["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// get file's name 
	$filename = pathinfo($target_file, PATHINFO_FILENAME); 

	// Check if file already exists
	$i = 0;
	while (file_exists($target_dir.$target_file))
	{ 
		$target_file = $filename . '_' . $i . '.' . $imageFileType;
	    $i++;
	}
	//echo $target_file;

	// Check file size
	if(isset($max_size)){
		if ($file["size"] > $max_size) {
	    	$flash->add("notification_msg","Sorry, your file is too large.");
		  	$flash->add("notification_type","error");
		  	?>
	      <script type="text/javascript">
	       location.href = '../add-food.php';
	  	 </script>
	      <?php
	      exit;
		}
	}
	// Allow certain file formats
	if(!isset($allowed) || $allowed == "*"){

	}else{
		$allowed2 = explode(",", $allowed);
		if (!in_array($imageFileType, $allowed2)) {
	    	$flash->add("notification_msg","Sorry, only JPG, JPEG, PNG files are allowed.");
		  	$flash->add("notification_type","error");
		  	?>
	      <script type="text/javascript">
	       location.href = '../add-food.php';
	  	 </script>
	      <?php
	      exit;
		}
	}
	// Saving Image
	if (move_uploaded_file($file["tmp_name"], $target_dir.$target_file)) {
		$image = $target_file;
		$sql = "INSERT INTO `foods` (`id`, `name`, `category_id`, `short_desc`, `image`, `price`, `available`) VALUES (NULL, '".$name."', '".$category_id."', '".$short_desc."', '".$image."', '".$price."', '".$available."')";
		if ($conn->query($sql) === TRUE) {
	      	$flash->add("notification_msg","New Food Item added successfully");
	  	  	$flash->add("notification_type","success");
	  	  	?>
	        <script type="text/javascript">
	         location.href = '../admin-food.php';
	    	 </script>
	        <?php
	        exit;
		} else {
	    	$flash->add("notification_msg","Error: " . $sql . "<br>" . $conn->error);
		  	$flash->add("notification_type","error");
		  	?>
	      <script type="text/javascript">
	       location.href = '../add-food.php';
	  	 </script>
	      <?php
	      exit;
		}
	    
	} else {
    	$flash->add("notification_msg","Sorry, there was an error uploading your file.");
	  	$flash->add("notification_type","error");
	  	?>
      <script type="text/javascript">
       location.href = '../add-food.php';
  	 </script>
      <?php
      exit;
	}
	

	exit;
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