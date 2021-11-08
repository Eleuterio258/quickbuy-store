<?php 
session_start();
include 'functions/flash.php';
$flash = new \FlashMessage();
include 'includes/session-check.php';
include 'includes/session-check-admin.php';

include 'includes/header.php';
$sql = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($sql);
?>
	<section class="inner-page-sec">
		<div class="container">
			<h1>All Users</h1>
			<div style="overflow-x:auto;">
				<table class="custom-tbl">
					<thead>
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Address</th>
							<th>Type</th>
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
							<td><?php echo $row['fname']?></td>
							<td><?php echo $row['lname']?></td>
							<td><?php echo $row['email']?></td>
							<td><?php echo $row['phone']?></td>
							<td><?php echo $row['address']?></td>
							<td><?php echo $row['type']?></td>
							<td>
								<a href="edit-user.php?id=<?php echo $row['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a href="delete-user.php?id=<?php echo $row['id']?>" class="delete-btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</td>
						</tr>
						<?php } } else { ?>
							<tr>
								<td colspan="8">No Order Found!</td>
							</tr>
						<?php }  ?>
					</tbody>
				</table>
			</div>
			
		</div>
		<div class="clear-fix"></div>
	</section>
<?php include 'includes/footer.php'; ?>
		