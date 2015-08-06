<?
	session_start();
	include_once "cart.php";
	include ("header.html");
?>
<!DOCTYPE>
<html>
	<head>
		<script type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="menu.css">
		<title>Cart</title>
	</head>
	<body>
		<div class = "small_cart" id = "cart_interface">
			<?
				if(empty($_SESSION['product'])) {
					echo 'Ваша корзина пуста';
				}
				else{
					
					echo 'Товаров в корзине '.$_SESSION['products_incart'].' на сумму '.$_SESSION['cart_cost'];
				}
			?>
		</div>
		<td>
<button onclick="remove_from_cart(<?php echo $key ?>)">удалить</button>
</td>
</html>