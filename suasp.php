<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu do gnuowif dùng nhập
    $ID = $_POST["ID"];
    $ten = $_POST["ten"];
    $noidung = $_POST["noidung"];
    $gia = $_POST["gia"];
    // Kiểm tra dữ liệu
    // thêm vào Database
    $conn = mysqli_connect("localhost", "root", "", "web1");
    $sql = "UPDATE hanghoa SET ten='$ten' , noidung='$noidung' , gia='$gia' WHERE ID='$ID'";
    $kq = mysqli_query($conn, $sql);
    header("Location:quanlysp.php");
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
                <h1><i>Quản Lý Sản Phẩm</i></h1>
            </center>
    </div>
    <?php
    $ID = $_GET["ID"];
    $conn = mysqli_connect("localhost", "root", "", "web1");
    $sql = "SELECT * FROM hanghoa WHERE ID=$ID";
    $kq = mysqli_query($conn, $sql);
    $row =  mysqli_fetch_array($kq);
    ?>
    <center id="centertable">
        <form action="suasp.php" method="POST">
            <table class="table table-striped" style="width: 80%;">
                <input type="hidden" name="ID" value="<?php echo $row["ID"]; ?>"><br>
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <td><textarea style="width: 500px; height: 25;" name="ten" cols="30" rows="7"><?php echo $row['ten']; ?></textarea></td>
                    </tr>

                    <tr>
                        <th style="padding-bottom:150px ;">Mô Tả</th>
                        <td><textarea style="width: 500px;" name="noidung" cols="30" rows="7"><?php echo $row['noidung']; ?></textarea></td>
                    </tr>

                    <tr>
                        <th>Đơn giá (VNĐ)</th>
                        <td><input style="width: 500px;" value=<?php echo $row['gia']; ?> type="text" name="gia"></td>
                    </tr>
                    <tr>
                        <th>Thêm</th>
                        <td><input style="background-color: #58257b;color: white;padding: 9px 18px;border: none;border-radius: 4px;cursor: pointer;"  type="submit" id="ADD" value="UPDATE"></td>
                    </tr>
                </thead>
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