-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 16, 2017 lúc 07:26 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cong_ty_vai`
--

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `cay_vai_moc`
--

INSERT INTO `cay_vai_moc` (`id`, `loai_vai_id`, `so_met`, `nhan_vien_det_id`, `ma_may_det`, `ngay_gio_det`, `kho_id`, `ngay_gio_nhap_kho`, `phieu_xuat_moc_id`, `lo_nhuom_id`, `tinh_trang`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 1, 100, 5, '1', '2017-04-26 13:03:00', 1, '2017-04-26 13:29:00', 1, NULL, 'Đã Xuất', NULL, '2017-04-26 06:29:48', '2017-05-09 06:17:00', NULL, NULL, NULL, NULL),
(2, 1, 100, 5, '2', '2017-04-26 13:30:00', 1, '2017-04-26 13:40:00', 1, 1, 'Đã Xuất', NULL, '2017-04-26 06:30:42', '2017-05-09 06:17:00', NULL, NULL, NULL, NULL),
(3, 2, 100, 5, '3', '2017-04-26 13:31:00', 1, '2017-04-26 13:31:00', NULL, NULL, 'Chưa Xuất', NULL, '2017-04-26 06:31:58', '2017-04-26 06:31:58', NULL, NULL, NULL, NULL),
(4, 2, 100, 5, '4', '2017-04-26 13:32:00', 1, '2017-04-26 13:33:00', NULL, NULL, 'Chưa Xuất', NULL, '2017-04-26 06:32:53', '2017-04-26 06:32:53', NULL, NULL, NULL, NULL),
(5, 3, 100, 5, '5', '2017-04-26 13:33:00', 1, '2017-04-26 13:33:00', NULL, NULL, 'Chưa Xuất', NULL, '2017-04-26 06:33:39', '2017-04-26 06:33:39', NULL, NULL, NULL, NULL),
(6, 3, 100, 5, '6', '2017-04-26 13:43:00', 1, '2017-04-26 13:33:00', 3, NULL, 'Đã Xuất', NULL, '2017-04-26 06:34:19', '2017-04-27 07:25:16', NULL, NULL, NULL, NULL),
(7, 4, 100, 5, '7', '2017-04-26 13:34:00', 1, '2017-04-26 13:43:00', NULL, NULL, 'Chưa Xuất', NULL, '2017-04-26 06:34:59', '2017-04-26 06:34:59', NULL, NULL, NULL, NULL),
(8, 4, 100, 5, '8', '2017-04-26 11:11:00', 1, '2017-04-26 11:11:00', 4, 4, 'Đã Xuất', NULL, '2017-04-26 06:35:44', '2017-05-08 18:56:55', NULL, NULL, NULL, NULL),
(9, 4, 100, 5, '9', '2017-04-26 11:11:00', 1, '2017-04-26 11:11:00', NULL, NULL, 'Chưa Xuất', NULL, '2017-04-26 06:37:47', '2017-04-26 06:37:47', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `cay_vai_thanh_pham`
--

INSERT INTO `cay_vai_thanh_pham` (`id`, `cay_vai_moc_id`, `loai_vai_id`, `kich_co`, `so_met`, `don_gia`, `lo_nhuom_id`, `kho_id`, `ngay_gio_nhap_kho`, `hoa_don_xuat_id`, `tinh_trang`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 2, 1, 0.5, 100, 50000, 1, 1, '2017-05-17 16:11:00', 4, 'Đã Xuất', NULL, '2017-05-08 10:30:59', '2017-05-15 09:36:22', NULL, NULL, NULL, NULL),
(2, 8, 4, 2, 100, 50000, 4, 1, '2017-05-18 13:01:00', NULL, 'Chưa Xuất', NULL, '2017-05-08 18:56:55', '2017-05-08 18:56:55', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `don_hang_cong_ty`
--

INSERT INTO `don_hang_cong_ty` (`id`, `loai_soi_id`, `nha_cung_cap_id`, `khoi_luong`, `han_chot`, `ngay_gio_dat_hang`, `tinh_trang`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 1, 1, 2000, NULL, '2017-04-13 16:04:35', 'Hoàn Thành', NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(2, 2, 2, 1000, NULL, '2017-04-13 16:04:35', ' Chưa Hoàn Thành', NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(3, 3, 3, 2000, NULL, '2017-04-13 16:04:35', 'Hoàn Thành', NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(4, 4, 4, 2000, NULL, '2017-04-13 16:04:35', ' Chưa Hoàn Thành', NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(5, 5, 5, 2000, NULL, '2017-04-13 16:04:35', 'Hoàn Thành', NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(6, 6, 6, 2000, NULL, '2017-04-13 16:04:35', 'Hoàn Thành', NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(7, 1, 1, 2000, NULL, '2017-04-13 16:04:54', 'Hoàn Thành', NULL, '2017-04-13 09:16:54', '2017-04-13 09:16:54', NULL, NULL, NULL, NULL),
(8, 2, 2, 1000, NULL, '2017-04-13 16:04:54', ' Chưa Hoàn Thành', NULL, '2017-04-13 09:16:54', '2017-04-13 09:16:54', NULL, NULL, NULL, NULL),
(9, 3, 3, 2000, NULL, '2017-04-13 16:04:54', 'Hoàn Thành', NULL, '2017-04-13 09:16:54', '2017-04-13 09:16:54', NULL, NULL, NULL, NULL),
(10, 4, 4, 2000, NULL, '2017-04-13 16:04:54', ' Chưa Hoàn Thành', NULL, '2017-04-13 09:16:54', '2017-04-13 09:16:54', NULL, NULL, NULL, NULL),
(11, 5, 5, 2000, NULL, '2017-04-13 16:04:54', 'Hoàn Thành', NULL, '2017-04-13 09:16:54', '2017-04-13 09:16:54', NULL, NULL, NULL, NULL),
(12, 6, 6, 2000, NULL, '2017-04-13 16:04:54', 'Hoàn Thành', NULL, '2017-04-13 09:16:54', '2017-04-13 09:16:54', NULL, NULL, NULL, NULL),
(13, 1, 1, 2000, NULL, '2017-04-13 16:04:27', 'Hoàn Thành', NULL, '2017-04-13 09:18:27', '2017-04-13 09:18:27', NULL, NULL, NULL, NULL),
(14, 2, 2, 1000, NULL, '2017-04-13 16:04:27', ' Chưa Hoàn Thành', NULL, '2017-04-13 09:18:27', '2017-04-13 09:18:27', NULL, NULL, NULL, NULL),
(15, 3, 3, 2000, NULL, '2017-04-13 16:04:27', 'Hoàn Thành', NULL, '2017-04-13 09:18:27', '2017-04-13 09:18:27', NULL, NULL, NULL, NULL),
(16, 4, 4, 2000, NULL, '2017-04-13 16:04:27', ' Chưa Hoàn Thành', NULL, '2017-04-13 09:18:27', '2017-04-13 09:18:27', NULL, NULL, NULL, NULL),
(17, 5, 5, 2000, NULL, '2017-04-13 16:04:27', 'Hoàn Thành', NULL, '2017-04-13 09:18:27', '2017-04-13 09:18:27', NULL, NULL, NULL, NULL),
(18, 6, 6, 2000, NULL, '2017-04-13 16:04:27', 'Hoàn Thành', NULL, '2017-04-13 09:18:27', '2017-04-13 09:18:27', NULL, NULL, NULL, NULL),
(19, 1, 1, 2000, NULL, '2017-04-13 16:04:23', 'Hoàn Thành', NULL, '2017-04-13 09:20:23', '2017-04-13 09:20:23', NULL, NULL, NULL, NULL),
(20, 2, 2, 1000, NULL, '2017-04-13 16:04:23', ' Chưa Hoàn Thành', NULL, '2017-04-13 09:20:23', '2017-04-13 09:20:23', NULL, NULL, NULL, NULL),
(21, 3, 3, 2000, NULL, '2017-04-13 16:04:23', 'Hoàn Thành', NULL, '2017-04-13 09:20:23', '2017-04-13 09:20:23', NULL, NULL, NULL, NULL),
(22, 4, 4, 2000, NULL, '2017-04-13 16:04:23', ' Chưa Hoàn Thành', NULL, '2017-04-13 09:20:23', '2017-04-13 09:20:23', NULL, NULL, NULL, NULL),
(23, 5, 5, 2000, NULL, '2017-04-13 16:04:23', 'Hoàn Thành', NULL, '2017-04-13 09:20:23', '2017-04-13 09:20:23', NULL, NULL, NULL, NULL),
(24, 6, 6, 2000, NULL, '2017-04-13 16:04:23', 'Hoàn Thành', NULL, '2017-04-13 09:20:23', '2017-04-13 09:20:23', NULL, NULL, NULL, NULL),
(25, 3, 4, 2000, NULL, '2017-04-19 00:00:00', 'Mới', NULL, '2017-04-19 16:04:22', '2017-04-19 17:07:50', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `don_hang_khach_hang`
--

INSERT INTO `don_hang_khach_hang` (`id`, `khach_hang_id`, `loai_vai_id`, `mau_id`, `kich_co`, `tong_so_met`, `chiet_khau`, `han_chot`, `ngay_gio_dat_hang`, `tinh_trang`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 1, 1, 1, 2, 1000, 10, NULL, '2017-05-27 23:11:00', 'Đang giao', NULL, '2017-05-09 07:48:09', '2017-05-09 08:08:09', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `hoa_don_nhap`
--

INSERT INTO `hoa_don_nhap` (`id`, `don_hang_cong_ty_id`, `nha_cung_cap_id`, `so_thung`, `khoi_luong_thung`, `don_gia`, `kho_id`, `ngay_gio_xuat_hoa_don`, `nhan_vien_nhap_id`, `tinh_chat`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 1, 1, 25, 40, 37000, 1, '2017-04-13 16:04:35', 5, 'trả dần', NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(2, 2, 2, 25, 40, 37000, 1, '2017-04-13 16:04:35', 5, 'trả dần', NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(3, 3, 3, 25, 40, 37000, 1, '2017-04-13 16:04:35', 5, 'trả dần', NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(4, 4, 4, 25, 40, 37000, 1, '2017-04-13 16:04:35', 5, 'trả dần', NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(5, 5, 5, 25, 40, 37000, 2, '2017-04-13 16:04:35', 5, 'trả dần', NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(6, 6, 6, 25, 40, 37000, 2, '2017-04-13 16:04:35', 5, 'trả dần', NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(7, 7, 1, 25, 40, 37000, 1, '2017-04-13 16:04:54', 5, 'trả dần', NULL, '2017-04-13 09:16:54', '2017-04-13 09:16:54', NULL, NULL, NULL, NULL),
(8, 8, 2, 25, 40, 37000, 1, '2017-04-13 16:04:54', 5, 'trả dần', NULL, '2017-04-13 09:16:54', '2017-04-13 09:16:54', NULL, NULL, NULL, NULL),
(9, 9, 3, 25, 40, 37000, 1, '2017-04-13 16:04:54', 5, 'trả dần', NULL, '2017-04-13 09:16:54', '2017-04-13 09:16:54', NULL, NULL, NULL, NULL),
(10, 10, 4, 25, 40, 37000, 1, '2017-04-13 16:04:54', 5, 'trả dần', NULL, '2017-04-13 09:16:54', '2017-04-13 09:16:54', NULL, NULL, NULL, NULL),
(11, 11, 5, 25, 40, 37000, 2, '2017-04-13 16:04:54', 5, 'trả dần', NULL, '2017-04-13 09:16:54', '2017-04-13 09:16:54', NULL, NULL, NULL, NULL),
(12, 12, 6, 25, 40, 37000, 2, '2017-04-13 16:04:54', 5, 'trả dần', NULL, '2017-04-13 09:16:54', '2017-04-13 09:16:54', NULL, NULL, NULL, NULL),
(13, 13, 1, 25, 40, 37000, 1, '2017-04-13 16:04:27', 5, 'trả dần', NULL, '2017-04-13 09:18:27', '2017-04-13 09:18:27', NULL, NULL, NULL, NULL),
(14, 14, 2, 25, 40, 37000, 1, '2017-04-13 16:04:27', 5, 'trả dần', NULL, '2017-04-13 09:18:27', '2017-04-13 09:18:27', NULL, NULL, NULL, NULL),
(15, 15, 3, 25, 40, 37000, 1, '2017-04-13 16:04:27', 5, 'trả dần', NULL, '2017-04-13 09:18:27', '2017-04-13 09:18:27', NULL, NULL, NULL, NULL),
(16, 16, 4, 25, 40, 37000, 1, '2017-04-13 16:04:27', 5, 'trả dần', NULL, '2017-04-13 09:18:27', '2017-04-13 09:18:27', NULL, NULL, NULL, NULL),
(17, 17, 5, 25, 40, 37000, 2, '2017-04-13 16:04:27', 5, 'trả dần', NULL, '2017-04-13 09:18:27', '2017-04-13 09:18:27', NULL, NULL, NULL, NULL),
(18, 18, 6, 25, 40, 37000, 2, '2017-04-13 16:04:27', 5, 'trả dần', NULL, '2017-04-13 09:18:27', '2017-04-13 09:18:27', NULL, NULL, NULL, NULL),
(19, 19, 1, 25, 40, 37000, 1, '2017-04-13 16:04:23', 5, 'trả dần', NULL, '2017-04-13 09:20:23', '2017-04-13 09:20:23', NULL, NULL, NULL, NULL),
(20, 20, 2, 25, 40, 37000, 1, '2017-04-13 16:04:23', 5, 'trả dần', NULL, '2017-04-13 09:20:23', '2017-04-13 09:20:23', NULL, NULL, NULL, NULL),
(21, 21, 3, 25, 40, 37000, 1, '2017-04-13 16:04:23', 5, 'trả dần', NULL, '2017-04-13 09:20:23', '2017-04-13 09:20:23', NULL, NULL, NULL, NULL),
(22, 22, 4, 25, 40, 37000, 1, '2017-04-13 16:04:23', 5, 'trả dần', NULL, '2017-04-13 09:20:23', '2017-04-13 09:20:23', NULL, NULL, NULL, NULL),
(23, 23, 5, 25, 40, 37000, 2, '2017-04-13 16:04:23', 5, 'trả dần', NULL, '2017-04-13 09:20:23', '2017-04-13 09:20:23', NULL, NULL, NULL, NULL),
(24, 24, 6, 25, 40, 37000, 2, '2017-04-13 16:04:23', 5, 'trả dần', NULL, '2017-04-13 09:20:23', '2017-04-13 09:20:23', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `hoa_don_xuat`
--

INSERT INTO `hoa_don_xuat` (`id`, `don_hang_khach_hang_id`, `khach_hang_id`, `ngay_gio_xuat_hoa_don`, `nhan_vien_xuat_id`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(4, 1, 1, '2017-05-12 21:10:22', 4, NULL, '2017-05-12 14:01:30', '2017-05-12 14:01:31', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten_dang_nhap`, `mat_khau`, `ten`, `email`, `so_dien_thoai`, `dia_chi`, `cong_no`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 'hung', NULL, 'Trần Văn Hùng', 'hieu@gmail.com', '0934689574', '648 Thành Thái, Q.10', 45000000, NULL, '2017-04-13 10:01:36', '2017-05-09 06:56:03', NULL, NULL, NULL, NULL),
(2, 'mai', '$2y$10$JKX7hBl3OxqZ4AtJ1CkoUusIYZsYZ0v95NCP/Ss0wEAXV.wwckMjq', 'Nguyễn Thị Mai', 'mai@gmail.com', '0923469571', '394 Lữ Gia, Q.11', 2600000, NULL, '2017-04-13 10:01:36', '2017-04-13 10:01:36', NULL, NULL, NULL, NULL),
(3, 'phuc', '$2y$10$sMhgr.FW.Tb5O3WQIE1TxuOjwdgG0twbVzbF0AFZJG20WocqkhqfS', 'Đỗ Văn Phúc', 'phuc@gmail.com', '0934698571', '267 Tô Hiến Thành, Q.10', 3200000, NULL, '2017-04-13 10:01:36', '2017-04-13 10:01:36', NULL, NULL, NULL, NULL),
(4, 'nhan', '$2y$10$6REMHmES5KWpBbn6oQ.sOuVjlLr1MQjDhPqzdAbTWKnOfGjIYay5K', 'Nguyễn Ngọc Nhân', 'nhan@gmail.com', '0937468134', '167 Nguyễn Kiệm, Q.Gò Vấp', 0, NULL, '2017-04-13 10:01:36', '2017-04-13 10:01:36', NULL, NULL, NULL, NULL),
(5, 'long', '$2y$10$8UdKtrHQrvHKiX2F16QJD.qllMN89UBOyMqUX8kp5aJSJR/iVFWpK', 'Lê Trung Long', 'long@gmail.com', '0904687231', '369 Phạm Hữu Lầu, P.6, TP.Cao Lãnh, Đồng Tháp', 0, NULL, '2017-04-13 10:01:36', '2017-04-13 10:01:36', NULL, NULL, NULL, NULL),
(6, 'cong', '$2y$10$RbVqzzaglyNXybszSMfd8OJssg.z5pwT0ZF16DucEUECxzrs9R0zu', 'Đỗ Chí Công', 'cong@gmail.com', '0916487265', '267 Bạch Đằng, Q.Hải Châu, Đà Nẵng', 0, NULL, '2017-04-13 10:01:37', '2017-04-13 10:01:37', NULL, NULL, NULL, NULL),
(7, 'toan', '$2y$10$GvTW856MTCMT6ZLsOsuQquJjcPkplRLlwMwnFl9bJV2bJzejA.Tza', 'Trương Đức Toàn', 'toan@gmail.com', '0924876213', '24 Nguyễn Tri Phương, Q.5', 0, NULL, '2017-04-13 10:01:37', '2017-04-13 10:01:37', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`id`, `ten`, `dien_tich`, `dia_chi`, `so_dien_thoai`, `nhan_vien_quan_ly_id`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 'Kho sợi 1', 1.2345678901234567e19, '268 Lý Thường Kiệt, phường 14, quận 10, Tp Hồ Chí Minh', '(08) 408 8888', 1, NULL, '2017-04-15 16:03:30', '2017-04-15 16:03:30', NULL, NULL, NULL, NULL),
(2, 'Kho sợi 2', 1.2345678901234567e19, 'Ấp Chánh 2, xã Tân Xuân , Huyện Hóc Môn, Tp Hồ Chí Minh', '(08) 408 2222', 2, NULL, '2017-04-15 16:03:30', '2017-04-15 16:03:30', NULL, NULL, NULL, NULL),
(3, 'Kho sợi 3', 1.2345678901234567e19, 'Ấp Chánh 3, xã Tân Xuân , Huyện Hóc Môn, Tp Hồ Chí Minh', '(08) 408 2233', 3, NULL, '2017-04-15 16:03:30', '2017-04-15 16:03:30', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `loai_soi`
--

INSERT INTO `loai_soi` (`id`, `ten`, `thong_tin_ky_thuat`, `khoi_luong_ton`, `so_thung_ton`, `kho_id`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 'Sợi Bông Cotton', 'Sợi bông được làm từ cây sợi bông – một giống cây trồng rất lâu đời. Trong ngành may mặc và chế biến người ta phân biệt các loại bông trước tiên theo chiều dài của sợi, sau đó đến mùi, màu và độ sạch của cuộn sợi. Sợi bông càng dài thì càng có chất lượng cao.<br><br>Sợi bông là loại sợi thiên nhiên có khả năng hút/ thấm nước rất cao; sợi bông có thể thấm nước đến 65% so với trọng lượng. Sợi bông có khuynh hướng dính bẩn và dính dầu mỡ, dù vậy có thể giặt sạch được. Sợi bông thân thiện với da người (không làm ngứa) và không tạo ra các nguy cơ dị ứng việc khiến cho sợi bông trở thành nguyên liệu quan trọng trong ngành dệt may.<br><br>Sợi bông không hòa tan trong nước, khi ẩm hoặc ướt sẽ dẻo dai hơn khi khô ráo. Sợi bông bền đối với chất kềm, nhưng không bền đối với acid và có thể bị vi sinh vật phân hủy. Dù vậy khả năng chịu được mối mọt và các côn trùng khác rất cao. Sợi bông dễ cháy nhưng có thể nấu trong nước sôi để tiệt trùng.<br><br>Lãnh vực chính của sợi bông là việc ứng dụng trong ngành may mặc. Ngoài ra, sợi bông còn được dùng làm thành phần trong các chất liệu tổng hợp.', 2000, 20, 1, NULL, '2017-04-13 09:12:35', '2017-04-26 06:21:11', 6, 6, NULL, NULL),
(2, 'Sợi Tở Tằm', 'Có 4 loại tơ tằm tự nhiên, tơ của tằm dâu là loại được sản xuất nhiều chiếm 95% sản lượng trên thế giới. Sợi tơ tằm được tôn vinh là Nữ Hoàng của ngành dệt mặc dù sản lượng sợi tơ sản xuất ra thấp hơn nhiều so với các loại sợi khác như: bông, đay, gai… nhưng nó vẫn chiếm vị trí quan trọng trong ngành dệt, nó tô đậm màu sắc hàng đầu thế giới về mốt thời trang tơ tằm.<br><br>Đặc điểm chủ yếu của tơ là chiều dài tơ đơn và độ mảnh tơ. Sợi tơ có thể hút ẩm, bị ảnh hưởng bởi nước nóng, axit, bazơ, muối kim loại, chất nhuộm màu. Mặt cắt ngang sợi tơ có hình dạng tam giác với các góc tròn. Vì có hình dạng tam giác nên ánh sáng có thể rọi vào ở nhiều góc độ khác nhau, sợi tơ có vẻ óng ánh tự nhiên.<br><br>Lụa là một loại vải mịn, mỏng được dệt bằng tơ. Loại lụa tốt nhất được dệt từ tơ tằm. Người cầm có thể cảm nhận được vẻ mịn và mượt mà của lụa không giống như các loại vải dệt từ sợi nhân tạo. Quần áo bằng lụa rất thích hợp với thời tiết nóng và hoạt động nhiều vì lụa dễ thấm mồ hôi. Quần áo lụa cũng thích hợp cho thời tiết lạnh vì lụa dẫn nhiệt kém làm cho người mặc ấm hơn.', 1000, 5, 1, NULL, '2017-04-13 09:12:35', '2017-04-26 06:21:36', 6, 6, NULL, NULL),
(3, 'Sợi Polyester', 'Polyester là một loại sợi tổng hợp với thành phần cấu tạo đặc trưng là ethylene (nguồn gốc từ dầu mỏ). Quá trình hóa học tạo ra các polyester hoàn chỉnh được gọi là quá trình trùng hợp. Có bốn dạng sợi polyester cơ bản là sợi filament, xơ, sợi thô, và fiberfill.<br><br>Polyester được ứng dụng nhiều trong ngành công nghiệp để sản xuất các loại sản phẩm như quần áo, đồ nội thất gia dụng, vải công nghiệp, vật liệu cách điện… Sợi Polyester có nhiều ưu thế hơn khi so sánh với các loại sợi truyền thống là không hút ẩm, nhưng hấp thụ dầu. Chính những đặc tính này làm cho Polyester trở thành một loại vải hoàn hảo đối với những ứng dụng chống nước, chống bụi và chống cháy. Khả năng hấp thụ thấp của Polyester giúp nó tự chống lại các vết bẩn một cách tự nhiên. Vải Polyester không bị co khi giặt, chống nhăn và chống kéo dãn. Nó cũng dễ dàng được nhuộm màu và không bị hủy hoại bởi nấm mốc. Vải Polyester là vật liệu cách nhiệt hiệu quả, do đó nó được dung để sản xuất gối, chăn, áo khoác ngoài và túi ngủ.', 600, 15, 1, NULL, '2017-04-13 09:12:35', '2017-04-26 06:22:15', 6, 6, NULL, NULL),
(4, 'Sợi CM /Sợi CD', 'CM là sợi 100% cotton chải kỹ; CD là sợi 100% cotton chải thô. Sơi này hút ẩm tốt, dễ chịu khi tiếp xúc với da người. Thường dùng để dệt các loại vải mềm, đố lót.', 1000, 5, 2, NULL, '2017-04-13 09:12:35', '2017-04-26 06:22:54', 5, 5, NULL, NULL),
(5, 'Sợi TCM /Sợi TCD', 'TC là sợi với thành phần bao gồm 65% PE và 35% cotton chải kỹ (TCM); 65 % PE, 35 % cotton chải thô (TCD). Sợi này dễ dễ chịu khi tiếp xúc với da người, chịu là (ủi) phẳng, giặt dễ sạch và chóng khô, phù hợp dệt vải áo quần.', 2000, 10, 2, NULL, '2017-04-13 09:12:35', '2017-04-26 06:23:40', 5, 5, NULL, NULL),
(6, 'Sợi CVC (Chief Value of Cotton', 'CVC là sợi với thành phần chính là cotton; ví dụ CVC 65% cotton và 35% PE. Vải sợi pha này mang tính chất của cả hai loại sợi cấu thành nên nó là sợi cotton và PE.', 1000, 5, 2, NULL, '2017-04-13 09:12:35', '2017-04-26 06:24:15', 5, 5, NULL, NULL),
(7, 'Sợi Lanh', 'Vải lanh là một loại vải được làm từ sợi của cây lanh (Linum usitatissimum). Việc sản xuất vải lanh mất nhiều công sức nhưng đây là loại vải rất có giá trị, được ưa chuộng để may quần áo do sự mát mẻ và thoải mái trong thời tiết nóng.\r\n\r\nNhiều sản phẩm được làm từ vải lanh như: tạp dề, túi, khăn tắm, khăn ăn, khăn trải giường, khăn trải bàn, thảm trang trí, vải bọc ghế và quần áo…\r\n\r\nVải lanh là một trong những loại vải lâu đời nhất trên thế giới, bắt nguồn từ hàng ngàn năm trước. Những mẩu rơm, hạt, sợi, chỉ, và nhiều loại vải khác có nguồn gốc từ khoảng năm 8000 trước Công nguyên đã được tìm thấy tại những nơi có người ở quanh các hồ nước ở Thụy Sĩ. Những sợi lanh nhuộm được tìm thấy trong một hang đá thời tiền sử ở Gruzia đã củng cố giả thiết rằng việc sử dụng vải lanh được dệt từ cây lanh dại đã bắt đầu cách đây hơn 30.000 năm', 2000, 10, 2, NULL, '2017-04-18 07:21:06', '2017-04-26 06:24:44', NULL, NULL, NULL, NULL),
(8, 'Sợi Nilon', 'Sợi Nilon lala sdadada', 0, 0, 1, NULL, '2017-04-18 07:25:18', '2017-04-18 09:38:43', NULL, NULL, NULL, NULL),
(9, 'Sợi Cáp Đồng', 'Loại này không thích hợp để làm quần áo . Tốt nhất nên làm dây điện', 0, 0, 1, NULL, '2017-04-18 09:27:38', '2017-04-18 09:27:38', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `loai_vai`
--

INSERT INTO `loai_vai` (`id`, `ten`, `don_gia`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 'Cotton', 50000, NULL, '2017-04-15 16:03:30', '2017-04-15 16:03:30', NULL, NULL, NULL, NULL),
(2, 'Kaki', 50000, NULL, '2017-04-15 16:03:30', '2017-04-15 16:03:30', NULL, NULL, NULL, NULL),
(3, 'Polyester', 50000, NULL, '2017-04-15 16:03:30', '2017-04-15 16:03:30', NULL, NULL, NULL, NULL),
(4, 'CVC', 50000, NULL, '2017-04-15 16:03:30', '2017-04-15 16:03:30', NULL, NULL, NULL, NULL),
(5, 'TC', 50000, NULL, '2017-04-15 16:03:30', '2017-04-15 16:03:30', NULL, NULL, NULL, NULL),
(6, 'Lua', 50000, NULL, '2017-04-15 16:03:30', '2017-04-15 16:03:30', NULL, NULL, NULL, NULL),
(7, 'Thun', 50000, NULL, '2017-04-15 16:03:30', '2017-04-15 16:03:30', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `lo_nhuom`
--

INSERT INTO `lo_nhuom` (`id`, `loai_vai_id`, `mau_id`, `nhan_vien_nhuom_id`, `ngay_gio_nhuom`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 1, 1, 5, '2017-04-16 21:04:08', NULL, '2017-04-16 14:01:08', '2017-04-16 14:01:08', NULL, NULL, NULL, NULL),
(2, 2, 2, 5, '2017-04-16 21:04:08', NULL, '2017-04-16 14:01:08', '2017-04-16 14:01:08', NULL, NULL, NULL, NULL),
(3, 3, 3, 5, '2017-04-16 21:04:08', NULL, '2017-04-16 14:01:08', '2017-04-16 14:01:08', NULL, NULL, NULL, NULL),
(4, 4, 4, 5, '2017-04-16 21:04:08', NULL, '2017-04-16 14:01:08', '2017-04-16 14:01:08', NULL, NULL, NULL, NULL),
(5, 5, 5, 5, '2017-04-16 21:04:08', NULL, '2017-04-16 14:01:08', '2017-04-16 14:01:08', NULL, NULL, NULL, NULL),
(6, 6, 6, 5, '2017-04-16 21:04:08', NULL, '2017-04-16 14:01:08', '2017-04-16 14:01:08', NULL, NULL, NULL, NULL),
(7, 7, 7, 5, '2017-04-16 21:04:08', NULL, '2017-04-16 14:01:08', '2017-04-16 14:01:08', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `mau`
--

INSERT INTO `mau` (`id`, `ten`, `cong_thuc`, `ma_mau`, `nhan_vien_pha_che_id`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 'Trắng', NULL, '#ffffff', 6, NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(2, 'Đen', NULL, '#000000', 6, NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(3, 'Xanh', NULL, '#66ff33', 6, NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(4, 'Đỏ', NULL, '#ff3300', 6, NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(5, 'Vàng', NULL, '#ffff00', 6, NULL, '2017-04-13 09:12:36', '2017-04-13 09:12:36', NULL, NULL, NULL, NULL),
(6, 'Tím', NULL, '#990099', 6, NULL, '2017-04-13 09:12:36', '2017-04-13 09:12:36', NULL, NULL, NULL, NULL),
(7, 'Cam', NULL, '#ff6600', 6, NULL, '2017-04-13 09:12:36', '2017-04-13 09:12:36', NULL, NULL, NULL, NULL),
(8, 'Lục', NULL, '#00ff99', 6, NULL, '2017-04-13 09:12:36', '2017-04-13 09:12:36', NULL, NULL, NULL, NULL),
(9, 'Lam', NULL, '#33ccff', 6, NULL, '2017-04-13 09:12:36', '2017-04-13 09:12:36', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_06_200000_create_nhan_vien_table', 1),
(4, '2017_04_06_200100_create_nha_cung_cap_table', 1),
(5, '2017_04_06_200200_create_khach_hang_table', 1),
(6, '2017_04_06_200300_create_kho_table', 1),
(7, '2017_04_06_200400_create_loai_soi_table', 1),
(8, '2017_04_06_200500_create_loai_vai_table', 1),
(9, '2017_04_06_200600_create_loai_vai_loai_soi_table', 1),
(10, '2017_04_06_200700_create_mau_table', 1),
(11, '2017_04_06_200800_create_lo_nhuom_table', 1),
(12, '2017_04_06_200900_create_phieu_xuat_soi_table', 1),
(13, '2017_04_06_201000_create_phieu_xuat_moc_table', 1),
(14, '2017_04_06_201100_create_cay_vai_moc_table', 1),
(15, '2017_04_06_201200_create_don_hang_cong_ty_table', 1),
(16, '2017_04_06_201300_create_don_hang_khach_hang_table', 1),
(17, '2017_04_06_201400_create_hoa_don_nhap_table', 1),
(18, '2017_04_06_201500_create_hoa_don_xuat_table', 1),
(19, '2017_04_06_201600_create_cay_vai_thanh_pham_table', 1),
(20, '2017_04_06_201700_create_thu_chi_table', 1),
(21, '2017_04_15_235800_add_tinh_trang_vao_cay_vai_moc_table', 2),
(22, '2017_04_16_015442_add_loai_cai_id_vao_cay_vai_thanh_pham_table', 3),
(23, '2017_04_16_021308_add_lo_nhuom_id_vao_cay_vai_thanh_pham_table', 4),
(24, '2017_04_16_022030_add_tinh_trang_vao_cay_vai_thanh_pham_table', 5),
(25, '2017_05_11_003701_create_danh_sach_cay_thanh_pham_cho_xuats_table', 6);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `ten_dang_nhap`, `mat_khau`, `ten`, `cmnd`, `ngay_sinh`, `email`, `so_dien_thoai`, `dia_chi`, `gioi_tinh`, `chuc_vu`, `quyen_han`, `luong`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 'truc', '$2y$10$ERHPkQHxknsTwcMBvyDN4OJWfpEgMfqbrdBK.VapdgKKbNbzKm0Ci', 'Vũ Duy Trúc', '272277194', '2017-04-15', NULL, '+84 163 222 8 000', '606/49/2C, đường 3 tháng 2, phường 14, quận 10, Tp Hồ Chí Minh', 'M', 'Lập trình viên', 0, 0, NULL, '2017-04-15 16:03:29', '2017-04-15 16:03:29', NULL, NULL, NULL, NULL),
(2, 'doan', '$2y$10$fNotIr/Jkf6FpBx7PRTYzuRANYF6qiw2J1fPn/Girq1E33AHcWHoy', 'Lê Công Doãn', '272277194', '2017-04-15', 'doanlecong1811@gmail.com', '0982503643', '27/1I tổ 7 . Ấp Chánh 2, xã Tân Xuân , Huyện Hóc Môn, Tp Hồ Chí Minh', 'M', 'Lập trình viên', 0, 0, NULL, '2017-04-15 16:03:29', '2017-04-15 16:03:29', NULL, NULL, NULL, NULL),
(3, 'hung', '$2y$10$ySg/nv1Q9Nu0cKruyuvdEe5jrwS2Vy0ngU8m3ulbntAE3BWnHI7mO', 'Nguyễn Văn Hùng', '272277194', '2017-04-15', 'hungvannguyen1811@gmail.com', '0982503645', '27/1I tổ 7 . Ấp Chánh 3, xã Tân Xuân , Huyện Hóc Môn, Tp Hồ Chí Minh', 'M', 'Lập trình viên', 0, 0, NULL, '2017-04-15 16:03:29', '2017-04-15 16:03:29', NULL, NULL, NULL, NULL),
(4, 'hoa', '$2y$10$G0wGr3DxbW7vNtsTYJmRYOklXxfR/XOiiiG8z57n9SAYXOV.qrB5.', 'Nguyễn Văn Hùng', '272277194', '2017-04-15', 'hungvannguyen111@gmail.com', '0982503633', '27/1I tổ 7 . Ấp Chánh 4, xã Tân Xuân , Huyện Hóc Môn, Tp Hồ Chí Minh', 'M', 'Lập trình viên', 0, 0, NULL, '2017-04-15 16:03:29', '2017-04-15 16:03:29', NULL, NULL, NULL, NULL),
(5, 'ngoc', '$2y$10$OIVBJJG4BpLyI1MQ7IcblO2iU35Se1DpkIUvX6isnC2DONo0pXHrK', 'Lê Xuân Ngọc', '272277194', '2017-04-15', 'hungvannguyen181@gmail.com', '0982503629', '27/1I tổ 7 . Ấp Chánh 5, xã Tân Xuân , Huyện Hóc Môn, Tp Hồ Chí Minh', 'M', 'Lập trình viên', 0, 0, NULL, '2017-04-15 16:03:29', '2017-04-15 16:03:29', NULL, NULL, NULL, NULL),
(6, 'dung', '$2y$10$cYUdeV3ovaYJSg55uwtOmuvBR5RUOevmYlYqduACOifd36WZhrNqG', 'Bùi Quý Dung', '272277194', '2017-04-15', 'hungvannguyen@gmail.com', '0982503623', '27/1I tổ 7 . Ấp Chánh 6, xã Tân Xuân , Huyện Hóc Môn, Tp Hồ Chí Minh', 'M', 'Lập trình viên', 0, 0, NULL, '2017-04-15 16:03:29', '2017-04-15 16:03:29', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`id`, `ten`, `dia_chi`, `email`, `so_dien_thoai`, `fax`, `cong_no`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 'Hải Yến 1', 'Số 8, Đường số 6, P.Tam Phú, Q.Thủ Đức, Tp.HCM', 'ctytnhhsoihaiyen@gmail.com', '0932041041', '(08) 38970962', 44000000, NULL, '2017-04-13 09:12:35', '2017-04-19 08:49:15', NULL, NULL, NULL, NULL),
(2, 'Nam Hưng 2', 'Số 13, Đường 48C, P.Tân Tạo, Q.Bình Tân, Tp.HCM', 'ctydetmaynamhung@yahoo.com', '(08) 37507398', NULL, 11200000, NULL, '2017-04-13 09:12:35', '2017-04-19 08:50:07', NULL, NULL, NULL, NULL),
(3, 'Topnet Việt Nam', '122 Đường Nguyễn Hoàng, P.An Phú, Q.2, Tp.HCM', 'salesvietnam.topnet@gmail.com', '(08) 62811102', NULL, 59000000, NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(4, 'Việt Thắng Lợi', '23/6 Nguyễn Ảnh Thủ, Ấp Hưng Lân, Xã Bà Điểm, Huyện Hóc Môn, Tp.HCM', 'sales@vietthangloi.vn', '(08) 37182234', '(08) 37182224', 66000000, NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(5, 'Huệ Đạt', 'Số 85 Phạm Văn Xảo, P.Phú Thọ Hòa, Q.Tân Phú, Tp.HCM', 'congtyhuedat@gmail.com', '(08) 39780228', '(08) 39780228', 20200000, NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(6, 'Nam Việt', 'Số 86, Tổ 2, Khu phố Bà Tri, P.Tân Hiệp, Xã Tân Uyên, Tỉnh Bình Dương', 'sales@navipoly.com', '+84 0650 3655361', '+84 650 3655360', 52000000, NULL, '2017-04-13 09:12:35', '2017-04-13 09:12:35', NULL, NULL, NULL, NULL),
(10, 'Việt Tiến', '07 Lê Minh Xuân - Q. Tân Bình - TP Hồ Chí Minh', 'vtec@hcm.vnn.vn', '(84) 8.38640800', '(84) 8.38640800', 0, NULL, '2017-04-19 08:10:10', '2017-04-19 08:10:10', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `phieu_xuat_moc`
--

INSERT INTO `phieu_xuat_moc` (`id`, `loai_vai_id`, `tong_so_cay_moc`, `tong_so_met`, `kho_id`, `nhan_vien_xuat_id`, `ngay_gio_xuat_kho`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 1, 2, 200, 1, 1, '2017-04-26 14:20:00', NULL, '2017-04-26 07:20:42', '2017-05-05 07:47:02', NULL, NULL, NULL, NULL),
(2, 2, 0, 0, 1, 1, '2017-04-26 00:35:00', NULL, '2017-04-26 07:35:42', '2017-04-26 07:40:20', NULL, NULL, NULL, NULL),
(3, 3, 1, 100, 1, 5, '2017-04-26 14:36:00', NULL, '2017-04-26 07:36:12', '2017-04-27 07:25:16', NULL, NULL, NULL, NULL),
(4, 4, 1, 100, 1, 5, '2017-04-26 00:37:00', NULL, '2017-04-26 07:37:13', '2017-04-27 07:25:44', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `phieu_xuat_soi`
--

INSERT INTO `phieu_xuat_soi` (`id`, `loai_soi_id`, `so_thung`, `khoi_luong_thung`, `tong_khoi_luong_xuat`, `kho_id`, `nhan_vien_xuat_id`, `ngay_gio_xuat_kho`, `ghi_chu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 1, 20, 100, 2000, 1, 5, '2017-04-26 13:20:00', NULL, '2017-04-26 06:21:11', '2017-04-26 06:21:11', NULL, NULL, NULL, NULL),
(2, 2, 5, 200, 1000, 1, 5, '2017-04-26 13:21:00', NULL, '2017-04-26 06:21:36', '2017-04-26 06:21:36', NULL, NULL, NULL, NULL),
(3, 3, 10, 40, 400, 1, 5, '2017-04-26 13:22:00', NULL, '2017-04-26 06:22:15', '2017-04-26 06:22:15', NULL, NULL, NULL, NULL),
(4, 4, 5, 200, 1000, 1, 5, '2017-04-26 13:22:00', NULL, '2017-04-26 06:22:54', '2017-04-26 06:22:54', NULL, NULL, NULL, NULL),
(5, 5, 10, 200, 2000, 1, 5, '2017-04-26 13:23:00', NULL, '2017-04-26 06:23:40', '2017-04-26 06:23:40', NULL, NULL, NULL, NULL),
(6, 6, 5, 200, 1000, 1, 5, '2017-04-26 13:24:00', NULL, '2017-04-26 06:24:15', '2017-04-26 06:24:15', NULL, NULL, NULL, NULL),
(7, 7, 10, 200, 2000, 1, 5, '2017-04-26 13:24:00', NULL, '2017-04-26 06:24:44', '2017-04-26 06:24:44', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

COMMIT;

