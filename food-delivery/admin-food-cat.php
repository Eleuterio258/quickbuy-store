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
			<h1>Food Category List</h1>
			<a href="add-category.php" class="add-btn">Add Category</a>
			<div style="overflow-x:auto;">
				<table class="custom-tbl">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()){
						?>
						<tr>
							<td><?php echo $row['id']?></td>
							<td><?php echo $row['title']?></td>
							<td>
								<a href="edit-cat.php?id=<?php echo $row['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a href="delete-cat.php?id=<?php echo $row['id']?>" class="delete-btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</td>
						</tr>
						<?php } } else { ?>
							<tr>
								<td colspan="3">No Category Found!</td>
							</tr>
						<?php }  ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="clear-fix"></div>
	</section>
<?php include 'includes/footer.php'; ?>
		