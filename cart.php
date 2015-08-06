<?
set_time_limit(0);
function add_to_cart($id, $count = 1) {
	
	if (!empty($_SESSION['product'][$id])) {
		$_SESSION['product'][$id]['count']++;
	}
	else {
		$q="SELECT price FROM product WHERE id= $id";
		echo $id;
		$add_product=mysql_fetch_assoc(mysql_query($q));
		$_SESSION['product'][$id]['cost']=$add_product['price'];
		$_SESSION['product'][$id]['count']=$count;
}
update_cart();
}

function update_cart() {
	$_SESSION['products_incart']=count($_SESSION['product']);
	$_SESSION['cart_cost']=0;
	while ($_SESSION['product']) {
		$_SESSION['cart_cost'] += $_SESSION['product']['id']['cost'];
	}
}

function update_product_count($id, $count) {
	$_SESSION['product'][$id]['count']=$count;
	update_cart();
}

function remove_from_cart($id) {
	unset($_SESSION['product'][$id]);
	update_cart();
}
?>