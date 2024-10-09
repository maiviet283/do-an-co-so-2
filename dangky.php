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
      top: 10px;

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


  <form style="background-color: #fffd6c" action="dangky.php" method="POST">

    <center>
      <p style="font-size: 33px; color: #f44336;"><b> Đăng Ký </b></p>
    </center>
    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Vui lòng nhập tên đăng nhập" name="username" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Vui lòng nhập mật khẩu" name="password" required>

      <label><b>Số Điện Thoại</b></label>
      <input type="text" placeholder="Vui lòng nhập Số Điện Thoại" name="sdt" required>

      <label><b>Địa chỉ để nhận hàng </b></label>
      <input type="text" placeholder="Vui lòng nhập Địa Chỉ Nhận Hàng" name="diachi" required>


      <center>
        <table>
          <tr>
            <td>
              <button type="submit">Đăng Ký</button>
            </td>
          </tr>
        </table>
        <p>Nhấn vào đây để <a style="color:blueviolet"  href="dangnhap.php">Đăng Nhập</a><a style="color:blueviolet"  href="index.php">Thoát</a></p>
      </center>

    </div>
  </form>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $conn = mysqli_connect("localhost", "root", "", "web1");
    $sql = "INSERT INTO khachhang (username, password,sdt,diachi,lever) VALUES ('$username','$password','$sdt','$diachi',0)";
    $kq = mysqli_query($conn, $sql);
    header('Location:dangnhap.php');
  }
  ?>

</body>

</html>