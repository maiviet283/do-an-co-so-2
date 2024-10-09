<?php
session_start();
?>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="assets/logoquan.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quán Trà Sữa Sweet</title>
    <link rel="stylesheet" href="style_tk.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <a style="color:black" href="shop.php">Thoát</a>
    <center>
        <h1><i>Lịch sử mua hàng của bạn</i></h1>
        <table class="table table-striped" style="width: 80%;">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Tổng giá</th>
                    <th>Trạng Thái</th>
                </tr>
                <?php
                $_SESSION['username'];
                $u = $_SESSION['username'];
                $conn = mysqli_connect("localhost", "root", "", "web1");
                $sql = "SELECT * FROM cc WHERE username='$u'";
                $kq = mysqli_query($conn, $sql);                
                $stt = 1;
                while ($row = mysqli_fetch_array($kq)) {
                    echo '<tr>';
                    echo '<td>'.$stt.'</td>';
                    echo '<td>'.$row['ten'].'</td>';
                    echo '<td>'.$row['soluong'].'</td>';
                    echo '<td>'.$row['gia'].'</td>';
                    echo '<td>'.$row['trangthai'].'</td>';
                    echo '</tr>';
                    $stt++;
                }
                ?>
            </thead>
        </table>
    </center>

</body>

</html>