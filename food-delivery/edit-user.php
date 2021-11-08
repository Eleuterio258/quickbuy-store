<?php 
session_start();
include 'functions/flash.php';
$flash = new \FlashMessage();
include 'includes/session-check.php';
include 'includes/session-check-admin.php';

include 'includes/header.php';
if(!isset($_GET['id'])){
  	$flash->add("notification_msg","You Are Not Allowed!");
	$flash->add("notification_type","error");
	?>
    <script type="text/javascript">
     location.href = 'index.php';
	 </script>
    <?php
    exit;
}
$sql = "SELECT * FROM users WHERE id = '".$_GET['id']."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
	<section class="inner-page-sec">
		<div class="container">
			<h1>Edit User</h1>
			
			<div style="overflow-x:auto;">
				<form class="category-form" action="functions/update-user.php" method="post">
					<table class="custom-tbl">
						<tr>
							<th>
								<label>First Name</label>
							</th>
							<td>
								<input type="text" name="fname" class="input-text" value="<?php echo $row['fname'];?>">
								<input type="hidden" name="id" class="input-text" value="<?php echo $row['id'];?>">
							</td>
						</tr>
						<tr>
							<th>
								<label>Last Name</label>
							</th>
							<td>
								<input type="text" name="lname" class="input-text" value="<?php echo $row['lname'];?>">
							</td>
						</tr>
						<tr>
							<th>
								<label>Email</label>
							</th>
							<td>
								<input type="email" name="email" class="input-text" value="<?php echo $row['email'];?>" disabled>
							</td>
						</tr>
						<tr>
							<th>
								<label>Phone</label>
							</th>
							<td>
								<input type="text" name="phone" class="input-text" value="<?php echo $row['phone'];?>">
							</td>
						</tr>
						<tr>
							<th>
								<label>Address</label>
							</th>
							<td>
								<textarea name="address" class="input-text"><?php echo $row['address'];?></textarea>
							</td>
						</tr>
						<tr>
							<th>
								<label>Type</label>
							</th>
							<td>
								<select name="type" class="input-text">
									<option <?php if($row['type'] == "user"){?> selected <?php }?> value="user">User</option>
									<option <?php if($row['type'] == "admin"){?> selected <?php }?> value="admin">Admin</option>
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td colspan="2">
								<a href="users.php" class="btn">Back</a>
								<input type="submit" name="update" class="btn login-btn" value="Update">
							</td>
						</tr>
					</table>
				</form>
				
			</div>
		</div>
		<div class="clear-fix"></div>
	</section>
<?php include 'includes/footer.php'; ?>