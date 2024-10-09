<?php
session_start();
$sid = "";
$first = 1;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($first == 1) {
            $sid = $key;
            $first = 0;
        } else {
            $sid = $sid . ',' . $key;
        }
        // if ($value == 0) {
        //     unset($_SESSION['cart'][$key]);
        // }
    }
}

?>

<html>

<head>
    <link rel="icon" type="image/x-icon" href="assets/logoquan.png">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quán Trà Sữa Sweet</title>
    <script src="js/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<!-- CSS -->
<style type="text/css">
    td {
        vertical-align: middle;
    }

    body {
        background-color: rgb(235, 250, 215);
    }

    @media screen and (max-width: 600px) {
        table#cart tbody td .form-control {
            width: 20%;
            display: inline !important;
        }

        .actions .btn {
            width: 36%;
            margin: 1.5em 0;
        }

        .actions .btn-info {
            float: left;
        }

        .actions .btn-danger {
            float: right;
        }

        table#cart thead {
            display: none;
        }

        table#cart tbody td {
            display: block;
            padding: .6rem;
            min-width: 320px;
        }

        table#cart tbody tr td:first-child {
            background: #333;
            color: #fff;
        }

        table#cart tbody td:before {
            content: attr(data-th);
            font-weight: bold;
            display: inline-block;
            width: 8rem;
        }

        table#cart tfoot td {
            display: block;
        }

        table#cart tfoot td .btn {
            display: block;
        }
    }
</style>


<body>
    <h2 class="text-center">Mua sắm trực tuyến vận chuyển tức thời</h2>
    <h2 aria-setsize="45px">
        <center><b><i>Sweet</i></b></center>
    </h2>
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>USERNAME - <b style="color:#FF9900 ; font-size: 23px;">
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo $_SESSION['username'];
                            } else {
                                header('Location:dangnhap.php');
                            }

                            ?></b>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><a href="lsgd.php">Lịch Sử Giao dịch</a></th>
                    </th>
                </tr>
                <tr>
                    <th></th>
                    <th style="width:27%">Tên sản phẩm</th>
                    <th style="width:33%">Nội Dung</th>
                    <th style="width:12%">Đơn giá</th>
                    <th style="width:8%">Số lượng</th>
                    <th style="width:22%" class="text-center">Thành tiền (VNĐ)</th>
                    <!-- <th style="width:10%"> </th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['cart'])) {
                    $conn = mysqli_connect("localhost", "root", "", "web1");
                    $sql = "SELECT * FROM hanghoa WHERE ID in ($sid)";
                    $kq = mysqli_query($conn, $sql);
                    $tongtien = 0;
                    $ok = 1;

                    while ($dong = mysqli_fetch_array($kq)) {

                        //eqwr
                        $q = $_SESSION['cart'][$dong['ID']];
                        //qưerqwr
                        echo '<tr>';
                        echo '<td><img width="100%" src="assets/shop' . $dong['ID'] . '.jpg"></td>';
                        echo '<td><h4>' . $dong['ten'] . '</h4></td>';
                        echo '<td><i>' . $dong['noidung'] . '</i></td>';
                        echo '<td style="padding-left:17px">' . $dong['gia'] . '</td>';
                        // echo '<td>'.$_SESSION['cart'][$dong['ID']].'</td>';
                        echo '<td><input class="form-control text-center" style="width:66px ;" value="' . $q . '" >
                                <a class="btn" href="themspgh.php?ID=' . $dong['ID'] . '" style="font-size: 20px;">+</a><a href="giamspgh.php?ID=' . $dong['ID'] . '" class="btn" style="font-size: 20px;">-</a>
                              </td>';
                        echo '<td style="padding-left: 75px;"> ' . $q * $dong['gia'] . '</td>';
                        echo '</tr>';
                        $tongtien = $tongtien + $_SESSION['cart'][$dong['ID']] * $dong['gia'];
                        $_SESSION['tongtien'] = $tongtien;
                        $_SESSION['tensp'] = $dong['ten'];
                    }
                    // <br><a href="xoaspgh.php?ID='.$dong['ID'].'" style="padding-top:2px;padding-bottom:2px;background-color:#BB0000" class="btn btn-warning">Xóa</a>
                } else {
                    echo '<tr>';
                    echo '<td></td>';
                    echo '<td>Chưa có sản phẩm</td>';
                    echo '<td></td>';
                    echo '</tr>';
                }

                ?>
            </tbody>

            <tfoot>

                <tr class="visible-xs">
                    <td></td>
                    <td class="text-center"><strong>Tổng 200.000 đ</strong>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <?php
                        echo '<a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Quay lại trang chủ</a>';
                        ?>
                    </td>
                    <td>
                        <?php
                        if (isset($_SESSION['tttc']))
                            echo 'Đơn hàng của bạn đang được xét duyệt';
                        ?>
                    </td>

                    <!-- tính tổng tiền -->


                    <td class="hidden-xs text-center">
                        <?php
                        if (isset($_SESSION['cart']))
                            echo '<strong>Tổng Tiền (VNĐ) <p id="tongtiensp">' . $tongtien . '</p></strong>';
                        ?>
                    </td>

                    <!-- nút thanh toán -->
                    <td>
                        <?php
                        if (isset($_SESSION['cart']))
                            echo '<a class="btn" href="thanhtoan.php" onclick="thanhtoan()"><button  class="btn btn-success btn-block" type="button">Thanh Toán</button></a>';
                        ?>
                    </td>
                </tr>


            </tfoot>
        </table>
    </div>




    <!-- <script>
        function tongtiensp() {

            let tiensp1 = Number(document.getElementById("tiensp1").value);
            let tiensp2 = Number(document.getElementById("tiensp2").value);
            let tiensp3 = Number(document.getElementById("tiensp3").value);
            let tiensp4 = Number(document.getElementById("tiensp4").value);
            let tiensp5 = Number(document.getElementById("tiensp5").value);
            let tiensp6 = Number(document.getElementById("tiensp6").value);

            let slsp1 = Number(document.getElementById("slsp1").value);
            let slsp2 = Number(document.getElementById("slsp2").value);
            let slsp3 = Number(document.getElementById("slsp3").value);
            let slsp4 = Number(document.getElementById("slsp4").value);
            let slsp5 = Number(document.getElementById("slsp5").value);
            let slsp6 = Number(document.getElementById("slsp6").value);

            let tiensanpham1;
            let tiensanpham2;
            let tiensanpham3;
            let tiensanpham4;
            let tiensanpham5;
            let tiensanpham6;

            //1
            if (slsp1 >= 0) {
                tiensanpham1 = parseInt(slsp1 * 25000);
                document.getElementById('tiensp1').innerHTML = tiensanpham1;
            } else {
                tiensanpham1 = parseInt(slsp1 * 0);
                document.getElementById('tiensp1').innerHTML = tiensanpham1;
            }
            //2
            if (slsp2 >= 0) {
                tiensanpham2 = parseInt(slsp2 * 27000);
                document.getElementById('tiensp2').innerHTML = tiensanpham2;
            } else {
                tiensanpham2 = parseInt(slsp2 * 0);
                document.getElementById('tiensp2').innerHTML = tiensanpham2;
            }
            //3
            if (slsp3 >= 0) {
                tiensanpham3 = parseInt(slsp3 * 25000);
                document.getElementById('tiensp3').innerHTML = tiensanpham3;
            } else {
                tiensanpham3 = parseInt(slsp3 * 0);
                document.getElementById('tiensp3').innerHTML = tiensanpham3;
            }
            //4
            if (slsp4 >= 0) {
                tiensanpham4 = parseInt(slsp4 * 17000);
                document.getElementById('tiensp4').innerHTML = tiensanpham4;
            } else {
                tiensanpham4 = parseInt(slsp4 * 0);
                document.getElementById('tiensp4').innerHTML = tiensanpham4;
            }
            //5
            if (slsp5 >= 0) {
                tiensanpham5 = parseInt(slsp5 * 23000);
                document.getElementById('tiensp5').innerHTML = tiensanpham5;
            } else {
                tiensanpham5 = parseInt(slsp5 * 0);
                document.getElementById('tiensp5').innerHTML = tiensanpham5;
            }
            //6
            if (slsp6 >= 0) {
                tiensanpham6 = parseInt(slsp6 * 20000);
                document.getElementById('tiensp6').innerHTML = tiensanpham6;
            } else {
                tiensanpham6 = parseInt(slsp6 * 0);
                document.getElementById('tiensp6').innerHTML = tiensanpham6;
            }


            let tongtiensp = parseInt(tiensanpham1 + tiensanpham2 + tiensanpham3 + tiensanpham4 + tiensanpham5 + tiensanpham6);
            document.getElementById('tongtiensp').innerHTML = tongtiensp;

        }

        function thanhtoan() {
            let slsp1 = Number(document.getElementById("slsp1").value);
            let slsp2 = Number(document.getElementById("slsp2").value);
            let slsp3 = Number(document.getElementById("slsp3").value);
            let slsp4 = Number(document.getElementById("slsp4").value);
            let slsp5 = Number(document.getElementById("slsp5").value);
            let slsp6 = Number(document.getElementById("slsp6").value);

            let tiensanpham1;
            let tiensanpham2;
            let tiensanpham3;
            let tiensanpham4;
            let tiensanpham5;
            let tiensanpham6;

            //1
            if (slsp1 >= 0) {
                tiensanpham1 = parseInt(slsp1 * 25000);
            } else {
                tiensanpham1 = parseInt(slsp1 * 0);
            }
            //2
            if (slsp2 >= 0) {
                tiensanpham2 = parseInt(slsp2 * 27000);
            } else {
                tiensanpham2 = parseInt(slsp2 * 0);
            }
            //3
            if (slsp3 >= 0) {
                tiensanpham3 = parseInt(slsp3 * 25000);
            } else {
                tiensanpham3 = parseInt(slsp3 * 0);
            }
            //4
            if (slsp4 >= 0) {
                tiensanpham4 = parseInt(slsp4 * 17000);
            } else {
                tiensanpham4 = parseInt(slsp4 * 0);
            }
            //5
            if (slsp5 >= 0) {
                tiensanpham5 = parseInt(slsp5 * 23000);
            } else {
                tiensanpham5 = parseInt(slsp5 * 0);
            }
            //6
            if (slsp6 >= 0) {
                tiensanpham6 = parseInt(slsp6 * 20000);
            } else {
                tiensanpham6 = parseInt(slsp6 * 0);
            }

            let tongtiensp = parseInt(tiensanpham1 + tiensanpham2 + tiensanpham3 + tiensanpham4 + tiensanpham5 + tiensanpham6);

            if (tongtiensp <= 0) {
                alert(" Bạn chưa chọn số lượng sản phẩm phù hợp \n Vui lòng chọn số lượng sản phẩm phù hợp để thanh toán !!! \n Xin cảm ơn !!!")
            } else {
                window.location = "http://localhost:3000/web1/index.php";
                alert(" Mua Hàng Trực Tuyến Thành Công Tại SWEET \n Đơn hàng sẽ được vận chuyển đến địa chỉ đăng kí sớm nhất có thể \n Cảm ơn quý khách !!!")
            }
        }
    </script> -->
</body>

</html>