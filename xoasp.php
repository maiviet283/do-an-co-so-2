<?php
    $ID = $_GET["ID"];
    $conn = mysqli_connect("localhost","root","","web1");
    $sql = "DELETE FROM hanghoa WHERE ID=$ID";
    $kq = mysqli_query($conn,$sql);
    header("Location:quanlysp.php");
?>