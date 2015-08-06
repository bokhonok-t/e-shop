<?
	session_start();
	include ("header.html");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
 <head>
	
	 <meta "Content-Type": "application/x-www-form-urlencoded; charset = 'utf-8'" >
	 <title>Menu</title>
	 <!--<link href="media-queries.css" rel="stylesheet" type="text/css">-->
	 <link rel="stylesheet" type="text/css" href="menu.css">
	 <link rel="stylesheet" type="text/css" href="search.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	 <script type="text/javascript" src="jquery.js"></script>
	 <script type="text/javascript" src="scroll.js"></script>
	 <script type="text/javascript" src="functions.js"></script>
	 <script type="text/javascript" src="http://scriptjava.net/source/scriptjava/scriptjava.js"></script>
	 <script type="text/javascript" src = "hover.js"></script>

	</head>
	<body>
		 	
		<div class = "caption"><span style="font-weight:bold;">GOOD 
				<font face = "mr de haviland, cursive" style = "font-size: 145%">  to</font>
				EAT
			</span>
		</div>
		<div class = "words">
			<p> - Shop with us -</p>
		</div>
<?
	$db_name = 'shop';
	$link = mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db($db_name);
	$result = mysql_query("SELECT * FROM CATEGORY");

	echo '<div class="category">
			<ul id = "category">';
	while($line = mysql_fetch_array($result, MYSQL_ASSOC)){
		echo '<form method="post" action="menu.php">
		<li><input type="submit" name="CAT'.$line['id'].'" value="'.$line['name'].'" /></li>
		</form>' ;
 if(isset($_POST['CAT'.$line['id'].''])){
	$id_cat = $line['id'];
	$title = $_POST['CAT'.$line['id'].'']; 
	
}
 } 
echo '</ul>
		</div>';
show($id_cat);

		 
function show($id_cat){
	
		echo '<div class="products">
				';
		$get = mysql_query("SELECT * FROM `PRODUCT` WHERE `id_category` = '$id_cat'")or die(mysql_error());

while($product = mysql_fetch_array($get)){
echo '
	<table>
		<tr>
			<th><img src = "'.$product['image'].'" width = "250px" /></th>
		</tr>
		<tr>
		<td><button onclick = "add_to_cart('.$product['id'].');" name="'.$product['name'].'"><img src = "img/cart%202.png" width = "27px">'.$product['name'].'
		</button>
		<input type="text" style = " width: 50px" value="'.$product['price'].'" name = "'.$product['price'].'" >
		</td>
		</tr>
	</table>'; 
	}

echo '</div>';
}?>
	<div class="title">
		<p><? echo $title ?></p>
	</div>
		
<form action="menu.php" method="post" name="form_s" class="searchform">
	<div class="search">
	<input type="search" name="search" placeholder="Search" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}"/>
	<input type="submit" name="submit_s" value = "" />
		</div>
</form>
		
	<?php
	$search = $_POST['search'];
	$search = trim($search);
	$search = htmlspecialchars($search);
	echo '<div class="products">';
	$res = mysql_query("SELECT name, price, count, image FROM product WHERE name LIKE '%$search%'") or 			die(mysql_error());
	if(isset($_POST['submit_s'])){
		while($res_sear = mysql_fetch_array($res)){
			echo '<table>
		<tr>
			<th><img src = "'.$res_sear['image'].'" width = "250px" /></th>
		</tr>
		<tr>
			<td><input type="button" style = "font-size: 20px " value="'.$res_sear['name'].'" name="'.$res_sear['name'].'">
			<input type="button" style = " width: 50px" value="'.$res_sear['price'].'" name = "'.$res_sear['price'].'" >
      		<input type="button" style = " width: 50px" value="'.$res_sear['count'].'g" name = "'.$res_sear['count'].'"></td>
		</tr>
		</table>';
	}
}
		echo '</div>';
	
		?>

<div class = "small_cart" >
	<?
		if(empty($_SESSION['product'])) {
			echo 'Ваша корзина пуста';
		}
		else{
			echo 'Товаров в корзине '.$_SESSION['products_incart'].' на сумму '.$_SESSION['cart_cost'];
		}
	?>
</div>

<div id = "toTop"> <img src = "img/Move_to_the_next.png"> </div>
	</body>
</html>