<?php
session_start();
$username = $_SESSION['username'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten = $_POST['ten'];
    $noidung = $_POST['noidung'];
    $conn = mysqli_connect("localhost", "root", "", "web1");
    $sql = "INSERT INTO binhluan(username,ten,noidung) VALUES ('$username','$ten','$noidung')";
    $kq = mysqli_query($conn, $sql);
}
?>
<html>

<head>
    <link rel="icon" type="image/x-icon" href="assets/logoquan.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quán Trà Sữa Sweet</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <a style="color:black" href="index.php">Thoát</a>
    <!--nhận xét 3 đứa-->
    <div style="margin-top:20px ;" id="comment">
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


        </center>
        <center style="padding:9px ;padding: bottom 50px; ;">
            <form action="binhluan.php" method="POST">
                <input type="hidden" name="ID" value="<?php echo $row["ID"]; ?>"><br>
                <textarea style="width: 150px;height: 33px;" placeholder="Họ Và Tên" cols="30" rows="7" name="ten" required></textarea>
                <textarea style="width: 600px;height: 33px;" placeholder="Nội Dung Bình Luận của Bạn" cols="30" rows="7" name="noidung" required=""></textarea><br>
                <input style="background-color: #0099FF;color: white;padding: 9px 18px;border: none;border-radius: 4px;cursor: pointer;" style="width:10% ; padding: 5px;" type="submit" value="Comment">
            </form>
        </center>
        <!-- comment -->
    </div>

    <script src="script.js"></script>
</body>

</html>