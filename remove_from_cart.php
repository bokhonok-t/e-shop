<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/cart.php';
remove_from_cart($_POST['product_id']);
?> 