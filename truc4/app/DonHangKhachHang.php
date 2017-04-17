<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonHangKhachHang extends Model
{
	protected $table = 'don_hang_khach_hang';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	public function khach_hang() {
		return $this->belongsTo('App\KhachHang');
	}
	public function loai_vai() {
		return $this->belongsTo('App\LoaiVai');
	}
	public function mau() {
		return $this->belongsTo('App\Mau');
	}


	public function hoa_don_xuats() {
		return $this->hasMany('App\HoaDonXuat');
	}
}
