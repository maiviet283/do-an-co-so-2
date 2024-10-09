<?php
session_start();
$ID = $_GET['ID'];
// $_SESSION['cart']['ID'] = $_GET[$_SESSION['cart']['ID']];
// $_SESSION['cart'][$ID] = $soluong;
// $soluong = $_SESSION['cart'][$ID] + 1;
$a = $_SESSION['cart'][$ID] + 1;
$_SESSION['cart'][$ID] = $a;

print_r($_SESSION['cart'][$ID]) ;
    // print_r($_SESSION['cart']);
    // echo '<a href="cart.php">Xem Chi Tiết</a>';
    header("location:shop.php");
?>