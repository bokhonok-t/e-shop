<?
include 'config.php';
?>		
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
	$res = mysql_query("SELECT name, price, count, image FROM product WHERE name LIKE '%$search%'") or 	die(mysql_error());
	if(isset($_POST['submit_s'])){
		while($res_sear = mysql_fetch_array($res)){
			echo '<table>
		<tr>
			<th><img src = "'.$res_sear['image'].'" width = "250px" /></th>
		</tr>
		<tr>
			<td>
			<button onclick = "add_to_cart('.$res_sear['id'].');" name="'.$res_sear['name'].'">
				<img src = "img/cart%202.png" width = "27px">'.$res_sear['name'].'
			</button>
		<input type="button" style = " width: 50px" value="'.$res_sear['price'].'" name = "'.$res_sear['price'].'" >
		</td>
		</tr>
		</table>';
	}
}
		echo '</div>';
	
		?>