<? session_start();?>
<!--<!DOCTYPE html>
<html>
 <head>
	 <meta charset="utf-8">
	 <title>Menu</title>
	 
	 <link rel="stylesheet" type="text/css" href="menu.css">
	 <link rel="stylesheet" type="text/css" href="search.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	 <script type="text/javascript" src="jquery.js"></script>
	 <script type="text/javascript" src="cart.js"></script>
	</head>
	<body>

	<div class="products">
		<table>
	<tr>
		<th><img src = "img/meat/beef.png" width = "250px"></th>
			</tr>
		<tr>
			<td><input type="button" value="beef">
			<input type="button" style = " width: 50px" value="beef" >
			<input type="button" style = " width: 50px" value="100 g" >
			</td>
			</tr>
		</table>
	<table><tr>
		<th><img src = "img/meat/115.png" width = "250px"/></th>
		</tr>
			<tr><td><input type="button" value="beef">
			<input type="button" style = " width: 50px" value="pork" >
				<input type="button" style = " width: 50px" value="100 g" ></td></tr>
		</table>
		
		<table><tr>
		<th><img src = "img/meat/115.png" width = "250px"/></th>
		</tr>
			<tr><td><button><img src="img/cart%202.png">beef</button>
			<input type="button" style = " width: 50px" value="pork" >
				<input type="button" style = " width: 50px" value="100 g" >
				 </td></tr>
		</table>
		</div>
		
		
	<div class="title">
	<p>Meat</p>
	</div>
-->

<? 
include './config.php';
echo '<form method = "post" action = "test.php">
<input type = "submit" value = "add"  name = "add"/></form>';
if(isset($_POST['add'])){
	add();
//echo $add_product[price];
//$_SESSION[a] = $add_product[price];
}
function add(){
	$q=mysql_query("SELECT price FROM product WHERE id=15");
$add_product = mysql_fetch_assoc($q);
print_r($add_product);
}
?>
		
	