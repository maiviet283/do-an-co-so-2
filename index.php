<?php
session_start();
if (isset($_SESSION['username']))
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="assets/logoquan.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quán Trà Sữa Sweet</title>
    <link rel="stylesheet" href="style.css">
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
                    <a id="C1" href="">Trang chủ</a>
                </div>
                <div class="item">
                    <a href="gioithieu.php">Giới Thiệu</a>
                </div>
                <div class="item">
                    <a href="#C3">Sản phẩm</a>
                </div>
                <div class="item">
                    <a href="#C4">Bình Luận</a>
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
                <div class="item">
                    <?php
                    if (isset($_SESSION['username'])) {
                        if ($_SESSION['lever'] == 'user')
                            echo '<a href="suacanhan.php"><img src="assets/user.png"></a>';
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

        <!--thông tin đầu tiên ảnh lớn-->
        <div id="banner">
            <div class="box-left">
                <div>
                    <h2>
                        <span>TRÀ SỮA</span>
                        <br>
                        <span>THƯỢNG HẠNG</span>
                    </h2>
                </div>
                <div>
                    <p>Cung cấp đồ uống đang được giới trẻ ưa chuộng nhất <br> hiện
                        nay , đảm bảo vệ sinh đồ uống và được phục vụ <br>
                        tận tình . </p>
                </div>
                <?php
                if (isset($_SESSION['username'])) {
                    if ($_SESSION['lever'] == 'user')
                        echo '<button><a href="shop.php">Mua Ngay</a></button>';
                }
                ?>
                
            </div>
            <div class="box-right">
                <img src="assets/img_1.png" alt="">
                <img src="assets/img_2.png" alt="">
                <img src="assets/img_3.png" alt="">
            </div>
            <!--nút chạy xuống-->
            <div class="to-bottom">
                <a href="#C3">
                    <img src="assets/to_bottom.png" alt="">
                </a>
            </div>
        </div>


    </div>
    <!-- sản phẩm tự sửa ở đây -->
    <!-- sản phẩm ở DATABASE -->
    <div id="wp-products">
        <h2 id="C3">SẢN PHẨM CỦA CHÚNG TÔI</h2>
        <ul id="list-products">
            <!--1-->
            <?php
            $conn = mysqli_connect("localhost", "root", "", "web1");
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 6;
                // hàng -> total
            $result = mysqli_query($conn, 'SELECT count(ID) as total FROM hanghoa');
            $row = mysqli_fetch_assoc($result);

            $sosp = $row['total'];
            $sotrang = ceil($sosp / $limit);

            if ($page > $sotrang) {
                $page = $sotrang;
            } else if ($page < 1) {
                $page = 1;
            }

            $start = ($page - 1) * $limit;
            $result = mysqli_query($conn, "SELECT * FROM hanghoa LIMIT $start,$limit");

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="item">';
                echo '<img id="anhspindex" src="assets/sp' . $row['ID'] . '.jpg" alt="">';
                echo   '<div class="stars">';
                echo      '<span>';
                echo     '<img src="assets/star.png" alt="">';
                echo  '</span>';
                echo  '<span>';
                echo      '<img src="assets/star.png" alt="">';
                echo  '</span>';
                echo  '<span>';
                echo      '<img src="assets/star.png" alt="">';
                echo '</span>';
                echo  '<span>';
                echo   '<img src="assets/star.png" alt="">';
                echo '</span>';
                echo '<span>';
                echo  '<img src="assets/star.png" alt="">';
                echo '</span>';
                echo '</div>';
                echo  '<div class="name">' . $row['ten'] . '</div>';
                echo '<div class="desc">' . $row['noidung'] . '</div>';
                echo '<div class="price">' . $row['gia'] . ' VNĐ </div>';
                if (isset($_SESSION['username'])) {
                    if ($_SESSION['lever'] == 'user')
                    echo '<div class="price"><a style="margin-top:-17px;" href="addcart.php?ID=' . $row['ID'] . '"><img src="assets/addcart.png" ></a></div>'; 
                }
                echo '</div>';
            }
            ?>
        </ul>


        <!--số-->
        <div class="list-page">
            <?php
            for ($i = 1; $i <= $sotrang; $i++) {
                echo '<div class="item">';
                echo    '<a href="index.php?page=' . $i . '#C3">' . $i . '</a>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <!-- aooa -->
    <!-- <div class="list-page">
            <div class="item">
                <a href="">1</a>
            </div>
            <div class="item">
                <a href="">2</a>
            </div>
            <div class="item">
                <a href="">3</a>
            </div>
            <div class="item">
                <a href="">4</a>
            </div>
        </div> -->
    </div>

    <!-- sản phẩm thứ 2 nha bro -->
    <!-- <iframe src="sanpham.php" name="iframe_a" border:none height="1086px" width="100%"></iframe> -->
    <!--giảm giá vs ảnh lớn 2-->
    <div id="saleoff">
        <div class="box-left">
            <h1>
                <span>GIẢM GIÁ LÊN ĐẾN</span>
                <span>30%</span>
            </h1>
        </div>
        <div class="box-right"></div>
    </div>

    <!--nhận xét 3 đứa-->
    <div style="padding-bottom: 600px;" id="comment">
        <h2 id="C4">NHẬN XÉT CỦA KHÁCH HÀNG</h2>
        <center>
            <div id="comment-body">
                <div class="prev">
                    <a href="#">
                        <img src="assets/prev.png" alt="">
                    </a>
                </div>
                <!--1-->
                <ul id="list-comment">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "web1");
                    $sql1 = "SELECT * FROM binhluan";
                    $kq1 = mysqli_query($conn, $sql1);
                    while ($row = mysqli_fetch_array($kq1)) {
                        echo '<li class="item">';
                        echo  '<p style="color:white">USERNAME : ' . $row['username'] . '</p> ';
                        echo '<div class="stars">';
                        echo   '<span>';
                        echo      '<img src="assets/star.png" alt="">';
                        echo  '</span>';
                        echo '<span>';
                        echo      '<img src="assets/star.png" alt="">';
                        echo '</span>';
                        echo    '<span>';
                        echo      '<img src="assets/star.png" alt="">';
                        echo  '</span>';
                        echo  '<span>';
                        echo        '<img src="assets/star.png" alt="">';
                        echo  '</span>';
                        echo '<span>';
                        echo      '<img src="assets/star.png" alt="">';
                        echo '</span>';
                        echo '</div>';
                        echo '<div class="name">' . $row['ten'] . '</div>';

                        echo '<div class="text">';
                        echo '<p>' . $row['noidung'] . '</p>';
                        echo '</div>';
                        echo '</li>';
                    }
                    ?>
                </ul>

                <!--mũi tên chỉ bên phải-->
                <div class="next">
                    <a href="#">
                        <img src="assets/next.png" alt="">
                    </a>
                </div>
            </div>
            <?php
            if (isset($_SESSION['username'])) {
                echo '<div><p>Viết bình luận<a style="color:blue" href="binhluan.php">Tại đây</a>  ';
                if ($_SESSION['lever'] == 'admin') {
                    echo '| Quản lý Bình Luận <a style="color:blue" href="qlbinhluan.php">Tại Đây</a></p></div>';
                }
            }
            ?>
        </center>
    </div>

    <!--logo góc-->
    <div id="footer">
        <div class="box">
            <div class="logo">
                <center><img src="assets/logoquan.png" width="30%" alt=""></center>
            </div>
            <p style="margin-left: 5px;">Cung cấp sản phẩm với chất lượng an toàn cho quý khách</p>
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
        <div class="box">
            <h3 id="lienhe">LIÊN HỆ</h3>
            <form action="index.php" method="POST">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Lấy dữ liệu do gnuowif dùng nhập
                    $email = $_POST["email"];
                    $noidungemail = $_POST["noidungemail"];
                    // Kiểm tra dữ liệu
                    // thêm vào Database    
                    $conn = mysqli_connect("localhost", "root", "", "web1");
                    $sql = "INSERT INTO hotro(username,email,noidungemail) VALUES ('$username','$email','$noidungemail')";
                    $kq = mysqli_query($conn, $sql);
                }
                ?>
                <input type="hidden"  name="ID" value="<?php echo $row["ID"]; ?>">
                <input type="text" name="email" placeholder="Địa chỉ email" required>
                <input type="text" name="noidungemail" placeholder="Nhập Thông tin cần hỗ trợ" required>
                <center>
                    <?php
                    if (isset($_SESSION['username'])) {
                        if ($_SESSION['lever'] == 'user') {
                            echo '<input style=" background-color: #CCCCCC;color: black;width: 200px;cursor: pointer; padding-right: 18px; margin-left:40px;" type="submit" value="Gửi đến bộ phận hỗ trợ">';
                        }
                    }
                    ?>
                </center>
            </form>
        </div>
    </div>
    </div>
    <div>

    </div>
    <script src="script.js"></script>
</body>

</html>