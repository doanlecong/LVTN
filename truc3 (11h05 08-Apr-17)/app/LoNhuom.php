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
		return $this->belongsTo('App\LoaiVai');
	}
	public function mau() {
		return $this->belongsTo('App\Mau');
	}
	public function nhan_vien_nhuom() {
		return $this->belongsTo('App\NhanVien', 'nhan_vien_nhuom_id');
	}


	public function cay_vai_mocs() {
		return $this->hasMany('App\CayVaiMoc');
	}
}
