<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

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

        <div style="padding-top:30px;">
            <center>
                <a href="quanlytk.php" style="color:black"><input style="background-color: #0099FF;color: white;padding: 9px 18px;border: none;border-radius: 4px;cursor: pointer;" type="submit" value="Tài khoản"></a>
                <a href="quanlysp.php" style="color:black"><input style="background-color: #0099FF;color: white;padding: 9px 18px;border: none;border-radius: 4px;cursor: pointer;" type="submit" value="Sản Phẩm"></a>
                <a href="quanlydh.php" style="color:black"><input style="background-color: #0099FF;color: white;padding: 9px 18px;border: none;border-radius: 4px;cursor: pointer;" type="submit" value="Đơn Hàng"></a><br>
                <h1><i>Quản Lý Tài Khoản Khách Hàng</i></h1>
            </center>
        </div>


        <center id="centertable">
            <div id="timkiem">
                <form action="" method="POST">
                    <div style="padding-top: 20px;">
                        <input type="text" name="txttimkiem">
                        <input type="submit" style="background-color: #0099FF;color: white;padding: 2px 14px;border: none;border-radius: 4px;cursor: pointer;" name="timkiem" value="Tìm Kiếm">
                    </div>
                    <?php
                    if (isset($_POST["timkiem"])) {
                        $s = $_POST["txttimkiem"];
                        if ($s == "") {
                            echo '<br>';
                            echo 'vui lòng nhập vào thanh tìm kiếm';
                            echo '<br>';
                            echo '<a style="color:black" href="quanlytk.php">Tất cả</a>';
                            echo "";
                        } else {
                            $conn = mysqli_connect("localhost", "root", "", "web1");
                            $sql = "SELECT * FROM khachhang WHERE username LIKE '%$s%' AND lever='0'";
                            $kq = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($kq);
                            if ($count < 0) {
                                // echo "khong tim thấy kết quả với từ khóa ".$s;
                                echo 'Không tìm thấy kết quả phù hợp';
                                echo '<a href="quanlytk.php">Tất cả</a>';
                            } else {
                                // echo "tìm thấy".$count." kết quả ".$s;
                                echo '<a style="color:black" href="quanlytk.php">Tất cả</a>';
                    ?>
                                <table class="table table-striped" style="width: 80%;">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>USERNAME</th>
                                            <th>PASSWORD</th>
                                            <th>SĐT</th>
                                            <th>Địa Chỉ</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $kq = mysqli_query($conn, $sql);
                                    $stt = 1;
                                    ?>
                                    <?php
                                    while ($row =  mysqli_fetch_array($kq)) {
                                        echo '<tr>';
                                        echo '<td>' . $stt . '</td>';
                                        echo '<td>' . $row['username'] . '</td>';
                                        echo '<td>' . $row['password'] . '</td>';
                                        echo '<td>' . $row['sdt'] . '</td>';
                                        echo '<td>' . $row['diachi'] . '</td>';
                                        echo '<td><a style="color:black" href="suatk.php?ID=' . $row['ID'] . '">Sửa</a></td>';
                                        echo '<td><a href="xoatk.php?ID=' . $row['ID'] . '"><img style="width:23px" src="assets/xoa.jpg"></a></td>';
                                        echo '</tr>';
                                        $stt++;
                                    }
                                    ?> <?php
                                    }
                                }
                            } else {
                                        ?>
                            <table class="table table-striped" style="width: 80%;">
                                <thead>
                                <tr>
                                            <th>STT</th>
                                            <th>USERNAME</th>
                                            <th>PASSWORD</th>
                                            <th>SĐT</th>
                                            <th>Địa Chỉ</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                </thead>
                            <?php
                                $conn = mysqli_connect("localhost", "root", "", "web1");
                                $stt = 1;
                                $sql1 = "SELECT * FROM khachhang WHERE lever=0";
                                $kq1 = mysqli_query($conn, $sql1);
                                while ($row1 =  mysqli_fetch_array($kq1)) {
                                    echo '<tr>';
                                    echo '<td>' . $stt . '</td>';
                                    echo '<td>' . $row1['username'] . '</td>';
                                    echo '<td>' . $row1['password'] . '</td>';
                                    echo '<td>' . $row1['sdt'] . '</td>';
                                    echo '<td>' . $row1['diachi'] . '</td>';
                                    echo '<td><a style="color:black" href="suatk.php?ID=' . $row1['ID'] . '">Sửa</a></td>';
                                    echo '<td><a href="xoatk.php?ID=' . $row1['ID'] . '"><img style="width:23px" src="assets/xoa.jpg"></a></td>';
                                    echo '</tr>';
                                    $stt++;
                                }
                            }
                            ?>
                            </table>

                </form>
            </div>
        </center>



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
    </div>
    <div>

    </div>
    <script src="script.js"></script>
</body>

</html>