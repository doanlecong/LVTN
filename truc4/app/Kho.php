<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kho extends Model
{
	protected $table = 'kho';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	public function nhan_vien_quan_ly() {
		return $this->belongsTo('App\NhanVien', 'nhan_vien_quan_ly_id');
	}


	public function cay_vai_mocs() {
		return $this->hasMany('App\CayVaiMoc');
	}
	public function cay_vai_thanh_phams() {
		return $this->hasMany('App\CayVaiThanhPham');
	}
	public function hoa_don_nhaps() {
		return $this->hasMany('App\HoaDonNhap');
	}
	public function loai_sois() {
		return $this->hasMany('App\LoaiSoi');
	}
	public function phieu_xuat_mocs() {
		return $this->hasMany('App\PhieuXuatMoc');
	}
	public function phieu_xuat_sois() {
		return $this->hasMany('App\PhieuXuatSoi');
	}
}
