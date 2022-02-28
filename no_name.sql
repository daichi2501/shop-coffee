-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 01, 2021 lúc 07:30 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `no_name`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL,
  `hoTen` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` bit(1) DEFAULT NULL,
  `userName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `passWord` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `soDienThoai` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `diaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id_account`, `hoTen`, `dob`, `gender`, `userName`, `passWord`, `email`, `soDienThoai`, `diaChi`, `created_time`, `update_time`) VALUES
(1, 'Nguyễn Công Minh', '2000-07-07', b'1', 'CongMinh77', 'e10adc3949ba59abbe56e057f20f883e', 'congminh.se7en@gmail.com', '0949389572', 'Hà Nội', '2021-06-14 00:00:00', '2021-06-27 20:49:19'),
(2, 'Tô Xuân Kiên', '2000-05-26', b'1', 'XuanKien', 'e10adc3949ba59abbe56e057f20f883e', 'A32948@thanglong.edu.vn', '0970077070', 'Nam Định', '2021-06-14 00:00:00', '2021-06-26 14:54:12'),
(3, 'Đào Mạnh Hưng', '2005-06-09', NULL, 'Hung2k5', 'e10adc3949ba59abbe56e057f20f883e', 'A32636@thanglong.edu.vn', '0123456789', 'Hà Nội', '2021-06-16 10:15:52', '2021-06-16 10:15:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_role`
--

CREATE TABLE `account_role` (
  `id_account` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account_role`
--

INSERT INTO `account_role` (`id_account`, `id_role`) VALUES
(1, 1),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `title_cate` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `title_cate`, `created_time`, `update_time`) VALUES
(1, 'Laptop', '2021-05-20 22:04:35', '2021-05-20 22:04:35'),
(2, 'Máy tính', '2021-05-20 22:04:35', '2021-06-18 20:43:57'),
(3, 'Linh kiện', '2021-05-20 22:04:35', '2021-06-16 09:45:03'),
(6, 'Sản phẩm mới', '2021-06-26 21:17:07', '2021-06-26 21:17:12'),
(7, 'Bán chạy', '2021-06-26 21:17:20', '2021-06-26 21:17:20'),
(8, 'Giảm giá', '2021-06-26 21:17:33', '2021-06-27 09:32:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_account`
--

CREATE TABLE `order_account` (
  `id_order_account` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `recipient_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_account`
--

INSERT INTO `order_account` (`id_order_account`, `id_account`, `order_date`, `recipient_name`, `phone`, `receiver_address`, `note`) VALUES
(19, 1, '2021-06-29 12:36:41', 'Công Minh', '0949389572', 'Liên Hiệp, Phúc THọ, Hà Nội', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `id_order_account` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id_order_detail`, `id_order_account`, `id_product`, `amount`, `status`) VALUES
(59, 19, 4, 1, ''),
(60, 19, 4, 1, ''),
(61, 19, 3, 1, ''),
(62, 19, 4, 1, ''),
(63, 19, 3, 1, ''),
(64, 19, 1, 4, ''),
(65, 19, 4, 2, ''),
(66, 19, 1, 4, ''),
(67, 19, 4, 2, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `tenSanPham` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `thumnail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `id_category` int(11) NOT NULL,
  `discount` smallint(6) DEFAULT 0,
  `created_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `moTaSanPham` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `tenSanPham`, `thumnail`, `price`, `id_category`, `discount`, `created_time`, `update_time`, `moTaSanPham`) VALUES
(1, 'Macbook Pro 2020 MWP72SA/A (Silver)', 'Macbook-Pro-2020-MWP72SAA-Silver-1-2-600x600.jpg', 46590000, 1, 0, '2021-06-13 22:12:23', '2021-06-17 20:46:36', 'Màn hình Retina 13.3 inch mang đến góc nhìn rộng;\r\nTích hợp công nghệ màn hình IPS chống chói hiệu quả;\r\nCông nghệ màn hình True Tone hiển thị màu sắc chuẩn xác;\r\nCPU Intel core i5 thế hệ 10 xử thông tin trong thời gian ngắn;\r\nTouch ID đăng nhập bằng dấu vân tay, bảo mật tuyệt đối;\r\nSử dụng bộ vi xử lý đồ họa cao cấp Intel Iris Plus Graphics;\r\nỔ cứng SSD 512GB cho khả năng tải phần mềm nhanh chóng;\r\nTrang bị 4 cổng USB cho khả năng truyền thông tin tối đa.'),
(3, 'Acer Nitro 5', 'acer_nitro_5.png', 28000000, 1, 0, '2021-06-16 13:22:16', '2021-06-27 15:45:47', 'CPU	AMD: Ryzen 5 5600H 3.3GHz up to 4.2GHz 16MB;\r\nRAM: 8GB DDR4 3200MHz (2x SO-DIMM socket, up to 32GB SDRAM);\r\nỔ cứng: 512GB SSD M.2 PCIE (Còn trống 1 khe SSD M.2 PCIE và 1 khe 2.5\" SATA);\r\nCard đồ họa: NVIDIA GeForce GTX 1650 4GB GDDR6;\r\nMàn hình: 15.6\" FHD (1920 x 1080) IPS, 144Hz, Acer ComfyViewTM LED-backlit TFT LCD.'),
(4, 'Laptop Asus Zenbook UX434FLC-A6143T', '1-130-1-600x600.jpg', 24599000, 1, 0, '2021-06-18 18:25:06', '2021-06-18 18:25:06', 'Hãng sản xuất: ASUS;\r\nTình trạng: mới 100%;\r\nBảo hành: 24 tháng;\r\nMô hình: UX434FLC-A6143T;\r\nMàu sắc: Royal Blue;\r\nBộ xử lý: Intel Core i5-10210U 1.6GHz up to 4.2GHz 6MB;\r\nRam: 8GB LPDDR3 2133MHz (Onboard);\r\nVGA: NVIDIA® GeForce® MX250 2GB GDDR5;\r\nỔ cứng: 512GB SSD M.2 PCIE G3X2.'),
(5, 'Apple Mac mini 2020', 'Máy-tính-đồng-bộ-Apple-Mac-mini-MXNG2SAA_2-600x600.jpg', 29999000, 2, 0, '2021-06-18 21:21:06', '2021-06-18 21:21:06', 'Hãng sản xuất: Apple;\r\nChủng loại: Mac Mini;\r\nPart Number: MXNG2SA/A;\r\nBộ vi xử lý: Intel Core i5 3.0Ghz / Turbo boost upto 4.6Ghz/9MB cache;\r\nBộ nhớ trong: 8GB DDR4 2666Mhz;\r\nVGA: Intel UHD 630;\r\nỔ cứng: 512GB SSD;\r\nỔ quang: No;\r\nGiao tiếp mạng: Gigabit;\r\nGiao tiếp không dây:  802.11ac , Bluetooth 5.0;\r\nCổng giao tiếp: 2 x USB 3.0,1 x LAN(RJ45),4 x ThunderBolt 3 (USB type C),1 x HDMI 2.0;\r\nCân nặng: 1.3kg;\r\nHệ điều hành: Mac OS X;\r\nBảo hành: 12 tháng.'),
(6, 'Máy tính Intel NUC 11 RNUC11PHKi7CAA2', '1.1-6-600x600.jpg', 32000000, 2, 0, '2021-06-22 17:36:48', '2021-06-22 17:36:48', 'Bộ vi xử lý: Intel® Core™ i7-1165G7 Processor (12M Cache, up to 4.70 GHz);\r\nBộ nhớ: 2x 8GB DDR4-3200 RAM;\r\nCard đồ họa: VGA onboard Intel® Iris® Xe Graphics and Nvidia Geforce RTX 2060;\r\nỔ cứng: Intel Optane Memory H10 (32GB + 512GB) Solid State Storage;\r\nGiao tiếp mạng: Gigabit LAN + Wifi;\r\nCổng giao tiếp: 3x front (2x Type-A, 1x Type-C) and 5x rear USB 3.1 (4x Type-A, 1x Type-C); 2x USB 2.0 via internal headers;\r\nKiểu dáng: Case siêu nhỏ;\r\nHệ điều hành: Dos;\r\nBảo hành: 36 tháng.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'Admin'),
(2, 'Khách'),
(3, 'Nhân viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `action` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `report` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `stock`
--

INSERT INTO `stock` (`id_stock`, `id_product`, `amount`, `action`, `created_time`, `update_time`, `report`) VALUES
(2, 4, 10, 'Nhập hàng', '2021-06-19 10:18:30', '2021-06-19 10:21:08', 'Hàng xịn mới về'),
(3, 3, 15, 'Nhập hàng', '2021-06-19 09:35:30', '2021-06-19 10:29:04', 'Máy tính hot'),
(4, 4, 10, 'Nhập hàng', '2021-06-19 10:23:09', '2021-06-19 10:23:09', 'Mới nhập'),
(5, 1, 100, 'Nhập hàng', '2021-06-19 10:28:28', '2021-06-19 10:28:28', ''),
(6, 4, 100, 'Nhập hàng', '2021-06-19 10:42:12', '2021-06-19 10:42:12', 'thêm hàng mới'),
(7, 5, 10, 'Nhập hàng', '2021-06-19 10:44:48', '2021-06-19 10:44:48', 'Máy đắt nhập ít'),
(8, 4, 10, 'Xuất hàng', '2021-06-19 10:47:42', '2021-06-19 10:47:42', 'thanh lý sản phẩm gấp'),
(10, 3, 5, 'Xuất hàng', '2021-06-26 22:47:35', '2021-06-26 22:47:35', 'Khách mua');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `soDienThoai` (`soDienThoai`);

--
-- Chỉ mục cho bảng `account_role`
--
ALTER TABLE `account_role`
  ADD PRIMARY KEY (`id_account`,`id_role`),
  ADD KEY `fk_role` (`id_role`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `order_account`
--
ALTER TABLE `order_account`
  ADD PRIMARY KEY (`id_order_account`),
  ADD KEY `fk_order_account` (`id_account`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order_detail`),
  ADD KEY `fk_order_account_detail` (`id_order_account`),
  ADD KEY `fk_order_product_detail` (`id_product`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_category` (`id_category`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Chỉ mục cho bảng `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `fk_stock` (`id_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `order_account`
--
ALTER TABLE `order_account`
  MODIFY `id_order_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account_role`
--
ALTER TABLE `account_role`
  ADD CONSTRAINT `fk_account_role` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`),
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Các ràng buộc cho bảng `order_account`
--
ALTER TABLE `order_account`
  ADD CONSTRAINT `fk_order_account` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_order_account_detail` FOREIGN KEY (`id_order_account`) REFERENCES `order_account` (`id_order_account`),
  ADD CONSTRAINT `fk_order_product_detail` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Các ràng buộc cho bảng `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
