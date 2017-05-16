-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 16, 2017 lúc 09:02 AM
-- Phiên bản máy phục vụ: 10.1.22-MariaDB
-- Phiên bản PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cong_ty_vai`
--

-- --------------------------------------------------------

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cay_vai_moc`
--
ALTER TABLE `cay_vai_moc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cay_vai_moc_loai_vai_id_foreign` (`loai_vai_id`),
  ADD KEY `cay_vai_moc_nhan_vien_det_id_foreign` (`nhan_vien_det_id`),
  ADD KEY `cay_vai_moc_kho_id_foreign` (`kho_id`),
  ADD KEY `cay_vai_moc_phieu_xuat_moc_id_foreign` (`phieu_xuat_moc_id`),
  ADD KEY `cay_vai_moc_lo_nhuom_id_foreign` (`lo_nhuom_id`),
  ADD KEY `cay_vai_moc_created_by_foreign` (`created_by`),
  ADD KEY `cay_vai_moc_updated_by_foreign` (`updated_by`),
  ADD KEY `cay_vai_moc_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `cay_vai_thanh_pham`
--
ALTER TABLE `cay_vai_thanh_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cay_vai_thanh_pham_cay_vai_moc_id_foreign` (`cay_vai_moc_id`),
  ADD KEY `cay_vai_thanh_pham_kho_id_foreign` (`kho_id`),
  ADD KEY `cay_vai_thanh_pham_hoa_don_xuat_id_foreign` (`hoa_don_xuat_id`),
  ADD KEY `cay_vai_thanh_pham_created_by_foreign` (`created_by`),
  ADD KEY `cay_vai_thanh_pham_updated_by_foreign` (`updated_by`),
  ADD KEY `cay_vai_thanh_pham_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `chi_cong_ty`
--
ALTER TABLE `chi_cong_ty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_cong_ty_nha_cung_cap_id_foreign` (`nha_cung_cap_id`),
  ADD KEY `chi_cong_ty_created_by_foreign` (`created_by`),
  ADD KEY `chi_cong_ty_updated_by_foreign` (`updated_by`),
  ADD KEY `chi_cong_ty_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `don_hang_cong_ty`
--
ALTER TABLE `don_hang_cong_ty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_hang_cong_ty_loai_soi_id_foreign` (`loai_soi_id`),
  ADD KEY `don_hang_cong_ty_nha_cung_cap_id_foreign` (`nha_cung_cap_id`),
  ADD KEY `don_hang_cong_ty_created_by_foreign` (`created_by`),
  ADD KEY `don_hang_cong_ty_updated_by_foreign` (`updated_by`),
  ADD KEY `don_hang_cong_ty_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `don_hang_khach_hang`
--
ALTER TABLE `don_hang_khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_hang_khach_hang_khach_hang_id_foreign` (`khach_hang_id`),
  ADD KEY `don_hang_khach_hang_loai_vai_id_foreign` (`loai_vai_id`),
  ADD KEY `don_hang_khach_hang_mau_id_foreign` (`mau_id`),
  ADD KEY `don_hang_khach_hang_created_by_foreign` (`created_by`),
  ADD KEY `don_hang_khach_hang_updated_by_foreign` (`updated_by`),
  ADD KEY `don_hang_khach_hang_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `hoa_don_nhap`
--
ALTER TABLE `hoa_don_nhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoa_don_nhap_don_hang_cong_ty_id_foreign` (`don_hang_cong_ty_id`),
  ADD KEY `hoa_don_nhap_nha_cung_cap_id_foreign` (`nha_cung_cap_id`),
  ADD KEY `hoa_don_nhap_kho_id_foreign` (`kho_id`),
  ADD KEY `hoa_don_nhap_nhan_vien_nhap_id_foreign` (`nhan_vien_nhap_id`),
  ADD KEY `hoa_don_nhap_created_by_foreign` (`created_by`),
  ADD KEY `hoa_don_nhap_updated_by_foreign` (`updated_by`),
  ADD KEY `hoa_don_nhap_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `hoa_don_xuat`
--
ALTER TABLE `hoa_don_xuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoa_don_xuat_don_hang_khach_hang_id_foreign` (`don_hang_khach_hang_id`),
  ADD KEY `hoa_don_xuat_khach_hang_id_foreign` (`khach_hang_id`),
  ADD KEY `hoa_don_xuat_nhan_vien_xuat_id_foreign` (`nhan_vien_xuat_id`),
  ADD KEY `hoa_don_xuat_created_by_foreign` (`created_by`),
  ADD KEY `hoa_don_xuat_updated_by_foreign` (`updated_by`),
  ADD KEY `hoa_don_xuat_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khach_hang_so_dien_thoai_unique` (`so_dien_thoai`),
  ADD UNIQUE KEY `khach_hang_ten_dang_nhap_unique` (`ten_dang_nhap`),
  ADD UNIQUE KEY `khach_hang_email_unique` (`email`),
  ADD KEY `khach_hang_created_by_foreign` (`created_by`),
  ADD KEY `khach_hang_updated_by_foreign` (`updated_by`),
  ADD KEY `khach_hang_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kho_ten_unique` (`ten`),
  ADD UNIQUE KEY `kho_so_dien_thoai_unique` (`so_dien_thoai`),
  ADD KEY `kho_nhan_vien_quan_ly_id_foreign` (`nhan_vien_quan_ly_id`),
  ADD KEY `kho_created_by_foreign` (`created_by`),
  ADD KEY `kho_updated_by_foreign` (`updated_by`),
  ADD KEY `kho_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `loai_soi`
--
ALTER TABLE `loai_soi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loai_soi_ten_unique` (`ten`),
  ADD KEY `loai_soi_kho_id_foreign` (`kho_id`),
  ADD KEY `loai_soi_created_by_foreign` (`created_by`),
  ADD KEY `loai_soi_updated_by_foreign` (`updated_by`),
  ADD KEY `loai_soi_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `loai_vai`
--
ALTER TABLE `loai_vai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loai_vai_ten_unique` (`ten`),
  ADD KEY `loai_vai_created_by_foreign` (`created_by`),
  ADD KEY `loai_vai_updated_by_foreign` (`updated_by`),
  ADD KEY `loai_vai_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `loai_vai_loai_soi`
--
ALTER TABLE `loai_vai_loai_soi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loai_vai_loai_soi_loai_vai_id_foreign` (`loai_vai_id`),
  ADD KEY `loai_vai_loai_soi_loai_soi_id_foreign` (`loai_soi_id`),
  ADD KEY `loai_vai_loai_soi_created_by_foreign` (`created_by`),
  ADD KEY `loai_vai_loai_soi_updated_by_foreign` (`updated_by`),
  ADD KEY `loai_vai_loai_soi_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `lo_nhuom`
--
ALTER TABLE `lo_nhuom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lo_nhuom_loai_vai_id_foreign` (`loai_vai_id`),
  ADD KEY `lo_nhuom_mau_id_foreign` (`mau_id`),
  ADD KEY `lo_nhuom_nhan_vien_nhuom_id_foreign` (`nhan_vien_nhuom_id`),
  ADD KEY `lo_nhuom_created_by_foreign` (`created_by`),
  ADD KEY `lo_nhuom_updated_by_foreign` (`updated_by`),
  ADD KEY `lo_nhuom_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `mau`
--
ALTER TABLE `mau`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mau_ten_unique` (`ten`),
  ADD KEY `mau_nhan_vien_pha_che_id_foreign` (`nhan_vien_pha_che_id`),
  ADD KEY `mau_created_by_foreign` (`created_by`),
  ADD KEY `mau_updated_by_foreign` (`updated_by`),
  ADD KEY `mau_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nhan_vien_ten_dang_nhap_unique` (`ten_dang_nhap`),
  ADD UNIQUE KEY `nhan_vien_so_dien_thoai_unique` (`so_dien_thoai`),
  ADD UNIQUE KEY `nhan_vien_email_unique` (`email`),
  ADD KEY `nhan_vien_created_by_foreign` (`created_by`),
  ADD KEY `nhan_vien_updated_by_foreign` (`updated_by`),
  ADD KEY `nhan_vien_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nha_cung_cap_ten_unique` (`ten`),
  ADD UNIQUE KEY `nha_cung_cap_email_unique` (`email`),
  ADD UNIQUE KEY `nha_cung_cap_so_dien_thoai_unique` (`so_dien_thoai`),
  ADD UNIQUE KEY `nha_cung_cap_fax_unique` (`fax`),
  ADD KEY `nha_cung_cap_created_by_foreign` (`created_by`),
  ADD KEY `nha_cung_cap_updated_by_foreign` (`updated_by`),
  ADD KEY `nha_cung_cap_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `phieu_xuat_moc`
--
ALTER TABLE `phieu_xuat_moc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phieu_xuat_moc_loai_vai_id_foreign` (`loai_vai_id`),
  ADD KEY `phieu_xuat_moc_kho_id_foreign` (`kho_id`),
  ADD KEY `phieu_xuat_moc_nhan_vien_xuat_id_foreign` (`nhan_vien_xuat_id`),
  ADD KEY `phieu_xuat_moc_created_by_foreign` (`created_by`),
  ADD KEY `phieu_xuat_moc_updated_by_foreign` (`updated_by`),
  ADD KEY `phieu_xuat_moc_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `phieu_xuat_soi`
--
ALTER TABLE `phieu_xuat_soi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phieu_xuat_soi_loai_soi_id_foreign` (`loai_soi_id`),
  ADD KEY `phieu_xuat_soi_kho_id_foreign` (`kho_id`),
  ADD KEY `phieu_xuat_soi_nhan_vien_xuat_id_foreign` (`nhan_vien_xuat_id`),
  ADD KEY `phieu_xuat_soi_created_by_foreign` (`created_by`),
  ADD KEY `phieu_xuat_soi_updated_by_foreign` (`updated_by`),
  ADD KEY `phieu_xuat_soi_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `thanh_toan`
--
ALTER TABLE `thanh_toan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thanh_toan_khach_hang_id_foreign` (`khach_hang_id`),
  ADD KEY `thanh_toan_created_by_foreign` (`created_by`),
  ADD KEY `thanh_toan_updated_by_foreign` (`updated_by`),
  ADD KEY `thanh_toan_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `thu_chi`
--
ALTER TABLE `thu_chi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thu_chi_khach_hang_id_foreign` (`khach_hang_id`),
  ADD KEY `thu_chi_nha_cung_cap_id_foreign` (`nha_cung_cap_id`),
  ADD KEY `thu_chi_created_by_foreign` (`created_by`),
  ADD KEY `thu_chi_updated_by_foreign` (`updated_by`),
  ADD KEY `thu_chi_deleted_by_foreign` (`deleted_by`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cay_vai_moc`
--
ALTER TABLE `cay_vai_moc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `cay_vai_thanh_pham`
--
ALTER TABLE `cay_vai_thanh_pham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `chi_cong_ty`
--
ALTER TABLE `chi_cong_ty`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `don_hang_cong_ty`
--
ALTER TABLE `don_hang_cong_ty`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `don_hang_khach_hang`
--
ALTER TABLE `don_hang_khach_hang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `hoa_don_nhap`
--
ALTER TABLE `hoa_don_nhap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `hoa_don_xuat`
--
ALTER TABLE `hoa_don_xuat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `loai_soi`
--
ALTER TABLE `loai_soi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `loai_vai`
--
ALTER TABLE `loai_vai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `loai_vai_loai_soi`
--
ALTER TABLE `loai_vai_loai_soi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `lo_nhuom`
--
ALTER TABLE `lo_nhuom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `mau`
--
ALTER TABLE `mau`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `phieu_xuat_moc`
--
ALTER TABLE `phieu_xuat_moc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `phieu_xuat_soi`
--
ALTER TABLE `phieu_xuat_soi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thanh_toan`
--
ALTER TABLE `thanh_toan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thu_chi`
--
ALTER TABLE `thu_chi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cay_vai_moc`
--
ALTER TABLE `cay_vai_moc`
  ADD CONSTRAINT `cay_vai_moc_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `cay_vai_moc_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `cay_vai_moc_kho_id_foreign` FOREIGN KEY (`kho_id`) REFERENCES `kho` (`id`),
  ADD CONSTRAINT `cay_vai_moc_lo_nhuom_id_foreign` FOREIGN KEY (`lo_nhuom_id`) REFERENCES `lo_nhuom` (`id`),
  ADD CONSTRAINT `cay_vai_moc_loai_vai_id_foreign` FOREIGN KEY (`loai_vai_id`) REFERENCES `loai_vai` (`id`),
  ADD CONSTRAINT `cay_vai_moc_nhan_vien_det_id_foreign` FOREIGN KEY (`nhan_vien_det_id`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `cay_vai_moc_phieu_xuat_moc_id_foreign` FOREIGN KEY (`phieu_xuat_moc_id`) REFERENCES `phieu_xuat_moc` (`id`),
  ADD CONSTRAINT `cay_vai_moc_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `cay_vai_thanh_pham`
--
ALTER TABLE `cay_vai_thanh_pham`
  ADD CONSTRAINT `cay_vai_thanh_pham_cay_vai_moc_id_foreign` FOREIGN KEY (`cay_vai_moc_id`) REFERENCES `cay_vai_moc` (`id`),
  ADD CONSTRAINT `cay_vai_thanh_pham_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `cay_vai_thanh_pham_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `cay_vai_thanh_pham_hoa_don_xuat_id_foreign` FOREIGN KEY (`hoa_don_xuat_id`) REFERENCES `hoa_don_xuat` (`id`),
  ADD CONSTRAINT `cay_vai_thanh_pham_kho_id_foreign` FOREIGN KEY (`kho_id`) REFERENCES `kho` (`id`),
  ADD CONSTRAINT `cay_vai_thanh_pham_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `chi_cong_ty`
--
ALTER TABLE `chi_cong_ty`
  ADD CONSTRAINT `chi_cong_ty_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `chi_cong_ty_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `chi_cong_ty_nha_cung_cap_id_foreign` FOREIGN KEY (`nha_cung_cap_id`) REFERENCES `nha_cung_cap` (`id`),
  ADD CONSTRAINT `chi_cong_ty_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `don_hang_cong_ty`
--
ALTER TABLE `don_hang_cong_ty`
  ADD CONSTRAINT `don_hang_cong_ty_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `don_hang_cong_ty_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `don_hang_cong_ty_loai_soi_id_foreign` FOREIGN KEY (`loai_soi_id`) REFERENCES `loai_soi` (`id`),
  ADD CONSTRAINT `don_hang_cong_ty_nha_cung_cap_id_foreign` FOREIGN KEY (`nha_cung_cap_id`) REFERENCES `nha_cung_cap` (`id`),
  ADD CONSTRAINT `don_hang_cong_ty_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `don_hang_khach_hang`
--
ALTER TABLE `don_hang_khach_hang`
  ADD CONSTRAINT `don_hang_khach_hang_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `don_hang_khach_hang_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `don_hang_khach_hang_khach_hang_id_foreign` FOREIGN KEY (`khach_hang_id`) REFERENCES `khach_hang` (`id`),
  ADD CONSTRAINT `don_hang_khach_hang_loai_vai_id_foreign` FOREIGN KEY (`loai_vai_id`) REFERENCES `loai_vai` (`id`),
  ADD CONSTRAINT `don_hang_khach_hang_mau_id_foreign` FOREIGN KEY (`mau_id`) REFERENCES `mau` (`id`),
  ADD CONSTRAINT `don_hang_khach_hang_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `hoa_don_nhap`
--
ALTER TABLE `hoa_don_nhap`
  ADD CONSTRAINT `hoa_don_nhap_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `hoa_don_nhap_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `hoa_don_nhap_don_hang_cong_ty_id_foreign` FOREIGN KEY (`don_hang_cong_ty_id`) REFERENCES `don_hang_cong_ty` (`id`),
  ADD CONSTRAINT `hoa_don_nhap_kho_id_foreign` FOREIGN KEY (`kho_id`) REFERENCES `kho` (`id`),
  ADD CONSTRAINT `hoa_don_nhap_nha_cung_cap_id_foreign` FOREIGN KEY (`nha_cung_cap_id`) REFERENCES `nha_cung_cap` (`id`),
  ADD CONSTRAINT `hoa_don_nhap_nhan_vien_nhap_id_foreign` FOREIGN KEY (`nhan_vien_nhap_id`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `hoa_don_nhap_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `hoa_don_xuat`
--
ALTER TABLE `hoa_don_xuat`
  ADD CONSTRAINT `hoa_don_xuat_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `hoa_don_xuat_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `hoa_don_xuat_don_hang_khach_hang_id_foreign` FOREIGN KEY (`don_hang_khach_hang_id`) REFERENCES `don_hang_khach_hang` (`id`),
  ADD CONSTRAINT `hoa_don_xuat_khach_hang_id_foreign` FOREIGN KEY (`khach_hang_id`) REFERENCES `khach_hang` (`id`),
  ADD CONSTRAINT `hoa_don_xuat_nhan_vien_xuat_id_foreign` FOREIGN KEY (`nhan_vien_xuat_id`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `hoa_don_xuat_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD CONSTRAINT `khach_hang_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `khach_hang_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `khach_hang_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `kho`
--
ALTER TABLE `kho`
  ADD CONSTRAINT `kho_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `kho_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `kho_nhan_vien_quan_ly_id_foreign` FOREIGN KEY (`nhan_vien_quan_ly_id`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `kho_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `loai_soi`
--
ALTER TABLE `loai_soi`
  ADD CONSTRAINT `loai_soi_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `loai_soi_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `loai_soi_kho_id_foreign` FOREIGN KEY (`kho_id`) REFERENCES `kho` (`id`),
  ADD CONSTRAINT `loai_soi_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `loai_vai`
--
ALTER TABLE `loai_vai`
  ADD CONSTRAINT `loai_vai_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `loai_vai_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `loai_vai_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `loai_vai_loai_soi`
--
ALTER TABLE `loai_vai_loai_soi`
  ADD CONSTRAINT `loai_vai_loai_soi_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `loai_vai_loai_soi_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `loai_vai_loai_soi_loai_soi_id_foreign` FOREIGN KEY (`loai_soi_id`) REFERENCES `loai_soi` (`id`),
  ADD CONSTRAINT `loai_vai_loai_soi_loai_vai_id_foreign` FOREIGN KEY (`loai_vai_id`) REFERENCES `loai_vai` (`id`),
  ADD CONSTRAINT `loai_vai_loai_soi_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `lo_nhuom`
--
ALTER TABLE `lo_nhuom`
  ADD CONSTRAINT `lo_nhuom_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `lo_nhuom_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `lo_nhuom_loai_vai_id_foreign` FOREIGN KEY (`loai_vai_id`) REFERENCES `loai_vai` (`id`),
  ADD CONSTRAINT `lo_nhuom_mau_id_foreign` FOREIGN KEY (`mau_id`) REFERENCES `mau` (`id`),
  ADD CONSTRAINT `lo_nhuom_nhan_vien_nhuom_id_foreign` FOREIGN KEY (`nhan_vien_nhuom_id`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `lo_nhuom_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `mau`
--
ALTER TABLE `mau`
  ADD CONSTRAINT `mau_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `mau_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `mau_nhan_vien_pha_che_id_foreign` FOREIGN KEY (`nhan_vien_pha_che_id`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `mau_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD CONSTRAINT `nhan_vien_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `nhan_vien_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `nhan_vien_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD CONSTRAINT `nha_cung_cap_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `nha_cung_cap_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `nha_cung_cap_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `phieu_xuat_moc`
--
ALTER TABLE `phieu_xuat_moc`
  ADD CONSTRAINT `phieu_xuat_moc_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `phieu_xuat_moc_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `phieu_xuat_moc_kho_id_foreign` FOREIGN KEY (`kho_id`) REFERENCES `kho` (`id`),
  ADD CONSTRAINT `phieu_xuat_moc_loai_vai_id_foreign` FOREIGN KEY (`loai_vai_id`) REFERENCES `loai_vai` (`id`),
  ADD CONSTRAINT `phieu_xuat_moc_nhan_vien_xuat_id_foreign` FOREIGN KEY (`nhan_vien_xuat_id`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `phieu_xuat_moc_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `phieu_xuat_soi`
--
ALTER TABLE `phieu_xuat_soi`
  ADD CONSTRAINT `phieu_xuat_soi_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `phieu_xuat_soi_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `phieu_xuat_soi_kho_id_foreign` FOREIGN KEY (`kho_id`) REFERENCES `kho` (`id`),
  ADD CONSTRAINT `phieu_xuat_soi_loai_soi_id_foreign` FOREIGN KEY (`loai_soi_id`) REFERENCES `loai_soi` (`id`),
  ADD CONSTRAINT `phieu_xuat_soi_nhan_vien_xuat_id_foreign` FOREIGN KEY (`nhan_vien_xuat_id`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `phieu_xuat_soi_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `thanh_toan`
--
ALTER TABLE `thanh_toan`
  ADD CONSTRAINT `thanh_toan_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `thanh_toan_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `thanh_toan_khach_hang_id_foreign` FOREIGN KEY (`khach_hang_id`) REFERENCES `khach_hang` (`id`),
  ADD CONSTRAINT `thanh_toan_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `thu_chi`
--
ALTER TABLE `thu_chi`
  ADD CONSTRAINT `thu_chi_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `thu_chi_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `thu_chi_khach_hang_id_foreign` FOREIGN KEY (`khach_hang_id`) REFERENCES `khach_hang` (`id`),
  ADD CONSTRAINT `thu_chi_nha_cung_cap_id_foreign` FOREIGN KEY (`nha_cung_cap_id`) REFERENCES `nha_cung_cap` (`id`),
  ADD CONSTRAINT `thu_chi_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
