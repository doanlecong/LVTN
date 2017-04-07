<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoNhuom extends Model
{
	protected $table = 'lo_nhuom';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	public function loai_vai() {
		return $this->belongsToOne('App\Models\LoaiVai');
	}
	public function mau() {
		return $this->belongsToOne('App\Models\Mau');
	}
	public function nhan_vien_nhuom() {
		return $this->belongsToOne('App\Models\NhanVien', 'nhan_vien_nhuom_id');
	}


	public function cay_vai_mocs() {
		return $this->hasMany('App\Models\CayVaiMoc');
	}
}
