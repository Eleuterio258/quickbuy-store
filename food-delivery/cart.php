<?php 
session_start();
include 'functions/flash.php';
$flash = new \FlashMessage();

include 'includes/header.php';
?>
	<section class="inner-page-sec">
		<div class="container">
			<h1>Cart</h1>
			<div style="overflow-x:auto;">
				<form action="functions/update-cart.php" method="post" >
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
									<input type="hidden" name="id[]" value="<?php echo $v['id']?>">
									<input type="number" name="quantity[]" value="<?php echo $v['quantity']?>">
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
									<td colspan="5">No Cart Item Found! <a href="menu.php" class="add-btn">Find Food Item</a></td>
								</tr>
							<?php }  ?>
							<?php if(!empty($_SESSION["cart_item"])) { ?>
								<tr>
									<th colspan="4" style="text-align: right;">Total</th>
									<td><?php echo $total.$currency_format[$rowS['currency']];?>
									
								</tr>
								<tr>
									<td colspan="3"></td>
									<td colspan="2">
										<a href="clear-cart.php" class="btn">Clear Cart</a>
										<input type="submit" name="update_cart" class="btn login-btn" value="Update Cart">

									</td>
								</tr>

							<?php } ?>
						</tbody>
					</table>
				</form>
				<br>
				<a href="checkout.php" class="btn add-btn">Checkout</a>
			</div>
		</div>
		<div class="clear-fix"></div>
	</section>
<?php include 'includes/footer.php'; ?>