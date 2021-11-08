<?php 
session_start();
include 'functions/flash.php';
$flash = new \FlashMessage();
if (!isset($_SESSION['logged_in_type'])) {
	  	$flash->add("notification_msg","Please Login/Regiester For Checkout!");
		$flash->add("notification_type","error");
		$_SESSION['cart_pending'] =  true;
	?>
	<script type="text/javascript">
	location.href = 'login.php';
	 </script>
	<?php
	exit; 
}
if(empty($_SESSION["cart_item"])) {
	?>
	<script type="text/javascript">
	location.href = 'menu.php';
	 </script>
	<?php
	exit; 

}

include 'includes/header.php';
$sql = "SELECT * FROM users WHERE id = '".$_SESSION['logged_in_id']."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
	<section class="inner-page-sec">
		<div class="container">
			<h1>Checkout</h1>
			<div style="overflow-x:auto;">
				<form action="functions/order.php" method="post" >
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
					</table>
					<br>

					<table class="custom-tbl">
						<thead>
							<tr>
								<th>Sl No.</th>
								<th>Item</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if(!empty($_SESSION["cart_item"])) {
								$i=1;
								$total = 0; 
								foreach($_SESSION["cart_item"] as $k => $v) {
							?>
							<tr>
								<td><?php echo $i++?></td>
								<td>
									<?php echo $v['Title']?><br>
									<img src="img/foods/<?php echo $v['Img']?>" width="40px">	
									</td>
								<td>
									<?php echo $v['quantity']?>
								</td>
								<td><?php echo $v['Price'];?><?php echo $currency_format[$rowS['currency']];?></td>

								<td>
									<?php 
									$item_total = $v['Price']*$v['quantity'];
									echo $item_total.$currency_format[$rowS['currency']];
									$total += $item_total;
									?>
								</td>
							</tr>
							<?php $i++;} } else { ?>
								<tr>
									<td colspan="5">No Cart Item Found!</td>
								</tr>
							<?php }  ?>
							<?php if(!empty($_SESSION["cart_item"])) { ?>
								<tr>
									<th colspan="4" style="text-align: right;">Total</th>
									<td><?php echo $total.$currency_format[$rowS['currency']];?>
									
								</tr>
								

							<?php } ?>
						</tbody>
					</table>
					<br>
					<h3>Payment Option</h3>
					<input type="radio" name="payment_option" value="COD"  checked>Cash on Delivery
					<br>
					<br>
					<input type="submit" value="Place Order" name="place_order" class="btn add-btn">
				</form>
				<br>
			</div>
		</div>
		<div class="clear-fix"></div>
	</section>
<?php include 'includes/footer.php'; ?>