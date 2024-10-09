<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="assets/logoquan.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quán Trà Sữa Sweet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <p><a style="color:black" href="index.php">Thoát</a></p>
    <center>
        <h1><i>Quản Lý Bình Luận </i></h1>
        <table class="table table-hover" style="width: 93%;">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>USERNAME</th>
                    <th style="width:10% ;">Họ Và Tên</th>
                    <th>Nội Dung</th>
                    <th>Xóa</th>
                </tr>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "web1");
                $sql = "SELECT * FROM binhluan";
                $kq = mysqli_query($conn, $sql);
                $i = 1;
                while ($row = mysqli_fetch_array($kq)) {
                    echo '<tr>';
                    echo '<td>' . $i . '</td>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['ten'] . '</td>';
                    echo '<td>' . $row['noidung'] . '</td>';
                    echo '<td><a style="color:black" href="xoabinhluan.php?ID=' . $row['ID'] . '">Xóa</a></td>';
                    echo '</tr>';
                    $i = $i + 1;
                }
                ?>
            </thead>
        </table>
    </center>

</body>

</html>