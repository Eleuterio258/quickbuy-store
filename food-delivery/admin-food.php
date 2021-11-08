<?php 
session_start();
include 'functions/flash.php';
$flash = new \FlashMessage();
include 'includes/session-check.php';
include 'includes/session-check-admin.php';

include 'includes/header.php';
$sql = "SELECT foods.*,category.title FROM foods LEFT JOIN category on category.id =  foods.category_id";
$result = $conn->query($sql);
?>
	<section class="inner-page-sec">
		<div class="container">
			<h1>Food Items List</h1>
			<a href="add-food.php" class="add-btn">Add Food Item</a>
			<div style="overflow-x:auto;">
				<table class="custom-tbl">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Category</th>
							<th>Short Desc</th>
							<th>Price</th>
							<th>Available</th>
							<th>Image</th>
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
							<td><?php echo $row['name']?></td>
							<td><?php echo $row['title']?></td>
							<td><?php echo $row['short_desc']?></td>
							<td><?php echo $row['price']?><?php echo $currency_format[$rowS['currency']];?></td>
							<td><?php echo $row['available']?></td>
							<td><img src="img/foods/<?php echo $row['image']?>" width="40px"></td>
							<td>
								<a href="edit-food.php?id=<?php echo $row['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a href="delete-food.php?id=<?php echo $row['id']?>" class="delete-btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</td>
						</tr>
						<?php } } else { ?>
							<tr>
								<td colspan="8">No Category Found!</td>
							</tr>
						<?php }  ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="clear-fix"></div>
	</section>
<?php include 'includes/footer.php'; ?>
		