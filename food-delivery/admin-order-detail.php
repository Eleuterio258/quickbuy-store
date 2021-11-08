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
$sql = "SELECT oi.id,f.name,f.short_desc,f.image,f.category_id,oi.item_quantity,oi.item_price,c.title FROM order_items AS oi LEFT JOIN foods AS f on f.id = oi.item_id LEFT JOIN category AS c ON  c.id = f.category_id WHERE  oi.order_id = '".$_GET['id']."' ORDER BY oi.id DESC";

$result = $conn->query($sql);

$sqlL = "SELECT status FROM orders WHERE id = '".$_GET['id']."'";
$resultL = $conn->query($sqlL);
$rowL = $resultL->fetch_assoc()
?>
	<section class="inner-page-sec">
		<div class="container">
			<h1>Order Detail</h1>
			<a href="admin-order.php" class="btn add-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
			<div style="overflow-x:auto;">
				<table class="custom-tbl">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Category</th>
							<th>Short Description</th>
							<th>Image</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total Price</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()){
						?>
						<tr>
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['title'];?></td>
							<td><?php echo $row['short_desc'];?></td>
							<td>
								<img src="img/foods/<?php echo $row['image']?>" width="40px">
							</td>
							<td><?php echo $row['item_price'];?><?php echo $currency_format[$rowS['currency']];?></td>
							<td><?php echo $row['item_quantity'];?></td>
							<td><?php echo $row['item_price']*$row['item_quantity'];?><?php echo $currency_format[$rowS['currency']];?></td>
							
						</tr>
						<?php } } else { ?>
							<tr>
								<td colspan="8">No Order Found!</td>
							</tr>
						<?php }  ?>
					</tbody>
				</table>
				<h1>Change Status</h1>
				<form action="functions/update-order.php" method="post" >
					<table class="custom-tbl form-table">
						<tr>
							<th>
								<select name="order_status" class="input-text">
									<option <?php if($rowL['status'] == "Pending"){?> selected <?php }?> value="Pending">Pending</option>
									<option <?php if($rowL['status'] == "Processing"){?> selected <?php }?> value="Processing">Processing</option>
									<option <?php if($rowL['status'] == "Picked"){?> selected <?php }?> value="Picked">Picked</option>
									<option <?php if($rowL['status'] == "Shipped"){?> selected <?php }?> value="Shipped">Shipped</option>
									<option <?php if($rowL['status'] == "Delivered"){?> selected <?php }?> value="Delivered">Delivered</option>
									<option <?php if($rowL['status'] == "Cancelled"){?> selected <?php }?> value="Cancelled">Cancelled</option>
								</select>
								<input type="hidden" name="order_id"  value="<?php echo $_GET['id'];?>">
							</th>
							<td>
								<input type="submit" value="Change Status" name="update_order" class="btn add-btn">
							</td>
						</tr>
					</table>
				</form>
			</div>
			
		</div>
		<div class="clear-fix"></div>
	</section>
<?php include 'includes/footer.php'; ?>
		