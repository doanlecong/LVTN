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
		return $this->belongsToOne('App\Models\DonHangCongTy');
	}
	public function nha_cung_cap() {
		return $this->belongsToOne('App\Models\NhaCungCap');
	}
	public function kho() {
		return $this->belongsToOne('App\Models\Kho');
	}
	public function nhan_vien_nhap() {
		return $this->belongsToOne('App\Models\NhanVien', 'nhan_vien_nhap_id');
	}


	//
}
