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
     location.href = 'admin-food.php';
	 </script>
    <?php
    exit;
}
$sql = "SELECT * FROM category";
$result = $conn->query($sql);

$sqlF = "SELECT * FROM foods WHERE id = '".$_GET['id']."'";
$resultF = $conn->query($sqlF);
$rowF = $resultF->fetch_assoc();
?>
	<section class="inner-page-sec">
		<div class="container">
			<h1>Add Food Item</h1>
			
			<div style="overflow-x:auto;">
				<form class="category-form" action="functions/food-edit-fun.php" method="post" enctype="multipart/form-data">
					<table class="custom-tbl">
						<tr>
							<th>
								<label>Name</label>
							</th>
							<td>
								<input type="text" name="name" class="input-text" value="<?php echo $rowF['name'];?>" required>
								<input type="hidden" name="id" class="input-text" value="<?php echo $rowF['id'];?>">
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
											<option <?php if($rowF['category_id'] == $row['id']){?> selected <?php }?> value="<?php echo $row['id']?>"><?php echo $row['title']?></option>
									<?php } } ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>
								<label>Short Description</label>
							</th>
							<td>
								<textarea name="short_desc" class="input-text" required><?php echo $rowF['short_desc'];?></textarea>
							</td>
						</tr>
						<tr>
							<th>
								<label>Price</label>
							</th>
							<td>
								<input type="text" name="price" class="input-text"  value="<?php echo $rowF['price'];?>" required>
							</td>
						</tr>
						<tr>
							<th>
								<label>Image</label>
							</th>
							<td>
								<input type="file" name="image" class="input-text">
								<img src="img/foods/<?php echo $rowF['image']?>" width="120px">
							</td>
						</tr>
						<tr>
							<th>
								<label>Available</label>
							</th>
							<td>
								<select name="available" class="input-text" required>
									<option <?php if($rowF['available'] == "yes"){?> selected <?php }?> value="yes">Yes</option>
									<option <?php if($rowF['available'] == "no"){?> selected <?php }?> value="no">No</option>
								</select>
							</td>
						</tr>

						<tr>
							<td></td>
							<td colspan="2">
								<a href="admin-food.php" class="btn">Back</a>
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
		