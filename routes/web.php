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
// Route::get('manage_kho_loai_soi',function(){
    
//     return view('manageside.manager_kho_loai_soi');

// });
//Các Route để quản lý ben kho cua Admin , chưa hiện thực authenication cho admin
Route::resource('/manage_kho_loai_soi','LoaiSoiController');
Route::resource('/manage_kho_nha_cung_cap','NhaCungCapController');
Route::resource('/manage_kho_don_hang_cong_ty','DonHangCongTyController');
Route::resource('/manage_kho_hoa_don_nhap','HoaDonNhapController');
Route::resource('/manage_kho_phieu_xuat_soi','PhieuXuatSoiController');

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
