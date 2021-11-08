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
$sql = "SELECT * FROM category WHERE id = '".$_GET['id']."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
	<section class="inner-page-sec">
		<div class="container">
			<h1>Edit Food Category</h1>
			
			<div style="overflow-x:auto;">
				<form class="category-form" action="functions/category-edit-fun.php" method="post">
					<table class="custom-tbl">
						<tr>
							<th>
								<label>Category Name</label>
							</th>
							<td>
								<input type="text" name="title" class="input-text" value="<?php echo $row['title'];?>">
								<input type="hidden" name="id" class="input-text" value="<?php echo $row['id'];?>">
							</td>
						</tr>
						<tr>
							<td></td>
							<td colspan="2">
								<a href="admin-food-cat.php" class="btn">Back</a>
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