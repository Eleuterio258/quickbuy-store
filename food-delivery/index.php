<?php 
session_start();
include 'functions/flash.php'; 
$flash = new \FlashMessage(); 
include 'includes/header.php'; ?>

		<!-- Start slides -->
		<div id="slides" class="cover-slides">
			<ul class="slides-container">
				<li class="text-left">
					<img src="img/slider-01.jpg" alt="">
					<div class="slide-container">
						<h1 class="slider-h1"><strong>Welcome To <br> QuickbuyStore Restaurant</strong></h1>
						<p class="slider-p">When you crave for midnight delicacy, just order on our App. Get Your Food From Home<br>
						Stay Home Be Safe.Speedy and quicker delivery with us.</p>
						<p>
							<a class="btn btn-outline-new-white" href="menu.php">Order</a>
						</p>
					</div>
				</li>
				<li class="text-left">
					<img src="img/slider-02.jpg" alt="">
					<div class="slide-container">
						<h1 class="slider-h1"><strong>Welcome To <br> Home Delivery Restaurant</strong></h1>
						<p class="slider-p">When you crave for midnight delicacy, just order on our App. Get Your Food From Home<br>
						Stay Home Be Safe.Speedy and quicker delivery with us.</p>
						<p>
							<a class="btn btn-outline-new-white" href="menu.php">Order</a>
						</p>
					</div>
				</li>
				<li class="text-left">
					<img src="img/slider-03.jpg" alt="">
					<div class="slide-container">
						<h1 class="slider-h1"><strong>Welcome To <br> Home Delivery Restaurant</strong></h1>
						<p class="slider-p">When you crave for midnight delicacy, just order on our App. Get Your Food From Home<br>
						Stay Home Be Safe.Speedy and quicker delivery with us.</p>
						<p>
							<a class="btn btn-outline-new-white" href="menu.php">Order</a>
						</p>
					</div>
				</li>
			</ul>
			<div class="slides-navigation">
				<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
				<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
			</div>
		</div>
		<!-- End slides -->
		
		<section class="about-section">
			<div class="container">
				<div class="left-box">
					<h2><?php echo $rowS['about_title'];?></h2>
					<p><?php echo $rowS['about_detail'];?></p>
				</div>
				<div class="right-box">
					<img src="img/<?php echo $rowS['about_img'];?>" alt="">
				</div>
			</div>
			<div class="clear-fix"></div>
		</section>
<?php include 'includes/footer.php'; ?>
		