<?php
session_start();
$ID = $_GET['ID'];
$a = $_SESSION['cart'][$ID] - 1;
$_SESSION['cart'][$ID] = $a;
if($_SESSION['cart'][$ID] <= 0)
{
    $_SESSION['cart'][$ID] = 0;
}
print_r($_SESSION['cart'][$ID]) ;
    // print_r($_SESSION['cart']);  
    // echo '<a href="cart.php">Xem Chi Tiết</a>';
    header("location:shop.php");
?>