<?
function add_to_cart($product_id, $count=1) {
	if (!empty($_SESSION['products'][$product_id])){
		$_SESSION['products'][$product_id]['count']++;
	}
	else {
		$q=mysql_query("SELECT price FROM product WHERE id='$product_id'" or die(mysql_error()));
		$add_product=mysql_fetch_assoc($q);
		$_SESSION['products'][$product_id]['cost']=$add_product['price'];
		$_SESSION['products'][$product_id]['count']=$count;
		$_SESSION['arr'] = $_SESSION['products'][$product_id]['price'];
	}
	update_cart();
}
		
function update_cart() {
	$_SESSION['products_incart'] = count($_SESSION['products']);
	$_SESSION['cart_cost']=0;
	foreach ($_SESSION['products'] as $key=>$value) {
		$_SESSION['cart_cost'] += $_SESSION['products'][$key]['cost']* $_SESSION['products'][$key]['count'];
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