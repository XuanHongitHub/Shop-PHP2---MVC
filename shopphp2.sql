-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 09, 2024 lúc 07:45 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopphp2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Quần'),
(2, 'Áo'),
(11, 'Váy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `CommentID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Content` varchar(255) DEFAULT NULL,
  `CommentDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `UnitPrice` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(50) DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Image` varchar(500) DEFAULT NULL,
  `Image_1` varchar(500) DEFAULT NULL,
  `Image_2` varchar(500) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `Price`, `Image`, `Image_1`, `Image_2`, `Description`, `Quantity`, `CategoryID`) VALUES
(26, 'Quần Tây', 1000.00, 'product1.jpg', 'product11.jpg', 'product9.jpg', 'Quần Tây đẹp chất lượng cao', 53, 1),
(40, 'Quần Tây 2', 1000.00, 'product2.jpg', 'product2.jpg', 'product3.jpg', 'Quần Tây đẹp chất lượng cao', 1, 1),
(41, 'Áo Sơ Mi', 800.00, 'product3.jpg', 'product3.jpg', 'product3.jpg', 'Áo Sơ Mi thoáng mát', 1, 1),
(42, 'Áo Len', 1200.00, 'product4.jpg', 'product.jpg', 'product1.jpg', 'Áo len ấm áp', 1, 1),
(43, 'Quần Jeans', 900.00, 'product5.jpg', 'product1.jpg', 'product2.jpg', 'Quần Jeans phong cách', 1, 1),
(44, 'Váy Dài', 1500.00, 'product6.jpg', 'product5.jpg', 'product6.jpg', 'Váy Dài nữ tính', 1, 1),
(45, 'Áo Khoác', 1800.00, 'product7.jpg', 'product6.jpg', 'productd9.jpg', 'Áo Khoác ấm áp', 1, 2),
(46, 'Giày Sneaker', 1200.00, 'product8.jpg', 'product11.jpg', 'product6.jpg', 'Giày Sneaker thời trang', 1, 2),
(47, 'Túi Xách', 1000.00, 'product6.jpg', 'product6.jpg', 'product6.jpg', 'Túi Xách phong cách', 1, 2),
(48, 'Áo Thun', 600.00, 'product10.jpg', 'product4.jpg', 'product8.jpg', 'Áo Thun thoáng mát', 1, 2),
(49, 'Quần Short', 700.00, 'product1.jpg', 'product3.jpg', 'product9.jpg', 'Quần Short thể thao', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(50) DEFAULT NULL,
  `Username` varchar(50) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`CustomerID`, `CustomerName`, `Username`, `Address`, `PhoneNumber`, `Email`, `Password`) VALUES
(1, 'Nguyễn Xuân Hồng', 'xuanhong', 'Đà Nẵng', '0839893573', 'hongnxpd09347@fpt.edu.vn', '123'),
(2, 'Nguyen Hong', 'admin', 'VN', '0839893573', 'hongnxpd09347@fpt.edu.vn', '$2y$10$s5AtzkdUVHKK37GSgKUA4eJuaMrews5GVESF7QhtiXl'),
(3, 'Nguyen Hong', 'xuanhong2', '09 Chơn Tâm 2', '0839893573', 'hongnxpd09347@fpt.edu.vn', '$2y$10$I0A02r28LDIvS7tjTpzu9uCJuBMFj0kmowg4OnvBoRq');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`CustomerID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `users` (`CustomerID`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `users` (`CustomerID`);

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `order` (`OrderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
