<?
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/cart.php';
update_product_count($_POST['product_id'], $_POST['count']);
?>