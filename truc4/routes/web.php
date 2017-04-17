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
    return view('/user/login');
});


Route::get('/user/login', function() {
    return view('/user/login');
});
Route::post('/user/login', 'User@login');
Route::get('/user/delete', function() {
    return view('/user/info');
});


Route::get('/user/register', 'User@create');
Route::post('/user/register', 'User@store');

Route::get('/user/logout', 'User@logout');




Route::resource('cayvaimoc', 'CayVaiMoc');
Route::get('/cayvaimoc/{id}/restore', 'CayVaiMoc@restore');
Route::resource('cayvaithanhpham', 'CayVaiThanhPham');
Route::get('/cayvaithanhpham/{id}/restore', 'CayVaiThanhPham@restore');
Route::resource('donhangcongty', 'DonHangCongTy');
//
Route::resource('donhangkhachhang', 'DonHangKhachHang');
//
Route::resource('hoadonnhap', 'HoaDonNhap');
//
Route::resource('hoadonxuat', 'HoaDonXuat');
//
Route::resource('khachhang', 'KhachHang');
Route::get('/khachhang/{id}/restore', 'KhachHang@restore');
Route::resource('kho', 'Kho');
Route::get('/kho/{id}/restore', 'Kho@restore');
Route::resource('loaisoi', 'LoaiSoi');
Route::get('/loaisoi/{id}/restore', 'LoaiSoi@restore');
Route::resource('loaivai', 'LoaiVai');
Route::get('/loaivai/{id}/restore', 'LoaiVai@restore');
Route::resource('loaivailoaisoi', 'LoaiVaiLoaiSoi');
Route::resource('lonhuom', 'LoNhuom');
Route::get('/lonhuom/{id}/restore', 'LoNhuom@restore');
Route::resource('mau', 'Mau');
Route::get('/mau/{id}/restore', 'Mau@restore');
Route::resource('nhacungcap', 'NhaCungCap');
Route::get('/nhacungcap/{id}/restore', 'NhaCungCap@restore');
Route::resource('nhanvien', 'NhanVien');
Route::get('/nhanvien/{id}/restore', 'NhanVien@restore');
Route::resource('phieuxuatmoc', 'PhieuXuatMoc');
Route::get('/phieuxuatmoc/{id}/restore', 'PhieuXuatMoc@restore');
Route::resource('phieuxuatsoi', 'PhieuXuatSoi');
Route::get('/phieuxuatsoi/{id}/restore', 'PhieuXuatSoi@restore');
Route::resource('thuchi', 'ThuChi');
//
Route::resource('user', 'User');
//
