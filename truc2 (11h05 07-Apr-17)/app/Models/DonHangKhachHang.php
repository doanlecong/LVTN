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
		return $this->belongsToOne('App\Models\KhachHang');
	}
	public function loai_vai() {
		return $this->belongsToOne('App\Models\LoaiVai');
	}
	public function mau() {
		return $this->belongsToOne('App\Models\Mau');
	}


	public function hoa_don_xuats() {
		return $this->hasMany('App\Models\HoaDonXuat');
	}
}
