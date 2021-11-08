<?php 
session_start();
include 'functions/flash.php';
$flash = new \FlashMessage();
include 'includes/session-check.php';
include 'includes/session-check-admin.php';

include 'includes/header.php';

$sql = "SELECT * FROM settings LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
	<section class="inner-page-sec">
		<div class="container">
			<h1>Website Settings</h1>
			
			<div style="overflow-x:auto;">
				<form class="category-form" action="functions/update-settings.php" method="post" enctype="multipart/form-data">
					<table class="custom-tbl">
						<tr>
							<th>
								<label>Site Currency</label>
							</th>
							<td>
								<select name="currency" class="input-text">
									<option <?php if($row['currency'] == "GBP"){?> selected <?php }?> value="GBP">GBP (£)</option>
									<option <?php if($row['currency'] == "USD"){?> selected <?php }?> value="USD">USD ($)</option>
									<option <?php if($row['currency'] == "EURO"){?> selected <?php }?> value="EURO">EURO (€)</option>
									
								</select>
							</td>
						</tr>
						<tr>
							<th>
								<label>About Title</label>
							</th>
							<td>
								<textarea name="about_title" class="input-text"><?php echo $row['about_title'];?></textarea>
								<input type="hidden" name="id" class="input-text" value="<?php echo $row['id'];?>">
							</td>
						</tr>
						<tr>
							<th>
								<label>About Detail</label>
							</th>
							<td>
								<textarea name="about_detail" class="input-text"><?php echo $row['about_detail'];?></textarea>	
							</td>
						</tr>
						<tr>
							<th>
								<label>About Image</label>
							</th>
							<td>
								<input type="file" name="image" class="input-text">
								<img src="img/<?php echo $row['about_img']?>" width="120px">
									
							</td>
						</tr>
						<tr>
							<th>
								<label>Facebook Link</label>
							</th>
							<td>
								<input type="text" name="fb_link" class="input-text" value="<?php echo $row['fb_link'];?>">
							</td>
						</tr>
						<tr>
							<th>
								<label>Twitter Link</label>
							</th>
							<td>
								<input type="text" name="tw_link" class="input-text" value="<?php echo $row['tw_link'];?>">
							</td>
						</tr>
						<tr>
							<th>
								<label>Instagram Link</label>
							</th>
							<td>
								<input type="text" name="ins_link" class="input-text" value="<?php echo $row['ins_link'];?>">
							</td>
						</tr>
						<tr>
							<th>
								<label>Google+ Link</label>
							</th>
							<td>
								<input type="text" name="gplus_link" class="input-text" value="<?php echo $row['gplus_link'];?>">
							</td>
						</tr>
						<tr>
							<th>
								<label>Contact Info</label>
							</th>
							<td>
								<textarea name="contact_info" class="input-text"><?php echo $row['contact_info'];?></textarea>	
							</td>
						</tr>
						<tr>
							<th>
								<label>Opening Hours</label>
							</th>
							<td>
								<textarea name="opening_hours" class="input-text"><?php echo $row['opening_hours'];?></textarea>	
							</td>
						</tr>
						<tr>
							<td></td>
							<td colspan="2">
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