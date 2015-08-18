<!DOCTYPE>
<html>
    <div class="small_cart">
    <h2>Cart</h2>
<?
if (empty($_SESSION['products'])) {
    echo 'Empty cart';
}
else {
    echo '<table>';
    foreach($_SESSION['products'] as $d){
        echo '<tr>
                <td>'.$d[name].'</td> 
                <td>'.$d[`count`].'</td>
                <td>'.$d[price]*$d[`count`].'</td></tr>';
    }
    echo '</table>
             </br>Total: '.$_SESSION['cart_price'].'
        <div class = "button">
            <a href="order.php"> Checkout </a>
        </div>';
}
	?></div>
</html>