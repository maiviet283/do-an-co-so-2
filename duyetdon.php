<?php
    session_start();
    $ID = $_GET['ID'];
    $trangthai = "Đơn Hàng đang được vận chuyển";
    $conn = mysqli_connect("localhost","root","","web1");
    $sql = "UPDATE cc SET trangthai='Đơn Hàng đang được vận chuyển' , duyet='Thành Công' WHERE ID=$ID";
    $kq = mysqli_query($conn,$sql);
    header("location:quanlydh.php");
?>