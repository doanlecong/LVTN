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
		return $this->belongsToOne('App\Models\NhanVien', 'nhan_vien_quan_ly_id');
	}


	public function cay_vai_mocs() {
		return $this->hasMany('App\Models\CayVaiMoc');
	}
	public function cay_vai_thanh_phams() {
		return $this->hasMany('App\Models\CayVaiThanhPham');
	}
	public function hoa_don_nhaps() {
		return $this->hasMany('App\Models\HoaDonNhap');
	}
	public function loai_sois() {
		return $this->hasMany('App\Models\LoaiSoi');
	}
	public function phieu_xuat_mocs() {
		return $this->hasMany('App\Models\PhieuXuatMoc');
	}
	public function phieu_xuat_sois() {
		return $this->hasMany('App\Models\PhieuXuatSoi');
	}
}
