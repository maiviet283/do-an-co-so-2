<?php
    $ID = $_GET["ID"];
    $conn = mysqli_connect("localhost","root","","web1");
    $sql = "DELETE FROM hotro WHERE ID=$ID";
    $kq = mysqli_query($conn,$sql);
    header("Location:hotro.php");
?>