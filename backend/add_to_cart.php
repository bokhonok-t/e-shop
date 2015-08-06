<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/cart.php';
add_to_cart($_POST['id']);
?>