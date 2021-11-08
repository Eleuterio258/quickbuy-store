<?php
session_start(); 
include 'includes/session-check.php';
unset($_SESSION['logged_in_type']);
unset($_SESSION['logged_in_id']);
unset($_SESSION['logged_in_fullname']);
unset($_SESSION['logged_in_email']);
unset($_SESSION['cart_pending']);
?>
<script type="text/javascript">
location.href = 'login.php';
 </script>
<?php
exit; 
?>