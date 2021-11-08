<?php 
include '../includes/config.php';
session_start();
$result_arr  = array();
if(isset($_REQUEST['foodId'])){
	$id = $_REQUEST['foodId'];
	$foodQty = $_REQUEST['foodQty'];
	$sqlF = "SELECT foods.*,category.title FROM foods LEFT JOIN category on category.id =  foods.category_id WHERE foods.id = '".$id."'";
	$resultF = $conn->query($sqlF);
	$rowF = $resultF->fetch_assoc();
	$itemArray = array(
		"food_".$id=>array(
			'id'=>$id,
			'Title'=>$rowF['name'],
			'Price'=>$rowF['price'],
			'CatId'=>$rowF['category_id'],
			'CatTitle'=>$rowF['title'],
			'ShortDesc'=>$rowF['short_desc'],
			'Img'=>$rowF['image']
		)
	);
	if(!empty($_SESSION["cart_item"])) {
		if(in_array("food_".$id,array_keys($_SESSION["cart_item"]))) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if("food_".$id == $k) {
						if(empty($_SESSION["cart_item"][$k]["quantity"])) {
							$_SESSION["cart_item"][$k]["quantity"] = 0;

						}
						$_SESSION["cart_item"][$k]["quantity"] += $foodQty;
					}
			}
		} else {
			$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
			$_SESSION["cart_item"]["food_".$id]["quantity"]  = $foodQty;
		}
	} else {
		$_SESSION["cart_item"] = $itemArray;
		$_SESSION["cart_item"]["food_".$id]["quantity"]  = $foodQty;
	}
	$result_arr['type'] = true;
	$result_arr['cart_item_count'] = count($_SESSION["cart_item"]);
	//$result_arr['cart_item'] = $_SESSION["cart_item"];
	$result_arr['notification_msg'] = "Food Added to Cart  Successfully!";
	$result_arr['notification_type'] = "success";
	echo json_encode($result_arr);
}else{
	$result_arr['type'] = false;
	$result_arr['notification_msg'] = "Somthing Wrong!";
	$result_arr['notification_type'] = "error";
	echo json_encode($result_arr);
}
exit;
?>