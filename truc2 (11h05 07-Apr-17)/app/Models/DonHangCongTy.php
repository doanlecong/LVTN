<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonHangCongTy extends Model
{
	protected $table = 'don_hang_cong_ty';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	public function loai_soi() {
		return $this->belongsToOne('App\Models\LoaiSoi');
	}
	public function nha_cung_cap() {
		return $this->belongsToOne('App\Models\NhaCungCap');
	}


	public function hoa_don_nhaps() {
		return $this->hasMany('App\Models\HoaDonNhap');
	}
}
