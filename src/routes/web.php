<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('manageside.kho.manager_kho');
});

Route::resource('khachhangUI','KhachHangUIController');
// Route::get('manage_kho_loai_soi',function(){
    
//     return view('manageside.manager_kho_loai_soi');

// });
//Các Route để quản lý ben kho cua Admin , chưa hiện thực authenication cho admin
Route::resource('manage_kho_loai_soi','LoaiSoiController');
Route::get('ajax/manage_kho_loai_soi/{id}','LoaiSoiController@getItemByIdAjax');


Route::resource('/manage_kho_nha_cung_cap','NhaCungCapController');
Route::get('ajax/manage_kho_nha_cung_cap/{id}','NhaCungCapController@getItemByIdAjax');

Route::resource('/manage_kho_don_hang_cong_ty','DonHangCongTyController');
Route::get('ajax/manage_kho_don_hang_cong_ty/{id}','DonHangCongTyController@getItemByIdAjax');

Route::resource('/manage_kho_hoa_don_nhap','HoaDonNhapController');
Route::get('ajax/manage_kho_hoa_don_nhap/{id}','HoaDonNhapController@getItemByIdAjax');
Route::get('ajaxselect/manage_kho_hoa_don_nhap/{id}','HoaDonNhapController@getDonHangBySelectAjax');

Route::resource('/manage_kho_kho_cay_moc','KhoCayMocController');
Route::get('ajax/manage_kho_kho_cay_moc/{id}','KhoCayMocController@getItemByIdAjax');

Route::resource('/manage_kho_phieu_xuat_soi','PhieuXuatSoiController');
Route::get('ajax/manage_kho_phieu_xuat_soi/{id}','PhieuXuatSoiController@getItemByIdAjax');
Route::get('ajaxselect/manage_kho_phieu_xuat_soi/{id}','PhieuXuatSoiController@getLoaiSoiBySelectAjax');


Route::resource('/manage_kho_phieu_xuat_moc','PhieuXuatMocController');
Route::get('ajax/manage_kho_phieu_xuat_moc/{id}','PhieuXuatMocController@getItemByIdAjax');

Route::resource('/manage_kho_xuat_moc','XuatMocController');
Route::get('ajaxselect/manage_kho_xuat_moc/{id}','XuatMocController@getListCayMocThuocKieuPhieuXuatMoc');
Route::get('ajaxcaymoc/manage_kho_xuat_moc/{id}','XuatMocController@getCaymocById');
Route::get('ajaxUpdateXuatMoc/manage_kho_xuat_moc/{id}','XuatMocController@getPhieuXuatMocWithListCayMoc');
Route::put('update/manage_kho_xuat_moc/{id}','XuatMocController@updateThongTinXuatMoc');




Route::resource('/manage_kho_kho_thanh_pham','KhoThanhPhamController');
Route::get('ajaxselectlonhuom/manage_kho_kho_thanh_pham/{id}','KhoThanhPhamController@getDataBySelectLoNhuom');
Route::get('ajaxUpdate/manage_kho_kho_thanh_pham/{id}','KhoThanhPhamController@getDataToUpdateCayThanhPham');
Route::get('ajaxUpdateListCayMocSanCo/manage_kho_kho_thanh_pham/{id}','KhoThanhPhamController@getListCayMocThayTheLienQuan');


Route::resource('/manage_kho_xuat_thanh_pham','XuatThanhPhamController');
Route::get('ajaxselecthoadon/manage_kho_xuat_thanh_pham/{id}','XuatThanhPhamController@getListCayThanhPhamChoXuat');
Route::get('ajaxCayThanhPham/manage_kho_xuat_thanh_pham/{id}','XuatThanhPhamController@getCayThanhPhamById');
Route::get('ajaxselectdonhang/manage_kho_xuat_thanh_pham/{id}','XuatThanhPhamController@getListHoaDonXuatBySelectDonHang');
Route::get('ajaxHoaDonChange/manage_kho_xuat_thanh_pham/{id}','XuatThanhPhamController@getListCayThanhPhamDaXuatToUpdate');
Route::put('update/manage_kho_xuat_thanh_pham/{id}','XuatThanhPhamController@updateThongTinXuatThanhPham');

Route::resource('/manage_san_xuat_mau','MauController');
Route::resource('/manage_san_xuat_lo_nhuom','LoNhuomController');

Route::resource('/manage_ban_hang_khach_hang','KhachHangController');
Route::get('ajax/manage_ban_hang_khach_hang/{id}','KhachHangController@getItemByIdAjax');




Route::resource('/manage_ban_hang_don_hang','DonHangKhachHangController');
Route::get('ajax/manage_ban_hang_don_hang_create','DonHangKhachHangController@createItemAjax');
Route::get('ajax/manage_ban_hang_don_hang/{id}','DonHangKhachHangController@getItemByIdAjax');


Route::resource('/manage_ban_hang_hoa_don_xuat','HoaDonXuatController');
Route::get('ajax/danh_sach_cay_vai_phu_hop_don_hang/{id}','HoaDonXuatController@getCayVaiListAjax');

Route::resource('/manage_ban_hang_thanh_toan','ThanhToanController');

//Admin end
Route::get('/manage_san_xuat', function(){
    return view('manageside.manager_san_xuat');
});

Route::get('/manage_ban_hang',function(){
    return view('manageside.manager_ban_hang');
});
Route::get('/manage_thong_ke',function (){
    return view('manageside.manager_thong_ke');
});
