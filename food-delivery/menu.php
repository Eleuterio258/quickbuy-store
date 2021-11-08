<?php 
session_start();
include 'functions/flash.php'; 
$flash = new \FlashMessage(); 
include 'includes/header.php'; 
$sql = "SELECT * FROM category";
$result = $conn->query($sql);
$sqlF = "SELECT foods.*,category.title FROM foods LEFT JOIN category on category.id =  foods.category_id WHERE foods.available = 'yes'";
$resultF = $conn->query($sqlF);
?>
	<section class="inner-page-sec">
		<div class="container">
			<h1>Food Menu</h1>
			<div class="side-bar">
				<ul class="category-list">
					<li class="active"><a href="#" data-cate="all">All</a></li>
					<?php 
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()){
					?>
					<li><a href="#" data-cate="<?php echo $row['id']?>"><?php echo $row['title']?></a></li>
					<?php } }  ?>
				</ul>
			</div>
			<div class="menu-bar">
				<ul class="menu-list">
					<?php 
					if ($resultF->num_rows > 0) {
						while($rowF = $resultF->fetch_assoc()){
					?>
					<li data-cate="<?php echo $rowF['category_id']?>">
						<img src="img/foods/<?php echo $rowF['image']?>">
						<div class="menu-detail">
							<h4><?php echo $rowF['name']?></h4>
							<div>
								<div class="category-n"><?php echo $rowF['title']?></div>
								<div class="food-price"><?php echo $rowF['price']?><?php echo $currency_format[$rowS['currency']];?></div>
								<div class="clear-fix"></div>
							</div>
							
						</div>
						<div  class="overlay-menu">
							<a href="#" class="add-to-cart" 
							data-food-id="<?php echo $rowF['id']?>" data-food-qty="1"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
							<p><?php echo $rowF['short_desc']?></p>
						</div>
					</li>
					<?php } } else { ?>
						<li data-cate="none">
							No Food Availale.
						</li>
					<?php }  ?>
					

					
					
				</ul>
			</div>
		</div>
		<div class="clear-fix"></div>
	</section>
<?php include 'includes/footer.php'; ?>
		