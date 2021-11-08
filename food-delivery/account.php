<?php 
session_start();
include 'functions/flash.php';
$flash = new \FlashMessage();
include 'includes/session-check.php';

include 'includes/header.php';
$sql = "SELECT * FROM users WHERE id = '".$_SESSION['logged_in_id']."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
	<section class="inner-page-sec">
		<div class="container">
			<h1>My Account</h1>
			<div style="overflow-x:auto;">
				<form action="functions/update-profile.php" method="post" >
					<table class="custom-tbl form-table">
						<tr>
							<th>First Name</th>
							<td><input type="text" name="fname" class="input-text" value="<?php echo $row['fname'];?>" required></td>
						</tr>
						<tr>
							<th>Last Name</th>
							<td><input type="text" name="lname" class="input-text" value="<?php echo $row['lname'];?>" required></td>
						</tr>
						<tr>
							<th>Email</th>
							<td><input type="readonly" name="email" class="input-text" value="<?php echo $row['email'];?>" disabled></td>
						</tr>
						<tr>
							<th>Phone</th>
							<td><input type="text" name="phone" class="input-text" value="<?php echo $row['phone'];?>" required></td>
						</tr>
						<tr>
							<th>Address</th>
							<td>
								<textarea name="address" class="input-text" required><?php echo $row['address'];?></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" value="Update Profile" name="update_profile" class="btn add-btn">
							</td>
						</tr>
					</table>
				</form>
				<h1>Change Password</h1>
				<form action="functions/update-profile.php" method="post" >
					<table class="custom-tbl form-table">
						<tr>
							<th>Old Password</th>
							<td><input type="password" name="old_pass" class="input-text" value="" required></td>
						</tr>
						<tr>
							<th>New Password</th>
							<td><input type="password" name="new_pass" class="input-text" value="" required></td>
						</tr>
						<tr>
							<th>Confirm Password</th>
							<td><input type="password" name="confirm_pass" class="input-text" value="" required></td>
						</tr>
						
						<tr>
							<td></td>
							<td>
								<input type="submit" value="Change Password" name="change_pass" class="btn add-btn">
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div class="clear-fix"></div>
	</section>
	<style type="text/css">
		.custom-tbl th{width: 200px;}
	</style>
<?php include 'includes/footer.php'; ?>
		