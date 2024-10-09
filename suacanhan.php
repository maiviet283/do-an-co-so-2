<?php 
    session_start();
    $kk = $_SESSION['username'];
?>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $conn = mysqli_connect("localhost", "root", "", "web1");
    $sql = "UPDATE khachhang SET username='$username' , password='$password' , sdt='$sdt' , diachi='$diachi' WHERE username = '$kk'";
    $kq = mysqli_query($conn, $sql);
  }
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


  <form style="background-color: #fffd6c" action="suacanhan.php" method="POST">
    <?php
        $u = $_SESSION['username'];
        $conn = mysqli_connect("localhost","root","","web1");
        $sql1 = "SELECT * FROM khachhang WHERE username = '$u' ";
        $kq1 = mysqli_query($conn,$sql1);
        $row = mysqli_fetch_array($kq1);
    ?>
    <center>
      <p style="font-size: 33px; color: #f44336;"><b><img src="assets/c3.jpg" style="width:33% ;padding-bottom:0px ;"></b></p>
    </center>
    <div class="container">
      <label><b>Username</b></label>
      <input type="text" name="username" value="<?php echo $row['username']; ?>">

      <label><b>Password</b></label>
      <input type="text" name="password"  value="<?php echo $row['password']; ?>" >

      <label><b>Số Điện Thoại</b></label>
      <input type="text" name="sdt"  value="<?php echo $row['sdt']; ?>" >

      <label><b>Địa chỉ để nhận hàng </b></label>
      <input type="text" name="diachi" value="<?php echo $row['diachi']; ?>"  >


      <center>
        <table>
          <tr>
            <td>
              <button type="submit">Cập Nhật</button>
            </td>
          </tr>
        </table>
        <p> Nhấn tại đây để <a style="color:black"  href="index.php">Thoát</a></p>
      </center>

    </div>
  </form>

</body>

</html>