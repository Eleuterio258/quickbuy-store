<?php 
session_start();
include 'functions/flash.php';
$flash = new \FlashMessage();
include 'includes/session-check.php';
include 'includes/session-check-admin.php';

include 'includes/header.php';
?>
	<section class="inner-page-sec">
		<div class="container">
			<h1>Add Food Category</h1>
			
			<div style="overflow-x:auto;">
				<form class="category-form" action="functions/category-add-fun.php" method="post">
					<table class="custom-tbl">
						<tr>
							<th>
								<label>Category Name</label>
							</th>
							<td>
								<input type="text" name="title" class="input-text">
							</td>
						</tr>
						<tr>
							<td></td>
							<td colspan="2">
								<input type="submit" name="save" class="btn login-btn" value="Save">
							</td>
						</tr>
					</table>
				</form>
				
			</div>
		</div>
		<div class="clear-fix"></div>
	</section>
<?php include 'includes/footer.php'; ?>
		