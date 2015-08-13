<?
session_start();
include_once './config.php';

function add_to_cart($product_id, $price, $count=1) {
	if (!empty($_SESSION['products'][$product_id])){
		$_SESSION['products'][$product_id][`count`]++;
	}
	else {
		$_SESSION['products'][$product_id]['price']=$price;
		
		$_SESSION['products'][$product_id][`count`]=$count;
	}
	update_cart();
}
		
function update_cart() {
	
	$_SESSION['products_incart'] = count($_SESSION['products']);
	$_SESSION['cart_price']=0;
	foreach ($_SESSION['products'] as $key=>$value) {
		$_SESSION['cart_price'] = $_SESSION['products'][$key][price] * $_SESSION['products'][$key][`count`];
	}
}
	
function update_product_count($product_id, $count) {
	$_SESSION['products'][$product_id]['count']=$count;
	update_cart();
}		

function remove_from_cart($product_id) {
	unset($_SESSION['products'][$product_id]);
	update_cart();
}
	?>