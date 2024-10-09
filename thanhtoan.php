<?php
    session_start();
    $u = $_SESSION['username'];
    $conn = mysqli_connect("localhost","root","","web1");
    $sql123 = "SELECT * FROM khachhang WHERE username = '$u'";
    $kq123 = mysqli_query($conn,$sql123);
    $row123 = mysqli_fetch_array($kq123);
    $_SESSION['ID'] = $row123['ID'];
    $iduser = $_SESSION['ID'];
    $sdt = $row123['sdt'];
    $diachi = $row123['diachi'];
    $ten = $_SESSION['tensp'];
    $tongtien = $_SESSION['tongtien'];
    $sql = "INSERT INTO donhang(iduser,trangthai,tongtien) VALUES ($iduser , 'Moi' , $tongtien)";
    // lấy giá trị cuối cùng của ID mới tạo
    $sqliddh = "SELECT * FROM donhang ORDER BY ID DESC LIMIT 1";
    $kqiddh = mysqli_query($conn,$sqliddh);
    $rowiddh = mysqli_fetch_array($kqiddh);
    $kq = mysqli_query($conn,$sql);
    $iddh = $rowiddh['ID'];


    foreach($_SESSION['cart'] as $key=>$value)
    {
        $sql = "INSERT INTO chitietdonhang (iddonhang,idhanghoa,soluong) VALUES ($iddh+1,$key,$value)";
        $kq1 = mysqli_query($conn,$sql);

        // $sqlcc = "UPDATE cc(soluong,gia) SET ($key,$value)";
        // $kqcc = mysqli_query($conn,$sqlcc);

        
    $sqlcc = "INSERT INTO cc(username,sdt,diachi,ten,soluong,gia,trangthai,duyet) VALUES ('$u','$sdt','$diachi','$ten','$value','$tongtien','Đang xét duyệt','Duyệt')";
    $kqcc = mysqli_query($conn,$sqlcc);
    }
    $tttc = "Thanh Toán Thành Công";
    $_SESSION['tttc'] = $tttc;


    // foreach($_SESSION['cart'] as $key=>$value)
    // {
    //     $sqlcc = "INSERT INTO cc(username,sdt,diachi,ten,soluong,gia) VALUES ($u,$sdt,$diachi,$ten,$key,$value)";
    //     $kqcc = mysqli_query($conn,$sqlcc);
    // }

    header("location:shop.php")
?>