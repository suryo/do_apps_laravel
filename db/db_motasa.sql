/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : db_motasa

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 21/04/2024 20:35:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for brands
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_brand` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of brands
-- ----------------------------
INSERT INTO `brands` VALUES (1, 'Brand A', 'Active', 'false', '2024-04-20 12:52:45', '2024-04-20 12:52:45');
INSERT INTO `brands` VALUES (2, 'Brand B', 'Active', 'false', '2024-04-20 12:52:45', '2024-04-20 12:52:45');
INSERT INTO `brands` VALUES (3, 'Brand C', 'Inactive', 'false', '2024-04-20 12:52:45', '2024-04-20 12:52:45');

-- ----------------------------
-- Table structure for carts
-- ----------------------------
DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `total` int NOT NULL,
  `deleted` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of carts
-- ----------------------------
INSERT INTO `carts` VALUES (1, 1, 1, 3, 300, 'true', '2024-04-20 06:42:01', '2024-04-21 09:39:17');
INSERT INTO `carts` VALUES (2, 1, 4, 4, 480, 'true', '2024-04-20 06:50:05', '2024-04-21 09:39:17');
INSERT INTO `carts` VALUES (3, 1, 6, 1, 220, 'true', '2024-04-21 06:15:27', '2024-04-21 09:39:17');
INSERT INTO `carts` VALUES (4, 1, 9, 1, 210, 'true', '2024-04-21 08:12:43', '2024-04-21 09:39:17');
INSERT INTO `carts` VALUES (5, 1, 9, 2, 420, 'true', '2024-04-21 12:03:37', '2024-04-21 12:39:16');
INSERT INTO `carts` VALUES (6, 1, 10, 3, 420, 'true', '2024-04-21 12:04:05', '2024-04-21 12:39:16');
INSERT INTO `carts` VALUES (7, 1, 20, 5, 1050, 'true', '2024-04-21 12:45:23', '2024-04-21 12:45:55');
INSERT INTO `carts` VALUES (8, 1, 15, 1, 240, 'true', '2024-04-21 12:45:33', '2024-04-21 12:45:55');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2024_04_20_051828_create_brands_table', 1);
INSERT INTO `migrations` VALUES (6, '2024_04_20_052150_create_product_categories_table', 1);
INSERT INTO `migrations` VALUES (7, '2024_04_20_052217_create_products_table', 1);
INSERT INTO `migrations` VALUES (8, '2024_04_20_052317_create_orders_table', 1);
INSERT INTO `migrations` VALUES (9, '2024_04_20_052345_create_order_details_table', 1);
INSERT INTO `migrations` VALUES (10, '2024_04_20_061604_create_carts_table', 2);

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomerorder` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idproduct` bigint UNSIGNED NOT NULL,
  `hargaproduk` int NOT NULL,
  `qty` int NOT NULL,
  `subtotalproduk` int NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `review` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES (1, '21042024091236', 1, 100, 3, 300, '-', '-', NULL, 'false', '2024-04-21 09:12:44', '2024-04-21 09:12:44');
INSERT INTO `order_details` VALUES (2, '21042024091236', 2, 120, 4, 480, '-', '-', NULL, 'false', '2024-04-21 09:12:44', '2024-04-21 09:12:44');
INSERT INTO `order_details` VALUES (3, '21042024091236', 3, 220, 1, 220, '-', '-', NULL, 'false', '2024-04-21 09:12:44', '2024-04-21 09:12:44');
INSERT INTO `order_details` VALUES (4, '21042024091236', 4, 210, 1, 210, '-', '-', NULL, 'false', '2024-04-21 09:12:44', '2024-04-21 09:12:44');
INSERT INTO `order_details` VALUES (5, '21042024123545', 5, 210, 2, 420, '-', '-', NULL, 'false', '2024-04-21 12:35:51', '2024-04-21 12:35:51');
INSERT INTO `order_details` VALUES (6, '21042024123545', 6, 140, 3, 420, '-', '-', NULL, 'false', '2024-04-21 12:35:51', '2024-04-21 12:35:51');
INSERT INTO `order_details` VALUES (7, '21042024124552', 7, 210, 5, 1050, '-', '-', NULL, 'false', '2024-04-21 12:45:55', '2024-04-21 12:45:55');
INSERT INTO `order_details` VALUES (8, '21042024124552', 8, 240, 1, 240, '-', '-', NULL, 'false', '2024-04-21 12:45:55', '2024-04-21 12:45:55');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomerorder` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iduser` bigint UNSIGNED NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemsubtotal` int NOT NULL,
  `tax` int NOT NULL,
  `shippingprice` int NOT NULL,
  `ordertotal` int NOT NULL,
  `payment` int NOT NULL,
  `pengiriman` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `namalengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodepos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `addcatatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payment_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, '21042024090657', 1, 'revisi', 1210, 0, 546000, 547210, 0, 'JNE - Yakin Esok Sampai (YES)', 'Suryo Atmojo', 'Suryo', 'Atmojo', 'Indonesia', 'Jawa Timur', 'Surabaya', 'Sukolilo', 'Jl. Medokan Semampir Indah', '60119', 'suryoatm@gmail.com', '081217173406', 'check kembali pembayaran', '', '', '', '', 'false', '2024-04-21 09:07:00', '2024-04-21 12:00:29');
INSERT INTO `orders` VALUES (2, '21042024123545', 1, 'needapproval', 840, 0, 36000, 36840, 0, 'JNE - Reguler', 'Suryo Atmojo', 'Suryo', 'Atmojo', 'Indonesia', 'Jawa Timur', 'Surabaya', 'Sukolilo', 'Jl. Medokan Semampir Indah', '60119', 'suryoatm@gmail.com', '081217173406', '-', '', '', '', '', 'false', '2024-04-21 12:35:51', '2024-04-21 12:35:51');
INSERT INTO `orders` VALUES (3, '21042024124552', 1, 'draft', 1290, 0, 81000, 82290, 0, 'JNE - Reguler', 'Suryo Atmojo', 'Suryo', 'Atmojo', 'Indonesia', 'Jawa Timur', 'Surabaya', 'Sukolilo', 'Jl. Medokan Semampir Indah', '60119', 'suryoatm@gmail.com', '081217173406', '-', '', '', '', '', 'false', '2024-04-21 12:45:55', '2024-04-21 12:45:55');

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for product_categories
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_category_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES (1, 'Category 1', 'Active', 'false', '2024-04-20 12:52:50', '2024-04-20 12:52:50');
INSERT INTO `product_categories` VALUES (2, 'Category 2', 'Active', 'false', '2024-04-20 12:52:50', '2024-04-20 12:52:50');
INSERT INTO `product_categories` VALUES (3, 'Category 3', 'Inactive', 'false', '2024-04-20 12:52:50', '2024-04-20 12:52:50');
INSERT INTO `product_categories` VALUES (4, 'Category 4', 'Active', 'false', '2024-04-20 12:52:50', '2024-04-20 12:52:50');
INSERT INTO `product_categories` VALUES (5, 'Category 5', 'Inactive', 'false', '2024-04-20 12:52:50', '2024-04-20 12:52:50');
INSERT INTO `product_categories` VALUES (6, 'Category 6', 'Active', 'false', '2024-04-20 12:52:50', '2024-04-20 12:52:50');
INSERT INTO `product_categories` VALUES (7, 'Category 7', 'Active', 'false', '2024-04-20 12:52:50', '2024-04-20 12:52:50');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category` bigint UNSIGNED NOT NULL,
  `product_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_brand` bigint UNSIGNED NOT NULL,
  `product_price` int NOT NULL,
  `fileimages` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `product_length` double NULL DEFAULT NULL,
  `product_width` double NULL DEFAULT NULL,
  `product_height` double NULL DEFAULT NULL,
  `product_weight` double NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'SKU001', 1, 'Product 1', 'Product 1 details', 1, 100, 'image1.jpg', 10, 10, 30, 200, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-1');
INSERT INTO `products` VALUES (2, 'SKU002', 2, 'Product 2', 'Product 2 details', 2, 150, 'image2.jpg', 20, 10, 30, 200, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-2');
INSERT INTO `products` VALUES (3, 'SKU003', 3, 'Product 3', 'Product 3 details', 3, 200, 'image3.jpg', 10, 10, 30, 200, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-3');
INSERT INTO `products` VALUES (4, 'SKU004', 4, 'Product 4', 'Product 4 details', 1, 120, 'image4.jpg', 20, 10, 30, 200, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-4');
INSERT INTO `products` VALUES (5, 'SKU005', 5, 'Product 5', 'Product 5 details', 2, 180, 'image5.jpg', 30, 10, 30, 200, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-5');
INSERT INTO `products` VALUES (6, 'SKU006', 6, 'Product 6', 'Product 6 details', 3, 220, 'image6.jpg', 10, 10, 30, 200, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-6');
INSERT INTO `products` VALUES (7, 'SKU007', 7, 'Product 7', 'Product 7 details', 1, 130, 'image7.jpg', 50, 10, 30, 200, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-7');
INSERT INTO `products` VALUES (8, 'SKU008', 1, 'Product 8', 'Product 8 details', 2, 160, 'image8.jpg', 60, 10, 30, 200, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-8');
INSERT INTO `products` VALUES (9, 'SKU009', 2, 'Product 9', 'Product 9 details', 3, 210, 'image9.jpg', 10, 10, 30, 200, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-9');
INSERT INTO `products` VALUES (10, 'SKU010', 3, 'Product 10', 'Product 10 details', 1, 140, 'image10.jpg', 20, 10, 30, 200, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-10');
INSERT INTO `products` VALUES (11, 'SKU011', 4, 'Product 11', 'Product 11 details', 2, 170, 'image11.jpg', 50, 10, 30, 200, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-11');
INSERT INTO `products` VALUES (12, 'SKU012', 5, 'Product 12', 'Product 12 details', 3, 230, 'image12.jpg', 50, 10, 30, 200, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-12');
INSERT INTO `products` VALUES (13, 'SKU013', 6, 'Product 13', 'Product 13 details', 1, 150, 'image13.jpg', 40, 10, 30, 500, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-13');
INSERT INTO `products` VALUES (14, 'SKU014', 7, 'Product 14', 'Product 14 details', 2, 190, 'image14.jpg', 30, 10, 30, 500, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-14');
INSERT INTO `products` VALUES (15, 'SKU015', 1, 'Product 15', 'Product 15 details', 3, 240, 'image15.jpg', 20, 10, 30, 500, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-15');
INSERT INTO `products` VALUES (16, 'SKU016', 2, 'Product 16', 'Product 16 details', 1, 160, 'image16.jpg', 20, 10, 30, 500, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-16');
INSERT INTO `products` VALUES (17, 'SKU017', 3, 'Product 17', 'Product 17 details', 2, 200, 'image17.jpg', 10, 10, 30, 500, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-17');
INSERT INTO `products` VALUES (18, 'SKU018', 4, 'Product 18', 'Product 18 details', 3, 250, 'image18.jpg', 10, 10, 30, 500, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-18');
INSERT INTO `products` VALUES (19, 'SKU019', 5, 'Product 19', 'Product 19 details', 1, 170, 'image19.jpg', 20, 10, 30, 500, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-19');
INSERT INTO `products` VALUES (20, 'SKU020', 6, 'Product 20', 'Product 20 details', 2, 210, 'image20.jpg', 30, 10, 30, 500, 'Active', 'false', '2024-04-20 12:52:56', '2024-04-20 12:52:56', 'product-20');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
