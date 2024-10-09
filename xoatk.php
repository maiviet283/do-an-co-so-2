<?php
    $ID = $_GET["ID"];
    $conn = mysqli_connect("localhost","root","","web1");
    $sql = "DELETE FROM khachhang WHERE ID=$ID";
    $kq = mysqli_query($conn,$sql);
    header("Location:quanlytk.php");
?>