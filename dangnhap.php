<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="icon" type="image/x-icon" href="assets/logoquan.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quán Trà Sữa Sweet</title>

  <style>
    body {

      background-image: url(assets/anhnendangnhap.jpg);
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    form {

      position: absolute;
      right: 500px;
      width: 350px;
      border: 2px solid black;
      padding: 3px 23px 0px 23px;
      top: 99px;

    }

    input[type=text],
    input[type=password] {
      /* 2 ô để điền username and password */
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 3px solid #ccc;
      box-sizing: border-box;
    }

    button {
      /* nút login */
      background-color: #04AA6D;
      color: white;
      padding: 14px 20px 14px 20px;
      margin: 6px 65px;
      border: none;
      /* hiệu ứng con chuột bàn tay */
      cursor: pointer;

      width: 150px;
    }

    button:hover {
      opacity: 0.8;
    }

    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }





    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }


    /* chỉnh link ở nút trở về nè  */
    a:link,
    a:visited {

      color: white;
      padding: 0.1px 5px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
    }
  </style>

</head>

<body>


  <form style="background-color: #fffd6c" action="dangnhap.php" method="POST">

    <center>
      <p style="font-size: 33px; color: #f44336;"><b> Đăng Nhập </b></p>
      <p>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $username = $_POST["username"];
          $password = $_POST["password"];
          $conn = mysqli_connect("localhost", "root", "", "web1");
          $sql = "SELECT * FROM khachhang WHERE username='$username' AND password='$password'";
          $kq = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($kq); // trả về số hàng
          if ($count == 0) {
            echo 'Sai tên đăng nhập hoặc mật khẩu';
          } else {
            header('Location:index.php');
          }
        }
        ?>
      </p>
    </center>
    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Vui lòng nhập tên đăng nhập" name="username" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Vui lòng nhập mật khẩu" name="password" required>

      <center>
        <table>
          <tr>
            <td>
              <button type="submit">Đăng Nhập</button>
            </td>
          </tr>
        </table>
        <p>Nhấn vào đây để <a style="color:blueviolet" href="dangky.php">Đăng Ký</a>|<a style="color:blueviolet" href="index.php">Thoát</a></p>
      </center>

    </div>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $conn = mysqli_connect("localhost", "root", "", "web1");
    $sql = "SELECT * FROM khachhang WHERE username='$username' AND password='$password'";
    $kq = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($kq);
    if ($count == 0) {
      echo '';
    } else {
      $row1 = mysqli_fetch_array($kq);
      $_SESSION['username'] = $row1['username'];
      if ($row1['lever'] == 1) {
        $_SESSION['lever'] = 'admin';
      } else {
        $_SESSION['lever'] = 'user';
      }
    }
  }
  ?>

</body>

</html>