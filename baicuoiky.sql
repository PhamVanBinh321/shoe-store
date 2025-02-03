-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 03, 2025 lúc 07:59 AM
-- Phiên bản máy phục vụ: 8.0.34
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `baicuoiky`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `size` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `size`, `created_at`) VALUES
(16, 2, 38, 1, 39, '2024-11-20 06:27:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Giày thể thao', 'Giày thể thao, thích hợp cho các hoạt động ngoài trời hoặc tập luyện.', '2024-10-22 01:28:34'),
(2, 'Giày thời trang', 'Giày da, giày tây lịch sự cho các dịp trang trọng.', '2024-10-22 01:28:34'),
(3, 'Dép', 'Dép, sandal thoải mái và nhẹ nhàng.', '2024-10-22 01:28:34'),
(4, 'Boots', 'Giày boots phù hợp với thời tiết lạnh và phong cách thời trang mạnh mẽ.', '2024-10-22 01:28:34'),
(5, 'Running Shoes', 'Giày chạy bộ, thiết kế nhẹ và thoải mái cho các vận động viên chạy bộ nhiều.', '2024-10-22 01:28:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ratings` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `comment`, `ratings`, `created_at`) VALUES
(26, 51, 1, 'm', 5, '2024-10-27 09:12:28'),
(27, 51, 1, 'l', 3, '2024-10-27 09:13:31'),
(28, 2, 2, 'a', 5, '2024-10-28 18:13:58'),
(29, 2, 2, 'a', 4, '2024-10-29 08:42:11'),
(30, 53, 2, 't', 5, '2024-10-29 12:33:31'),
(31, 55, 2, 'xấu', 1, '2024-10-29 12:33:42'),
(32, 58, 2, 'good', 5, '2025-02-03 06:30:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `status` enum('chờ duyệt','hoàn thành','hủy') CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'chờ duyệt',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `created_at`) VALUES
(8, 2, 910, 'hủy', '2024-11-18 15:06:07'),
(9, 2, 550, 'chờ duyệt', '2024-11-18 15:08:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `size` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `size`) VALUES
(22, 8, 5, 1, 550, 38),
(23, 8, 2, 2, 180, 39),
(24, 9, 5, 1, 550, 41);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `category_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `category_id`, `created_at`) VALUES
(1, 'Nike Air Max 270', 'Mẫu giày thể thao phổ biến với thiết kế đế khí đặc trưng.', 150, '../images/product-10.jpg', 1, '2024-10-22 01:31:57'),
(2, 'Adidas Ultraboost 21', 'Giày chạy bộ với đế Boost, mang lại độ đàn hồi tối ưu, thoải mái.', 180, '../images/product-10.jpg', 5, '2024-10-22 01:31:57'),
(3, 'Vans Old Skool', 'Giày thể thao cổ điển với thiết kế sọc trắng quen thuộc.', 60, '../images/product-10.jpg', 1, '2024-10-22 01:31:57'),
(5, 'Gucci Leather Loafers', 'Giày da cao cấp với thiết kế sang trọng và tinh tế.', 550, '../images/product-10.jpg', 2, '2024-10-22 01:31:57'),
(6, 'Birkenstock Arizona', 'Dép sandal với thiết kế đơn giản và thoải mái.', 80, '../images/product-10.jpg', 3, '2024-10-22 01:31:57'),
(7, 'New Balance 1080v11', 'Giày chạy bộ với phần đế đệm mềm mại, thiết kế nhẹ nhàng.', 140, '../images/product-10.jpg', 5, '2024-10-22 01:31:57'),
(34, 'Nike Air Max 270', 'Mẫu giày thể thao phổ biến với thiết kế đế khí đặc trưng.', 150, '../images/product-12.jpg', 1, '2024-10-22 02:39:28'),
(35, 'Adidas Ultraboost 21', 'Giày chạy bộ với đế Boost, mang lại độ đàn hồi tối ưu.', 180, '../images/product-12.jpg', 5, '2024-10-22 02:39:28'),
(36, 'Vans Old Skool', 'Giày thể thao cổ điển với thiết kế sọc trắng quen thuộc.', 60, '../images/product-12.jpg', 1, '2024-10-22 02:39:28'),
(38, 'Gucci Leather Loafers', 'Giày da cao cấp với thiết kế sang trọng và tinh tế.', 550, '../images/product-12.jpg', 2, '2024-10-22 02:39:28'),
(39, 'Birkenstock Arizona', 'Dép sandal với thiết kế đơn giản và thoải mái.', 80, '../images/product-12.jpg', 3, '2024-10-22 02:39:28'),
(40, 'New Balance 1080v11', 'Giày chạy bộ với phần đế đệm mềm mại, thiết kế nhẹ nhàng.', 140, '../images/product-12.jpg', 5, '2024-10-22 02:39:28'),
(41, 'Puma RS-X', 'Giày thể thao mang phong cách retro với đệm tốt.', 110, '../images/product-12.jpg', 1, '2024-10-22 02:39:28'),
(42, 'Under Armour HOVR Phantom', 'Giày chạy bộ với công nghệ đệm HOVR giúp tăng hiệu suất.', 140, '../images/product-12.jpg', 5, '2024-10-22 02:39:28'),
(43, 'Reebok Classic Leather', 'Giày thể thao cổ điển với chất liệu da cao cấp.', 75, '../images/product-12.jpg', 1, '2024-10-22 02:39:28'),
(44, 'ASICS Gel-Kayano 27', 'Giày chạy bộ được thiết kế hỗ trợ tối đa cho đôi chân.', 160, '../images/product-12.jpg', 5, '2024-10-22 02:39:28'),
(45, 'Converse Chuck Taylor All Star', 'Giày thể thao cổ điển với thiết kế đơn giản, phù hợp với mọi phong cách.', 50, '../images/product-12.jpg', 1, '2024-10-22 02:39:28'),
(46, 'Fendi Slingbacks', 'Giày cao gót thời trang với thiết kế sang trọng.', 700, '../images/product-12.jpg', 2, '2024-10-22 02:39:28'),
(47, 'Crocs Classic Clogs', 'Dép đi tiện lợi với thiết kế thoáng khí, dễ dàng vệ sinh.', 40, '../images/product-12.jpg', 3, '2024-10-22 02:39:28'),
(48, 'Balenciaga Triple S', 'Giày sneaker với kiểu dáng mạnh mẽ, phong cách streetwear.', 850, '../images/product-12.jpg', 1, '2024-10-22 02:39:28'),
(49, 'Mizuno Wave Rider 24', 'Giày chạy bộ với công nghệ sóng giúp tăng cường độ ổn định.', 130, '../images/product-12.jpg', 5, '2024-10-22 02:39:28'),
(50, 'Hoka One One Clifton 7', 'Giày chạy bộ với đệm dày, giúp êm ái khi chạy.', 150, '../images/product-12.jpg', 5, '2024-10-22 02:39:28'),
(51, 'Skechers GOwalk 5', 'Giày đi bộ nhẹ nhàng, thiết kế thoải mái.', 90, '../images/product-12.jpg', 3, '2024-10-22 02:39:28'),
(53, 'Toms Classics', 'Giày slip-on với thiết kế đơn giản và thoải mái.', 55, '../images/product-12.jpg', 3, '2024-10-22 02:39:28'),
(54, 'Salomon Speedcross 5', 'Giày chạy trail với độ bám tốt trên mọi địa hình.', 130, '../images/product-12.jpg', 5, '2024-10-22 02:39:28'),
(55, 'On Cloudstratus', 'Giày chạy bộ với công nghệ CloudTec giúp giảm sốc.', 160, '../images/product-12.jpg', 5, '2024-10-22 02:39:28'),
(56, 'Nike React Infinity Run', 'Giày chạy bộ với thiết kế tối ưu cho độ bền và thoải mái.', 160, '../images/product-12.jpg', 5, '2024-10-22 02:39:28'),
(57, 'Adidas Superstar', 'Giày thể thao cổ điển với thiết kế shell toe đặc trưng.', 85, '../images/product-12.jpg', 1, '2024-10-22 02:39:28'),
(58, 'Louis Vuitton Sneaker', 'Giày sneaker sang trọng,độc quyền của Louis Vuitton.', 1000, '../images/product-12.jpg', 2, '2024-10-22 02:39:28'),
(61, 'new', 'a', 56, '../images/407019517_1098908174576339_5128903936425317091_n.png', 1, '2024-11-20 05:59:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `created_at`) VALUES
(1, 58, '../images/product-3.jpg', '2024-10-22 08:34:35'),
(2, 58, '../images/product-3.jpg', '2024-10-22 08:34:35'),
(3, 58, '../images/product-3.jpg', '2024-10-22 08:34:35'),
(4, 58, '../images/product-3.jpg', '2024-10-22 08:34:35'),
(5, 61, '../images/360_F_101059744_v3iOQuoEiSyUxcgiILvDzWprTkShqd7c.jpg', '2024-11-20 05:59:27');

--
-- Bẫy `product_images`
--
DELIMITER $$
CREATE TRIGGER `before_insert_product_image` BEFORE INSERT ON `product_images` FOR EACH ROW BEGIN
    DECLARE image_count INT;

    -- Đếm số lượng hình ảnh hiện tại của sản phẩm
    SELECT COUNT(*) INTO image_count FROM product_images WHERE product_id = NEW.product_id;

    -- Nếu số lượng hình ảnh đã đạt 4, thì ngăn không cho phép thêm hình ảnh mới
    IF image_count >= 4 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Sản phẩm này đã có tối đa 4 hình ảnh';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'binh', '123@gmail.com', '$2y$10$36he1MHN0o3cJMeIfxBROutGt0xdIUWepzFFibufGUF4ZPwa43/Rq', '2024-10-14 02:48:51'),
(2, 'binh2', '2@22', '$2y$10$DagX6ADevqI4dknrZyf.v.JuWLF6r7t3wPrkdmAW7nCbq2xmrwFVy', '2024-10-15 05:44:18'),
(5, 'binh3', '3@gmail.com', '$2y$10$gGNNgYa2z12M3fFYfNsvuexCAeHjtS8XUpjPXYuW8s/YA2adNhDpy', '2024-10-28 18:40:21'),
(6, 'binh4', 'abv@gmail.com', '$2y$10$gc30P1sFKMihKZ1lwXWkbOEgEHBSpjS28K.IpIHmb81WL5CJshYOu', '2024-10-29 14:53:24'),
(7, 'binh5', 'afss@gmail.com', '$2y$10$oWBBmIeERLxJ17jTedtwO.sBCFNYDyCb0oNVUAS17iAyO0GmQ1NUy', '2024-10-29 14:54:24'),
(8, 'binh6', 'afd@gmail.com', '$2y$10$kw9KNvYmEh9PADjgBIHs.OpFq/njZvb7fp2HgrjCKfFI0WoMXmU8C', '2024-10-29 14:55:14'),
(9, 'binh7', 'fsfff@gmail.com', '$2y$10$gGfHbwn1HU9QdtJNEbCjYuAKnWUaeFF85.py.YIpgzx86RPlzcHzu', '2024-10-29 14:57:08'),
(10, 'binh8', 'fsdafa@gmail.com', '$2y$10$MfJwylihnNO6xJqJk1L0ZuPRelNk1i0keTxTTDcrrP1Tlc7Bs6S0.', '2024-10-29 15:05:22'),
(11, 'binh9', 'fafaf@gmail.com', '$2y$10$lOzBX/NnqD2e9cJZ.RgOeual.H71d8aRHFSZPjCAcDL5fpEAvVx/e', '2024-10-29 15:07:21'),
(12, 'binh10', 'fsfaf@gmail.com', '$2y$10$HdK3QKLgFvgeIAE6NO9z6.9Q6RUgiGJHsUYlQqh4.ysOvP/AcCViO', '2024-10-29 15:15:32'),
(13, 'binh11', 'ffff@gmail.com', '$2y$10$iNTb60ZEGOVcAaOxd.7W3.J8gHPa88GF5SmmYXgKnD/fy.g3KlpNO', '2024-10-29 16:17:21'),
(14, 'binh12', 'luilhul@gmail.com', '$2y$10$oZ26ncsRfS62Wvg9Kcj.tuXaM5taCv4PnFdvd3ZFVF9EvPWGn.JWa', '2024-11-01 16:05:09'),
(15, 'binh15', 'ngubinh40@gmail.com', '$2y$10$CsWe8kykQ1BS.Tn2iIQgJOF9woZKe6GLyt8qL49YR8gxTbEjS..s2', '2024-11-02 10:06:55'),
(16, 'admin', 'A@mmm.com', '$2y$10$ZddgcBUl85k8tqotMNgYY.Hnlp2dqU70x5lnZau0Yyr.KIeyzcHn2', '2024-11-18 15:11:43');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_userid_cart` (`user_id`),
  ADD KEY `lk_productid_cart` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_products_comment` (`product_id`),
  ADD KEY `lk_userid_comment` (`user_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_userid_orders` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_orderid_order-items` (`order_id`),
  ADD KEY `lk_productid_orderitems` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_products_categories` (`category_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `lk_productid_cart` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_userid_cart` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `lk_products_comment` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_userid_comment` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `lk_userid_orders` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `lk_orderid_order-items` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_productid_orderitems` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `lk_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
