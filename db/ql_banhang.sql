-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 22, 2026 lúc 05:05 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `maloai` varchar(50) NOT NULL,
  `tenloai` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`maloai`, `tenloai`) VALUES
('0', 'Phụ kiện'),
('1', 'iPhone'),
('2', 'Samsung'),
('3', 'OPPO');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(50) NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dongia` decimal(18,2) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `maloai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `dongia`, `hinhanh`, `maloai`) VALUES
(1, 'iPhone 17 Pro Max', 37990000.00, '17prm.jpeg', '1'),
(2, 'iPhone 17', 24990000.00, '17.jpeg', '1'),
(3, 'iPhone 16 Pro Max', 37590000.00, '16prm.jpeg', '1'),
(4, 'iPhone 16', 21090000.00, '16.png', '1'),
(5, 'iPhone 15 Pro Max', 34990000.00, '15prm.jpg', '1'),
(6, 'iPhone 15', 22990000.00, '15.png', '1'),
(7, 'OPPO A6 Pro', 8290000.00, 'oppoa6pro.jpg', '3'),
(8, 'OPPO Find X8 Pro 5G', 24450000.00, 'oppofindx8.jpg', '3'),
(9, 'OPPO Find X9 5G', 22990000.00, 'oppofindx9pro.jpg', '3'),
(10, 'OPPO Reno13 5G', 15700000.00, 'opporeno13.jpg', '3'),
(11, 'OPPO Reno15 Pro 5G', 31899000.00, 'opporeno15.jpg', '3'),
(12, 'Samsung Galaxy A06 5G', 4110000.00, 'samsunga06.jpg', '2'),
(13, 'Samsung Galaxy A17', 4690000.00, 'samsunga17.jpg', '2'),
(14, 'Samsung Galaxy Z Fold7 5G', 46990000.00, 'samsungfold7.jpg', '2'),
(15, 'Samsung Galaxy S25 Ultra 5G', 33380000.00, 'samsungs25ultra.jpg', '2'),
(16, 'Samsung Galaxy S26 Ultra 5G', 42990000.00, 'samsungs26ultra.png', '2'),
(17, 'Router Wifi Chuẩn Wifi 6 Totolink X6000R-V2', 1755000.00, 'phukien_routerwifi_totolink-x6000rv2.jpg', '0'),
(18, 'Bộ phát Wifi di động 4G LTE 300Mbps Totolink LR350', 1265000.00, 'phukien_wifididong4g-totolink-lr350.jpg', '0'),
(19, 'Router Wifi Chuẩn Wifi 6 Asus TUF Gaming AX4200', 3050000.00, 'phukien_routerwifi-wifi-6-asus-tuf-gaming-ax4200.jpg', '0'),
(20, 'Router Wifi Chuẩn Wifi 6 Asus TUF Gaming AX4200', 3050000.00, 'phukien_routerwifi-wifi-6-asus-tuf-gaming-ax4200.jpg', '0'),
(21, 'Ốp lưng MagSafe iPhone 17 Pro Max PC TPU XTREM Screen Smart-Image', 1990000.00, 'p-lng-magsafe-iphone-17-pro-max-pc-tpu-xtrem-screen-smart-image.jpg', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(5) NOT NULL COMMENT '1: quản lý, 2: Nhân viên, 3: Khách hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `role`) VALUES
(1, 'minhtrong', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(2, 'mt_nhanvien', 'c4ca4238a0b923820dcc509a6f75849b', 2),
(3, 'mt_khachhang', 'c4ca4238a0b923820dcc509a6f75849b', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `id` int(5) NOT NULL,
  `role` int(5) NOT NULL,
  `tenVT` varchar(255) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `Ghichu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`id`, `role`, `tenVT`, `MoTa`, `Ghichu`) VALUES
(1, 1, 'Admin xem được danh sách tài khoản, và Sản phẩm', 'Toàn quyền hệ thống', ''),
(2, 2, 'Quản lý sản phẩm', 'Chỉ quản lý sản phẩm và thương hiệu', ''),
(3, 3, 'Khách hàng', 'Người dùng mua hàng', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `FK_SanPham_LoaiSanPham` (`maloai`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`),
  ADD KEY `role_2` (`role`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_SanPham_LoaiSanPham` FOREIGN KEY (`maloai`) REFERENCES `loaisanpham` (`maloai`);

--
-- Các ràng buộc cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD CONSTRAINT `vaitro_ibfk_1` FOREIGN KEY (`role`) REFERENCES `user` (`role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
