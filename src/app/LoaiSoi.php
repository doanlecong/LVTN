<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoaiSoi extends Model
{
	protected $table = 'loai_soi';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	public function kho() {
		return $this->belongsTo('App\Kho');
	}


	public function don_hang_cong_tys() {
		return $this->hasMany('App\DonHangCongTy');
	}
	public function loai_vais() {
		return $this->belongsToMany('App\LoaiVai', 'loai_vai_loai_soi', 'loai_soi_id', 'loai_vai_id')
					->withPivot('dinh_muc', 'ghi_chu', 'created_by', 'updated_by', 'deleted_by')
    				->withTimestamps();
	}
	public function phieu_xuat_sois() {
		return $this->hasMany('App\PhieuXuatSoi');
	}
}
