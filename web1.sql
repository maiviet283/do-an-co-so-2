-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 09, 2024 lúc 10:06 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `ID` int(11) NOT NULL,
  `username` varchar(33) NOT NULL,
  `ten` varchar(33) NOT NULL,
  `noidung` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`ID`, `username`, `ten`, `noidung`) VALUES
(1, 'tfboys2016', 'Mai Quốc Việt', 'Cuối tuần hẹn bạn bè uống trà sữa chém gió thì còn gì tuyệt vời hơn. Dưới đây là những câu stt trà sữa cực hay và hài hước, hãy chia sẻ với bạn bè và người thân để cùng nhau biết đến loại nước uống này nhé. Một thức uống ngon – bổ – rẻ hấp dẫn nhiều người.'),
(39, 'maiviet', 'Việt Nam', 'Cuối tuần hẹn bạn bè uống trà sữa chém gió thì còn gì tuyệt vời hơn. Dưới đây là những câu stt trà sữa cực hay và hài hước, hãy chia sẻ với bạn bè và người thân để cùng nhau biết đến loại nước uống này nhé. Một thức uống ngon – bổ – rẻ hấp dẫn nhiều người. 123'),
(45, '1', 'Đồ án', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cc`
--

CREATE TABLE `cc` (
  `ID` int(11) NOT NULL,
  `username` varchar(33) NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `trangthai` varchar(33) NOT NULL,
  `duyet` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cc`
--

INSERT INTO `cc` (`ID`, `username`, `sdt`, `diachi`, `ten`, `soluong`, `gia`, `trangthai`, `duyet`) VALUES
(11, 'admin', 705975416, 'kda', 'Trà Sữa Matcha', 1, 25000, 'Đơn Hàng đang được vận chuyển', 'Thành Công'),
(12, 'q', 705975416, 'Kỳ khang - Kỳ Anh - Hà Tĩnh', 'Trà Sữa Khoai Môn', 3, 81000, 'Đơn Hàng đang được vận chuyển', 'Thành Công'),
(13, 'q', 705975416, 'Kỳ khang - Kỳ Anh - Hà Tĩnh', 'Trà Sữa Hoa Đậu Biếc', 1, 23000, 'Đơn Hàng đang được vận chuyển', 'Thành Công'),
(14, 'q', 705975416, 'Kỳ khang - Kỳ Anh - Hà Tĩnh', 'Trà Sữa Hoa Đậu Biếc', 4, 92000, 'Đơn Hàng đang được vận chuyển', 'Thành Công'),
(15, 'q', 123, 'i dont know', 'Trà Sữa Trân Châu', 1, 250001, 'Đang xét duyệt', 'Duyệt'),
(16, 'q', 123, 'i dont know', 'Trà Sữa Khoai Môn', 3, 804003, 'Đơn Hàng đang được vận chuyển', 'Thành Công'),
(17, 'q', 123, 'i dont know', 'Trà Sữa Khoai Môn', 2, 804003, 'Đơn Hàng đang được vận chuyển', 'Thành Công'),
(18, 'q', 123, 'i dont know', 'Trà Sữa Than Tre', 2, 44400, 'Đang xét duyệt', 'Duyệt'),
(19, 'q', 123, 'i dont know', 'Trà Sữa Than Tre', 2, 294401, 'Đang xét duyệt', 'Duyệt'),
(20, 'q', 123, 'i dont know', 'Trà Sữa Than Tre', 1, 294401, 'Đang xét duyệt', 'Duyệt'),
(21, 'q', 12333, 'i dont know', 'Trà Sữa Khoai Môn', 1, 27000, 'Đang xét duyệt', 'Duyệt'),
(22, 'q', 12333, 'i dont know', 'Trà Sữa Hoa Đậu Biếc', 19, 437000, 'Đang xét duyệt', 'Duyệt'),
(23, 'q', 12333, 'i dont know', 'Trà Sữa Hoa Đậu Biếc', 19, 437000, 'Đơn Hàng đang được vận chuyển', 'Thành Công'),
(24, 'q', 12333, 'i dont know', 'Trà Sữa Hoa Đậu Biếc', 19, 437000, 'Đang xét duyệt', 'Duyệt'),
(25, 'q', 12333, 'i dont know', 'Trà Sữa Trân Châu', 4, 1000004, 'Đơn Hàng đang được vận chuyển', 'Thành Công'),
(26, 'q', 12333, 'i dont know', 'Trà Sữa Trân Châu', 2, 500002, 'Đang xét duyệt', 'Duyệt'),
(27, '1', 1, '1', 'Trà Sữa Trân Châu', 3, 750003, 'Đơn Hàng đang được vận chuyển', 'Thành Công'),
(28, 'tfboys2016', 2147483647, 'Kỳ khang - Kỳ Anh - Hà Tĩnh', 'Trà Sữa Trân Châu', 2, 500002, 'Đang xét duyệt', 'Duyệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `ID` int(11) NOT NULL,
  `iddonhang` int(11) NOT NULL,
  `idhanghoa` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ID`, `iddonhang`, `idhanghoa`, `soluong`) VALUES
(23, 58, 1, 1),
(24, 72, 2, 2),
(25, 73, 2, 2),
(26, 74, 2, 2),
(27, 75, 2, 2),
(28, 76, 2, 2),
(29, 77, 2, 2),
(30, 78, 2, 2),
(31, 79, 2, 2),
(32, 80, 2, 2),
(33, 81, 2, 2),
(34, 82, 2, 2),
(35, 83, 2, 2),
(36, 84, 6, 1),
(37, 85, 6, 1),
(38, 86, 6, 1),
(39, 87, 6, 1),
(40, 101, 6, 1),
(41, 102, 6, 1),
(42, 103, 6, 1),
(43, 104, 6, 1),
(44, 105, 6, 1),
(45, 106, 6, 1),
(46, 106, 5, 2),
(47, 107, 1, 1),
(48, 108, 1, 3),
(49, 109, 5, 1),
(50, 110, 3, 1),
(51, 111, 2, 3),
(52, 112, 5, 1),
(53, 113, 5, 4),
(54, 114, 1, 1),
(55, 115, 1, 3),
(56, 115, 2, 2),
(57, 116, 6, 2),
(58, 117, 6, 2),
(59, 117, 1, 1),
(60, 118, 2, 1),
(61, 119, 5, 19),
(62, 120, 5, 19),
(63, 121, 5, 19),
(64, 122, 1, 4),
(65, 123, 1, 2),
(66, 124, 1, 3),
(67, 125, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `ID` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `trangthai` varchar(30) NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`ID`, `iduser`, `trangthai`, `tongtien`) VALUES
(73, 1, 'Moi', 54000),
(74, 1, 'Moi', 54000),
(75, 1, 'Moi', 54000),
(95, 82, 'Moi', 22200),
(96, 82, 'Moi', 22200),
(97, 82, 'Moi', 22200),
(98, 82, 'Moi', 22200),
(99, 82, 'Moi', 22200),
(100, 82, 'Moi', 22200),
(101, 82, 'Moi', 22200),
(102, 82, 'Moi', 22200),
(103, 82, 'Moi', 22200),
(104, 82, 'Moi', 22200),
(105, 82, 'Moi', 22200),
(106, 82, 'Moi', 68200),
(107, 1, 'Moi', 25000),
(108, 1, 'Moi', 75000),
(109, 82, 'Moi', 23000),
(110, 1, 'Moi', 25000),
(111, 82, 'Moi', 81000),
(112, 82, 'Moi', 23000),
(113, 82, 'Moi', 92000),
(114, 85, 'Moi', 250001),
(115, 85, 'Moi', 804003),
(116, 85, 'Moi', 44400),
(117, 85, 'Moi', 294401),
(118, 85, 'Moi', 27000),
(119, 85, 'Moi', 437000),
(120, 85, 'Moi', 437000),
(121, 85, 'Moi', 437000),
(122, 85, 'Moi', 1000004),
(123, 85, 'Moi', 500002),
(124, 0, 'Moi', 750003),
(125, 75, 'Moi', 500002);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `ID` int(11) NOT NULL,
  `ten` varchar(33) NOT NULL,
  `noidung` varchar(99) NOT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`ID`, `ten`, `noidung`, `gia`) VALUES
(1, 'Trà Sữa Trân Châu', 'Trân châu trắng đặc biệt được làm theo công thức gia truyền', 250001),
(2, 'Trà Sữa Khoai Môn', 'Khoai Môn được nhập khẩu từ rừng Amazone về', 27000),
(3, 'Trà Sữa Matcha', 'Được các nhà khoa học kiểm chứng ngon bổ rẻ', 25000),
(4, 'Trà Sữa Sương Sáo', 'Cấu tạo từ những giọt sương trên hoa hồng vào sáng sớm', 17000),
(5, 'Trà Sữa Hoa Đậu Biếc', 'Nhập khẩu từ niu di lân về nha bà con', 23000),
(6, 'Trà Sữa Than Tre', 'Than tre có nhiều cacbon nên khi uống sẽ giúp trắng răng hơn', 22200),
(14, 'Nokia', '123456789', 123),
(16, 'Việt Bờ rồ 123', 'Việt Bờ rồ 123', 12345);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hotro`
--

CREATE TABLE `hotro` (
  `ID` int(11) NOT NULL,
  `username` varchar(33) NOT NULL,
  `email` varchar(33) NOT NULL,
  `noidungemail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hotro`
--

INSERT INTO `hotro` (`ID`, `username`, `email`, `noidungemail`) VALUES
(4, 'q', 'maiviet267@gmail.com', 'Tôi cần khắc phục lỗi mua hàng hóa'),
(5, 'q', 'duykhoa20092009@gmail.com', 'Thông tin của tôi không hợp lệ và tôi muốn sửa nó'),
(13, 'maiviet', 'vietmq.21it@vku.udn.vn', 'tôi muốn abc123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `ID` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(35) NOT NULL,
  `sdt` bigint(20) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `lever` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`ID`, `username`, `password`, `sdt`, `diachi`, `lever`) VALUES
(0, '1', '1', 1, '1', 0),
(1, 'admin', 'admin', 7059754161, 'Kỳ khang - Kỳ Anh - Hà Tĩnh', 1),
(75, 'tfboys2016', 'bigdreamer1', 7059754161, 'Kỳ khang - Kỳ Anh - Hà Tĩnh', 0),
(85, 'q', 'q', 12333, 'i dont know', 0),
(86, 'vietdava123', 'vietdava123', 1241245, 'vietdava', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `cc`
--
ALTER TABLE `cc`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `hotro`
--
ALTER TABLE `hotro`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `cc`
--
ALTER TABLE `cc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `hotro`
--
ALTER TABLE `hotro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
