<?php 
session_start();
include 'flash.php';
$flash = new \FlashMessage();
include '../includes/config.php';
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$about_title = $_POST['about_title'];
	$about_detail = $_POST['about_detail'];
	$fb_link = $_POST['fb_link'];
	$tw_link = $_POST['tw_link'];
	$ins_link = $_POST['ins_link'];
	$gplus_link = $_POST['gplus_link'];
	$contact_info = $_POST['contact_info'];
	$opening_hours = $_POST['opening_hours'];
	$currency = $_POST['currency'];
	$file = $_FILES["image"];
	if($file["name"]!==""){
	  //Image Upload Code
	  $max_size = 5000000;
	  $allowed = "jpg,png,jpeg";
	  $target_dir = "../img/";
	  

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
	         location.href = '../settings.php';
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
	         location.href = '../settings.php';
	       </script>
	        <?php
	        exit;
	    }
	  }
	  // Saving Image
	  if (move_uploaded_file($file["tmp_name"], $target_dir.$target_file)) {
	    $image = $target_file;
	    $sql = "UPDATE `settings` SET 
	    `about_title` = '".$about_title."', 
	    `about_detail` = '".$about_detail."', 
	    `currency` = '".$currency."', 
	    `about_img` = '".$image."',
	    `fb_link` = '".$fb_link."', 
	    `tw_link` = '".$tw_link."', 
	    `ins_link` = '".$ins_link."', 
	    `gplus_link` = '".$gplus_link."', 
	    `contact_info` = '".$contact_info."', 
	    `opening_hours` = '".$opening_hours."'
	    WHERE `id` = ".$id;
	  } 
	  else {
	      $flash->add("notification_msg","Sorry, there was an error uploading your file.");
	      $flash->add("notification_type","error");
	      ?>
	      <script type="text/javascript">
	       location.href = '../settings.php';
	     </script>
	      <?php
	      exit;
	  }

	}else{
	  $sql = "UPDATE `settings` SET 
		`about_title` = '".$about_title."', 
		`about_detail` = '".$about_detail."', 
		`currency` = '".$currency."', 
		`fb_link` = '".$fb_link."', 
		`tw_link` = '".$tw_link."', 
		`ins_link` = '".$ins_link."', 
		`gplus_link` = '".$gplus_link."', 
		`contact_info` = '".$contact_info."', 
		`opening_hours` = '".$opening_hours."'
		WHERE `id` = ".$id;
	}

	
	if ($conn->query($sql)) {
	  	$flash->add("notification_msg","Settings Updated  Successfully!");
		$flash->add("notification_type","success");
		?>
	    <script type="text/javascript">
	     location.href = '../settings.php';
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