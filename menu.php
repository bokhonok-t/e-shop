<?
session_start();
include 'search.php';
include 'config.php';
include 'header.html';
include 'cart.php';
include 'small_cart.php';
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
	 <script type = "text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js">
	 </script>
	 <script type="text/javascript" src="js/scroll.js"></script>
	 <script type="text/javascript" src="http://scriptjava.net/source/scriptjava/scriptjava.js"></script>
     <script type="text/javascript" src="js/cart.js"></script>
	 <script type="text/javascript" src = "jquery.js"></script>
	 <script type="text/javascript" src = "cart.js"></script>

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
	echo '<div class="products">';
	$get = mysql_query("SELECT * FROM `PRODUCT` WHERE `id_category` = '$id_cat'")or die(mysql_error());

	while($product = mysql_fetch_array($get)){
	echo '
	<table>
		<tr>
			<th><img src = "'.$product['image'].'" width = "250px" /></th>
		</tr>
		<tr>
		<td><button onclick = "add_to_cart('.$product['id'].', '.$product['price'].', \''.$product['name'].'\')" name="'.$product['id'].'" ><img src = "img/cart%202.png" width = "27px">'.$product['name'].'</button>
		<input type="submit" style = " width: 50px" value="'.$product['price'].'" name = "'.$product['price'].'" >
		</td>
		</tr>
		</form>
	</table>'; 
	}

echo '</div>';
}
?>


    <div class="title"><p><? echo $title ?></p></div>
<div id = "toTop"> <img src = "img/Move_to_the_next.png"> </div>
	</body>
</html>