<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KhachHang extends Model
{
	protected $table = 'khach_hang';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];


	public function don_hang_khach_hangs() {
		return $this->hasMany('App\DonHangKhachHang');
	}
	public function hoa_don_xuats() {
		return $this->hasMany('App\HoaDonXuat');
	}
	public function thu_chis() {
		return $this->hasMany('App\ThuChi');
	}
	public function thanh_toans() {
		return $this->hasMany('App\ThanhToan');
	}
}
