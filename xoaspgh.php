<?php
session_start();
$ID = $_GET['ID'];
unset($_SESSION['cart'][$ID]);
header("location:shop.php");
?>