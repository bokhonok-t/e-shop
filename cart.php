<?
session_start();
function add_to_cart($pr_id, $count = 1){
	if(!empty($_SESSION['product'][$pr_id])){
		
		$_SESSION['product'][$pr_id]['count']++;
	}
	else{
		$price = mysql_query("SELECT price from product where id = '$pr_id'") or die (mysql_error());
		$res = mysql_fetch_assoc($price);
		$_SESSION['product'][$pr_id]['price'] = $res['price'];
		$_SESSION['product'][$pr_id]['count'] = $count;
		//$_SESSION['products_incart'] = 1;
	}
	update_cart();
}

function update_cart(){
	$_SESSION['products_incart']= 'hhhh';
}

function remove_from_cart($pr_id) {
	unset($_SESSION['products'][$pr_id]);
	}
?>