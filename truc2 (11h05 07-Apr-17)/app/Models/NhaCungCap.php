<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhaCungCap extends Model
{
	protected $table = 'nha_cung_cap';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	public function don_hang_cong_ty() {
		return $this->hasMany('App\DonHangCongTy', 'id_don_hang_cong_ty');
	}


	public function don_hang_cong_tys() {
		return $this->hasMany('App\Models\DonHangCongTy');
	}
	public function hoa_don_nhaps() {
		return $this->hasMany('App\Models\HoaDonNhap');
	}
	public function thu_chis() {
		return $this->hasMany('App\Models\ThuChi');
	}
}
