<?php 
session_start();
$result_arr  = array();
unset($_SESSION['cart_item']);
?>
<script type="text/javascript">
location.href = 'menu.php';
 </script>
<?php
exit; 
?>