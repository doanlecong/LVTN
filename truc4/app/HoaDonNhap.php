<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HoaDonNhap extends Model
{
	protected $table = 'hoa_don_nhap';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	public function don_hang_cong_ty() {
		return $this->belongsTo('App\DonHangCongTy');
	}
	public function nha_cung_cap() {
		return $this->belongsTo('App\NhaCungCap');
	}
	public function kho() {
		return $this->belongsTo('App\Kho');
	}
	public function nhan_vien_nhap() {
		return $this->belongsTo('App\NhanVien', 'nhan_vien_nhap_id');
	}


	//
}
