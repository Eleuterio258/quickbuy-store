<?php 
session_start();
include 'functions/flash.php';
$flash = new \FlashMessage();
include 'includes/session-check.php';
include 'includes/session-check-admin.php';

include 'includes/header.php';
$sql = "SELECT * FROM category";
$result = $conn->query($sql);
?>
	<section class="inner-page-sec">
		<div class="container">
			<h1>Add Food Item</h1>
			
			<div style="overflow-x:auto;">
				<form class="category-form" action="functions/food-add-fun.php" method="post" enctype="multipart/form-data">
					<table class="custom-tbl">
						<tr>
							<th>
								<label>Name</label>
							</th>
							<td>
								<input type="text" name="name" class="input-text" required>
							</td>
						</tr>
						<tr>
							<th>
								<label>Category</label>
							</th>
							<td>
								<select name="category_id" class="input-text" required>
									<option value="">Select Category</option>
									<?php if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()){ ?>
											<option  value="<?php echo $row['id']?>"><?php echo $row['title']?></option>
									<?php } } ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>
								<label>Short Description</label>
							</th>
							<td>
								<textarea name="short_desc" class="input-text" required></textarea>
							</td>
						</tr>
						<tr>
							<th>
								<label>Price</label>
							</th>
							<td>
								<input type="text" name="price" class="input-text" required>
							</td>
						</tr>
						<tr>
							<th>
								<label>Image</label>
							</th>
							<td>
								<input type="file" name="image" class="input-text" required>
							</td>
						</tr>
						<tr>
							<th>
								<label>Available</label>
							</th>
							<td>
								<select name="available" class="input-text" required>
									<option value="yes">Yes</option>
									<option value="no">No</option>
								</select>
							</td>
						</tr>

						<tr>
							<td></td>
							<td colspan="2">
								<input type="submit" name="save" class="btn login-btn" value="Save">
							</td>
						</tr>
					</table>
				</form>
				
			</div>
		</div>
		<div class="clear-fix"></div>
	</section>
<?php include 'includes/footer.php'; ?>
		