/*
 Navicat Premium Data Transfer

 Source Server         : server_lokal
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : sia_2218103

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 25/05/2024 13:42:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bank_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `bank_pembayaran`;
CREATE TABLE `bank_pembayaran`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `atas_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rekening` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bank_pembayaran
-- ----------------------------
INSERT INTO `bank_pembayaran` VALUES (1, 'BCA', 'Rudi', 712371294, '2024-05-25 03:56:37', '2024-05-25 03:56:37');

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_customer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `telp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `customer_kode_customer_unique`(`kode_customer`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES (1, 'CUST-240525035625', 'Cust A', 'mlg', '0812931293', '2024-05-25 03:56:25', '2024-05-25 03:56:25');

-- ----------------------------
-- Table structure for detail_pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `detail_pengeluaran`;
CREATE TABLE `detail_pengeluaran`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pengeluaran_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `harga` int NOT NULL,
  `total_nominal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `detail_pengeluaran_pengeluaran_id_index`(`pengeluaran_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_pengeluaran
-- ----------------------------

-- ----------------------------
-- Table structure for detail_transaksi_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `detail_transaksi_pembelian`;
CREATE TABLE `detail_transaksi_pembelian`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaksi_pembelian_id` bigint UNSIGNED NOT NULL,
  `produk_id` bigint UNSIGNED NOT NULL,
  `satuan_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `qty_acc` int NULL DEFAULT NULL,
  `harga` int NOT NULL,
  `total_nominal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `detail_transaksi_pembelian_satuan_id_index`(`satuan_id`) USING BTREE,
  INDEX `detail_transaksi_pembelian_transaksi_pembelian_id_index`(`transaksi_pembelian_id`) USING BTREE,
  INDEX `detail_transaksi_pembelian_produk_id_index`(`produk_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_transaksi_pembelian
-- ----------------------------
INSERT INTO `detail_transaksi_pembelian` VALUES (2, 2, 2, 1, 10, NULL, 2500, 25000, '2024-05-25 04:02:22', '2024-05-25 04:02:22');
INSERT INTO `detail_transaksi_pembelian` VALUES (5, 1, 1, 1, 5, 5, 5000, 25000, '2024-05-25 04:03:18', '2024-05-25 04:03:24');
INSERT INTO `detail_transaksi_pembelian` VALUES (6, 1, 1, 1, 2, 2, 5500, 11000, '2024-05-25 04:03:18', '2024-05-25 04:03:24');
INSERT INTO `detail_transaksi_pembelian` VALUES (7, 3, 1, 1, 10, NULL, 3500, 35000, '2024-05-25 04:03:49', '2024-05-25 04:03:49');
INSERT INTO `detail_transaksi_pembelian` VALUES (8, 3, 2, 1, 5, NULL, 5000, 25000, '2024-05-25 04:03:49', '2024-05-25 04:03:49');

-- ----------------------------
-- Table structure for detail_transaksi_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `detail_transaksi_penjualan`;
CREATE TABLE `detail_transaksi_penjualan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaksi_penjualan_id` bigint UNSIGNED NOT NULL,
  `master_stok_id` bigint UNSIGNED NOT NULL,
  `satuan_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `harga` int NOT NULL,
  `total_nominal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `detail_transaksi_penjualan_master_stok_id_index`(`master_stok_id`) USING BTREE,
  INDEX `detail_transaksi_penjualan_satuan_id_index`(`satuan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_transaksi_penjualan
-- ----------------------------

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
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penempatan` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `gaji_pokok` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_karyawan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `karyawan_email_unique`(`email`) USING BTREE,
  UNIQUE INDEX `karyawan_telp_unique`(`telp`) USING BTREE,
  INDEX `karyawan_penempatan_index`(`penempatan`) USING BTREE,
  INDEX `karyawan_user_id_index`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES (1, 'Budi Tabuti', 'budi@karyawan.com', '08132123123', 'kasir', 'mlg', 1, 4, 2500000, '2024-05-25 03:55:32', '2024-05-25 03:55:32', 'KRY-240525035531');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Makanan', 'Produk makanan', '2024-05-25 03:57:36', '2024-05-25 03:57:36');
INSERT INTO `kategori` VALUES (2, 'Minuman', 'produk minuman', '2024-05-25 03:57:42', '2024-05-25 03:57:42');
INSERT INTO `kategori` VALUES (3, 'Pakaian', 'kategori barang pakaian', '2024-05-25 05:37:25', '2024-05-25 05:37:25');

-- ----------------------------
-- Table structure for master_stok
-- ----------------------------
DROP TABLE IF EXISTS `master_stok`;
CREATE TABLE `master_stok`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `produk_id` bigint UNSIGNED NOT NULL,
  `outlet_id` bigint UNSIGNED NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `master_stok_produk_id_index`(`produk_id`) USING BTREE,
  INDEX `master_stok_outlet_id_index`(`outlet_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_stok
-- ----------------------------
INSERT INTO `master_stok` VALUES (1, 1, 1, 7, '2024-05-25 03:58:17', '2024-05-25 04:03:24');
INSERT INTO `master_stok` VALUES (2, 1, 2, 0, '2024-05-25 03:58:17', '2024-05-25 03:58:17');
INSERT INTO `master_stok` VALUES (3, 2, 1, 0, '2024-05-25 03:58:35', '2024-05-25 03:58:35');
INSERT INTO `master_stok` VALUES (4, 2, 2, 0, '2024-05-25 03:58:35', '2024-05-25 03:58:35');
INSERT INTO `master_stok` VALUES (5, 3, 1, 0, '2024-05-25 05:09:10', '2024-05-25 05:09:10');
INSERT INTO `master_stok` VALUES (6, 3, 2, 0, '2024-05-25 05:09:10', '2024-05-25 05:09:10');
INSERT INTO `master_stok` VALUES (7, 4, 1, 0, '2024-05-25 05:19:25', '2024-05-25 05:19:25');
INSERT INTO `master_stok` VALUES (8, 4, 2, 0, '2024-05-25 05:19:25', '2024-05-25 05:19:25');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2024_05_24_015327_create_kategoris_table', 1);
INSERT INTO `migrations` VALUES (7, '2024_05_24_015335_create_satuans_table', 1);
INSERT INTO `migrations` VALUES (8, '2024_05_24_020606_create_karyawans_table', 1);
INSERT INTO `migrations` VALUES (9, '2024_05_24_020626_create_bank_pembayarans_table', 1);
INSERT INTO `migrations` VALUES (10, '2024_05_24_020636_create_customers_table', 1);
INSERT INTO `migrations` VALUES (11, '2024_05_24_020641_create_detail_pengeluarans_table', 1);
INSERT INTO `migrations` VALUES (12, '2024_05_24_020701_create_detail_transaksi_penjualans_table', 1);
INSERT INTO `migrations` VALUES (13, '2024_05_24_020710_create_detail_transaksi_pembelians_table', 1);
INSERT INTO `migrations` VALUES (14, '2024_05_24_020722_create_outlets_table', 1);
INSERT INTO `migrations` VALUES (15, '2024_05_24_020728_create_pembayarans_table', 1);
INSERT INTO `migrations` VALUES (16, '2024_05_24_020739_create_pengeluarans_table', 1);
INSERT INTO `migrations` VALUES (17, '2024_05_24_020800_create_produks_table', 1);
INSERT INTO `migrations` VALUES (18, '2024_05_24_020816_create_master_stoks_table', 1);
INSERT INTO `migrations` VALUES (19, '2024_05_24_020822_create_suppliers_table', 1);
INSERT INTO `migrations` VALUES (20, '2024_05_24_020829_create_transaksi_pembelians_table', 1);
INSERT INTO `migrations` VALUES (21, '2024_05_24_020834_create_transaksi_penjualans_table', 1);

-- ----------------------------
-- Table structure for outlet
-- ----------------------------
DROP TABLE IF EXISTS `outlet`;
CREATE TABLE `outlet`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_outlet` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `telp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `outlet_kode_outlet_unique`(`kode_outlet`) USING BTREE,
  UNIQUE INDEX `outlet_telp_unique`(`telp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of outlet
-- ----------------------------
INSERT INTO `outlet` VALUES (1, 'mlg-001', 'Malang Blimbing', 'mlg', '081238123', '2024-05-25 03:53:44', '2024-05-25 03:53:44');
INSERT INTO `outlet` VALUES (2, 'mlg-002', 'Malang Turen', 'turen', '018231293', '2024-05-25 03:54:01', '2024-05-25 03:54:01');

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
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaksi_penjualan_id` bigint UNSIGNED NOT NULL,
  `transaksi_pembelian_id` bigint UNSIGNED NOT NULL,
  `pengeluaran_id` bigint UNSIGNED NOT NULL,
  `jenis_transaksi` enum('Penjualan','Pembelian','Pengeluaran') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` bigint NOT NULL,
  `metode_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bank_pembayaran_id` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pembayaran_transaksi_penjualan_id_index`(`transaksi_penjualan_id`) USING BTREE,
  INDEX `pembayaran_transaksi_pembelian_id_index`(`transaksi_pembelian_id`) USING BTREE,
  INDEX `pembayaran_pengeluaran_id_index`(`pengeluaran_id`) USING BTREE,
  INDEX `pembayaran_bank_pembayaran_id_index`(`bank_pembayaran_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------

-- ----------------------------
-- Table structure for pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `pengeluaran`;
CREATE TABLE `pengeluaran`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `jenis_pengeluaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_input` bigint UNSIGNED NOT NULL,
  `total_nominal` bigint NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pengeluaran_user_input_index`(`user_input`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengeluaran
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
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for produk
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `satuan_id` bigint UNSIGNED NOT NULL,
  `principal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `produk_kode_produk_unique`(`kode_produk`) USING BTREE,
  INDEX `produk_kategori_id_index`(`kategori_id`) USING BTREE,
  INDEX `produk_satuan_id_index`(`satuan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES (1, 'kp-001', 'Ponari Sweet Edited again', 2, 1, 'PT. Osaka', 5000, 6500, '2024-05-25 03:58:17', '2024-05-25 05:44:18');
INSERT INTO `produk` VALUES (2, 'umkm-00812373', 'Onde onde', 1, 1, 'UMKM Onde Onde Nikmat', 2500, 5000, '2024-05-25 03:58:35', '2024-05-25 03:58:35');
INSERT INTO `produk` VALUES (3, 'mnm-001', 'Kratingdeng', 2, 2, 'PT. Minuman', 5000, 6500, '2024-05-25 05:09:10', '2024-05-25 05:09:10');

-- ----------------------------
-- Table structure for satuan
-- ----------------------------
DROP TABLE IF EXISTS `satuan`;
CREATE TABLE `satuan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of satuan
-- ----------------------------
INSERT INTO `satuan` VALUES (1, 'Pcs', 'satuan pcs', '2024-05-25 03:56:47', '2024-05-25 03:56:47');
INSERT INTO `satuan` VALUES (2, 'Lusin', '1 Lusin isi 12 pcs', '2024-05-25 03:56:54', '2024-05-25 03:56:54');
INSERT INTO `satuan` VALUES (4, 'Box', '1 Box isi 4 Lusin', '2024-05-25 03:57:10', '2024-05-25 03:57:16');
INSERT INTO `satuan` VALUES (5, 'Roll', '1 Roll 2 meter', '2024-05-25 04:51:48', '2024-05-25 04:51:48');

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `supplier_email_unique`(`email`) USING BTREE,
  UNIQUE INDEX `supplier_telp_unique`(`telp`) USING BTREE,
  INDEX `supplier_kode_supplier_index`(`kode_supplier`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (1, 'SPY-240525035316', 'Supplier A', 'sa@email.com', '0812312312', 'mlg', '2024-05-25 03:53:16', '2024-05-25 03:53:16');
INSERT INTO `supplier` VALUES (2, 'SPY-240525035328', 'Supplier B', 'sb@email.com', '08131273123', 'mlg', '2024-05-25 03:53:28', '2024-05-25 03:53:28');

-- ----------------------------
-- Table structure for transaksi_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_pembelian`;
CREATE TABLE `transaksi_pembelian`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_transaksi_pembelian` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_input` bigint UNSIGNED NOT NULL,
  `user_approval` bigint UNSIGNED NULL DEFAULT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `outlet_id` bigint UNSIGNED NOT NULL,
  `total_nominal` int NOT NULL,
  `status` enum('Draft','Proccess','Success') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `transaksi_pembelian_kode_transaksi_pembelian_unique`(`kode_transaksi_pembelian`) USING BTREE,
  INDEX `transaksi_pembelian_user_input_index`(`user_input`) USING BTREE,
  INDEX `transaksi_pembelian_supplier_id_index`(`supplier_id`) USING BTREE,
  INDEX `transaksi_pembelian_outlet_id_index`(`outlet_id`) USING BTREE,
  INDEX `transaksi_pembelian_user_approval_index`(`user_approval`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi_pembelian
-- ----------------------------
INSERT INTO `transaksi_pembelian` VALUES (1, 'TP-240525040208', 1, 1, 1, 1, 36000, 'Success', '2024-05-25 04:02:08', '2024-05-25 04:03:24');
INSERT INTO `transaksi_pembelian` VALUES (2, 'TP-240525040222', 1, NULL, 2, 2, 25000, 'Draft', '2024-05-25 04:02:22', '2024-05-25 04:02:22');
INSERT INTO `transaksi_pembelian` VALUES (3, 'TP-240525040349', 1, NULL, 1, 2, 60000, 'Proccess', '2024-05-25 04:03:49', '2024-05-25 04:03:49');

-- ----------------------------
-- Table structure for transaksi_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_penjualan`;
CREATE TABLE `transaksi_penjualan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_transaksi_penjualan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_input` bigint UNSIGNED NOT NULL,
  `outlet_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NULL DEFAULT NULL,
  `total_nominal` int NOT NULL,
  `metode_pembayaran` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `status` enum('Draft','Pending','Payment','Checkout') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `transaksi_penjualan_kode_transaksi_penjualan_unique`(`kode_transaksi_penjualan`) USING BTREE,
  INDEX `transaksi_penjualan_user_input_index`(`user_input`) USING BTREE,
  INDEX `transaksi_penjualan_outlet_id_index`(`outlet_id`) USING BTREE,
  INDEX `transaksi_penjualan_customer_id_index`(`customer_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi_penjualan
-- ----------------------------

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
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin@email.com', NULL, '$2y$12$zVBSlZwKoLLsf3ZOSR3GoOhJXNYCNs2YWvGXG1Drqk4/zORq8rfha', NULL, '2024-05-25 03:52:53', '2024-05-25 03:52:53');
INSERT INTO `users` VALUES (4, 'Budi Tabuti', 'budi@karyawan.com', NULL, '$2y$12$SwlpfLhfYLPuccwHvKfWAOC8bLg5qQDzxASGStUwZZspR3z8MEXJW', NULL, '2024-05-25 03:55:32', '2024-05-25 03:55:32');

SET FOREIGN_KEY_CHECKS = 1;
