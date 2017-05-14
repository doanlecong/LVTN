<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhieuXuatSoi extends Model
{
	protected $table = 'phieu_xuat_soi';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	public function loai_soi() {
		return $this->belongsTo('App\LoaiSoi');
	}
	public function kho() {
		return $this->belongsTo('App\Kho');
	}
	public function nhan_vien_xuat() {
		return $this->belongsTo('App\NhanVien', 'nhan_vien_xuat_id');
	}

	
    //
}
