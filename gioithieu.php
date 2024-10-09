<?php
session_start();
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
            <a href="#C1" class="logo">
                <!--Lô gô-->
                <img src="assets/logoquan.png" width="30%" alt="">
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

        <!--thông tin đầu tiên ảnh lớn-->
        <div id="banner">
            <div class="box-left">
                <h2>
                    <center><span>Trà Sữa Sweet</span></center>
                </h2>
                <p>Máy quay dường như đang chậm lại, từng cảnh từng nét hiện lên rõ ràng.
                    Tôi thấy thầy đang lụi hụi trồng rau, chăm sóc con chó lông trắng đen
                    già khụ, thấy cả chúng tôi ngày đó, trong những ngày vất vả nhưng yên
                    bình. Tôi nghĩ, có lẽ đó là những ngày hạnh phúc và vui vẻ nhất tôi
                    từng có. Sau này, khi bước đi trên đường đời chông gai, có thể sẽ
                    chẳng còn ai chỉ bảo, dạy dỗ tôi tận tình như thầy đã từng, có thể
                    sẽ chẳng có ai lo tôi liệu có ngủ đủ giấc, liệu có stress khi nhồi
                    nhét quá nhiều. Nhưng, cố nhân từng nói, cuộc đời chỉ cần một người
                    khiến ta ngưỡng mộ, để cả đời noi gương, cả đời thương mến. Vậy
                    là quá đủ rồi
                </p>

            </div>

        </div>


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
                        <a href="index.php">Trang chủ</a>
                    </div>
                    <div class="item">
                        <a href="">Giới Thiệu</a>
                    </div>
                    <div class="item">
                        <a href="index.php#C3">Sản phẩm</a>
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
                </ul>
            </div>
            <div class="box">
                <h3 id="lienhe">LIÊN HỆ</h3>
                <form action="gioithieu.php" method="POST">
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
                <input type="hidden" name="ID" value="<?php echo $row["ID"]; ?>">
                <input type="text" name="email" placeholder="Địa chỉ email" required>
                <input type="text" name="noidungemail" placeholder="Nhập Thông tin cần hỗ trợ" required>
                <center>
                    <?php
                    if (isset($_SESSION['username'])) {
                        if ($_SESSION['lever'] == 'user') {
                            echo '<input style=" background-color: #CCCCCC;color: black;width: 200px;cursor: pointer; padding-right: 18px;" type="submit" value="Gửi đến bộ phận hỗ trợ">';
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