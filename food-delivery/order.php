<?php 
session_start();
include 'functions/flash.php';
$flash = new \FlashMessage();
include 'includes/session-check.php';

include 'includes/header.php';

$sql = "SELECT * FROM orders WHERE user_id = '".$_SESSION['logged_in_id']."' ORDER BY id DESC";
$result = $conn->query($sql);
?>
	<section class="inner-page-sec">
		<div class="container">
			<h1>My Orders</h1>
			<div style="overflow-x:auto;">
				<table class="custom-tbl">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Delivery Addess</th>
							<th>Contact No</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Ordered</th>
							<th>Status Updated</th>
							<th>Status</th>
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
							<td><?php echo $row['full_name']?></td>
							<td><?php echo $row['delivery_address']?></td>
							<td><?php echo $row['contact_no']?></td>
							<td><?php echo $row['order_total_amount']?><?php echo $currency_format[$rowS['currency']];?></td>
							<td><?php echo $row['order_total_quantity']?></td>
							<td><?php 
								$created = strtotime( $row['created'] );
								echo date('d F, Y h:i:s a', $created);
								?></td>
							<td><?php 
								$updated = strtotime( $row['updated'] );
								echo date('d F, Y h:i:s a', $updated);
								?></td>
							<td><?php echo $row['status']?></td>
							<td>
								<a href="order-detail.php?id=<?php echo $row['id']?>" class="view-icon"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
							</td>
						</tr>
						<?php } } else { ?>
							<tr>
								<td colspan="10">No Order Found!</td>
							</tr>
						<?php }  ?>
					</tbody>
				</table>
			</div>
			
		</div>
		<div class="clear-fix"></div>
	</section>
<?php include 'includes/footer.php'; ?>
		