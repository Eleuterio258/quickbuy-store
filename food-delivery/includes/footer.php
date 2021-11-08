<footer>
	<div class="container">
		<div class="col-1">
			<h3>Social Links</h3>
			<ul>
				<li><a href="<?php echo $rowS['fb_link'];?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
				<li><a href="<?php echo $rowS['tw_link'];?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
				<li><a href="<?php echo $rowS['ins_link'];?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="<?php echo $rowS['gplus_link'];?>"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		<div class="col-1">
			<h3>CONTACT INFORMATION</h3>
			<p>
				<?php echo $rowS['contact_info'];?>
			</p>
		</div>
		<div class="col-1">
			<h3>OPENING HOURS</h3>
			<p>
				<?php echo $rowS['opening_hours'];?>
			</p>
		</div>
		<div class="clear-fix"></div>
	</div>
	
</footer>
</div> <!-- End Main Container -->
<?php
$nmsg=$flash->render('notification_msg');
$ntype=$flash->render('notification_type');
$str = ""; 
if($nmsg){
	$str .= '<div class="notificaton-msg msg-'.$ntype.'" style="top:20px;">';
	//$str .= '<span class="close-not"><i class="fa fa-times" aria-hidden="true"></i></span>';
    $str .= $nmsg;
	$str .= '</div>';
}
echo $str; 
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/jquery.superslides.min.js"></script>
<script src="js/custom.js"></script>

	
</body>
</html>