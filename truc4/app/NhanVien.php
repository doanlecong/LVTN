<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhanVien extends Model
{
	protected $table = 'nhan_vien';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function user() {
        return $this->belongsTo('App\User');
    }


    public function cay_vai_mocs() {
        return $this->hasMany('App\CayVaiMoc', 'nhan_vien_det_id');
    }
    public function hoa_don_nhaps() {
        return $this->hasMany('App\HoaDonNhap', 'nhan_vien_nhap_id');
    }
    public function hoa_don_xuats() {
        return $this->hasMany('App\HoaDonXuat', 'nhan_vien_xuat_id');
    }
    public function khos() {
        return $this->hasMany('App\Kho', 'nhan_vien_quan_ly_id');
    }
    public function lo_nhuoms() {
        return $this->hasMany('App\LoNhuom', 'nhan_vien_nhuom_id');
    }
    public function maus() {
        return $this->hasMany('App\Mau', 'nhan_vien_pha_che_id');
    }
    public function phieu_xuat_mocs() {
        return $this->hasMany('App\PhieuXuatMoc', 'nhan_vien_xuat_id');
    }
    public function phieu_xuat_sois() {
        return $this->hasMany('App\PhieuXuatSoi', 'nhan_vien_xuat_id');
    }
}
