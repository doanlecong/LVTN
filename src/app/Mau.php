<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mau extends Model
{
	protected $table = 'mau';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	public function nhan_vien_pha_che() {
		return $this->belongsTo('App\NhanVien', 'nhan_vien_pha_che_id');
	}


	public function don_hang_khach_hangs() {
		return $this->hasMany('App\DonHangKhachHang');
	}
	public function cay_vai_thanh_phams() {
		return $this->hasMany('App\CayVaiThanhPham');
	}
	public function cay_vai_thanh_pham_tra_lais() {
		return $this->hasMany('App\CayVaiThanhPhamTraLai');
	}
	public function lo_nhuoms() {
		return $this->hasMany('App\LoNhuom');
	}
}
