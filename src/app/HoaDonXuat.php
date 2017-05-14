<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HoaDonXuat extends Model
{
	protected $table = 'hoa_don_xuat';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	public function don_hang_khach_hang() {
		return $this->belongsTo('App\DonHangKhachHang');
	}
	public function khach_hang() {
		return $this->belongsTo('App\KhachHang');
	}
	public function nhan_vien_xuat() {
		return $this->belongsTo('App\NhanVien', 'nhan_vien_xuat_id');
	}
	
	public function cay_vai_thanh_phams() {
		return $this->hasMany('App\CayVaiThanhPham');
	}
}
