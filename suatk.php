<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu do gnuowif dùng nhập
    $ID = $_POST["ID"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sdt = $_POST["sdt"];
    $diachi = $_POST["diachi"];
    // Kiểm tra dữ liệu
    // thêm vào Database
    $conn = mysqli_connect("localhost", "root", "", "web1");
    $sql = "UPDATE khachhang SET username='$username' , password='$password' , sdt='$sdt' ,diachi='$diachi' WHERE ID='$ID'";
    $kq = mysqli_query($conn, $sql);
    header("Location:quanlytk.php");
}
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
</head>

<body>


    <div id="wrapper">
        <div id="header">
            <a href="#" class="logo">
                <!--Lô gô-->
                <img src="assets/logoquan.png" width="30%">
            </a>
            <!--Menu-->
            <div id="menu">
                <div class="item">
                    <a id="C1" href="index.php">Trang chủ</a>
                </div>
                <div class="item">
                    <a href="gioithieu.php">Giới Thiệu</a>
                </div>
                <div class="item">
                    <a href="index.php#C3">Sản phẩm</a>
                </div>
                <div class="item">
                    <a href="index.php#C4">Đánh giá</a>
                </div>
                <div class="item">
                <?php
                    if (isset($_SESSION['username'])) {
                        if ($_SESSION['lever'] == 'admin') {
                            echo '<a href="hotro.php">Hỗ Trợ</a>';
                        }
                    }
                    if (isset($_SESSION['username'])) {
                        if ($_SESSION['lever'] == 'user') {
                            echo '<a href="#lienhe">Liên hệ</a>';
                        }
                    }
                    ?>
                </div>
                <div class="item">
                    <?php
                    if (isset($_SESSION['username'])) {
                        if ($_SESSION['lever'] == 'admin') {
                            echo '<a href="quanlytk.php">Quản Lý</a>';
                        }
                    }
                    ?>
                </div>
            </div>

            <!--cửa hàng đăng nhập-->
            <div id="actions">
                <div>
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo '<b><p style="color:#FF9900;" >' . $_SESSION['username'] . '</p></b>';
                        // echo " <br> ";
                        echo '<a style="color:#339900" href="dangxuat.php">Đăng Xuất</a>';
                    } else {
                        echo '<div class="item">';
                        echo '<a href="dangnhap.php"><img src="assets/user.png" alt=""></a>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <!-- <div class="item">
                    <a href="dangnhap.php"><img src="assets/user.png" alt=""></a>
                </div> -->
                <div class="item">
                    <?php
                    if (isset($_SESSION['username'])) {
                        if ($_SESSION['lever'] == 'user')
                            echo '<a href="shop.php"><img src="assets/cart.png"></a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div style="padding-top:30px;">
    <center>
                <a href="quanlytk.php" style="color:black"><input style="background-color: #0099FF;color: white;padding: 9px 18px;border: none;border-radius: 4px;cursor: pointer;" type="submit" value="Tài khoản"></a>
                <a href="quanlysp.php" style="color:black"><input style="background-color: #0099FF;color: white;padding: 9px 18px;border: none;border-radius: 4px;cursor: pointer;" type="submit" value="Sản Phẩm"></a>
                <a href="quanlydh.php" style="color:black"><input style="background-color: #0099FF;color: white;padding: 9px 18px;border: none;border-radius: 4px;cursor: pointer;" type="submit" value="Đơn Hàng"></a><br>
                <h1><i>Quản Lý Tài Khoản Khách Hàng</i></h1>
            </center>
    </div>
    <center id="centertable">
        <form action="suatk.php" method="POST">
            <table class="table table-striped" style="width: 80%;">
                <input type="hidden" name="ID" value="<?php echo $row["ID"]; ?>"><br>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>SĐT</th>
                        <th>Địa Chỉ</th>
                        <th>Lưu</th>
                        <!-- <th>Sửa</th> -->
                    </tr>
                </thead>
                <?php
                $ID = $_GET["ID"];
                $conn = mysqli_connect("localhost", "root", "", "web1");
                $sql = "SELECT * FROM khachhang WHERE ID=$ID";
                $kq = mysqli_query($conn, $sql);
                $row =  mysqli_fetch_array($kq);
                ?>
                <input type="hidden" name="ID" value="<?php echo $row["ID"]; ?>"><br>
                <tr>
                    <td>1</td>
                    <td><input type="text" name="username" value=<?php echo $row['username']; ?>></td>
                    <td><input type="text" name="password" value=<?php echo $row['password']; ?>></td>
                    <td><input type="text" name="sdt" value=<?php echo $row['sdt']; ?>></td>
                    <td><textarea style="width: 200px; height: 25;" name="diachi" cols="30" rows="7"><?php echo $row['diachi']; ?></textarea></td>
                    <td><input style="background-color: #58257b;color: white;padding: 4px 18px;border: none;border-radius: 4px;cursor: pointer;" type="submit" id="UPDATE" value="UPDATE"></td>
                </tr>
            </table>
        </form>
        <center>

            <div id="footer">
                <div class="box">
                    <div class="logo">
                        <center><img src="assets/logoquan.png" width="30%" alt=""></center>
                    </div>
                    <p>Cung cấp sản phẩm với chất lượng an toàn cho quý khách</p>
                    <b>
                        <center>
                            <p> Mai Quốc Việt </p>
                        </center>
                    </b>
                </div>
                <div class="box">
                    <h3>NỘI DUNG</h3>
                    <ul class="quick-menu">
                        <div class="item">
                            <a href="#C1">Trang chủ</a>
                        </div>
                        <div class="item">
                            <a href="">Giới Thiệu</a>
                        </div>
                        <div class="item">
                            <a href="#C3">Sản phẩm</a>
                        </div>
                        <div class="item">
                            <a href="#lienhe">Liên hệ</a>
                        </div>
                    </ul>
                </div>
            </div>


</body>

</html>