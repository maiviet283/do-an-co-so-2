<?php
    session_start();
    $ID = $_GET['ID'];
    if(isset($_SESSION['cart'][$ID]))
        $soluong = $_SESSION['cart'][$ID] + 1;
    else 
        $soluong = 1;
    $_SESSION['cart'][$ID] = $soluong;

    if($_SESSION['cart'][$ID] <= 0)
    {
        session_unset($_SESSION['cart'][$ID]);
    }
    // print_r($_SESSION['cart']);
    // echo '<a href="cart.php">Xem Chi Tiết</a>';
    header('Location:shop.php');
    exit();
?>