<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CayVaiMoc extends Model
{
	protected $table = 'cay_vai_moc';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	public function loai_vai() {
		return $this->belongsTo('App\LoaiVai');
	}
	public function nhan_vien_det() {
		return $this->belongsTo('App\NhanVien', 'nhan_vien_det_id');
	}
	public function kho() {
		return $this->belongsTo('App\Kho');
	}
	public function phieu_xuat_moc() {
		return $this->belongsTo('App\PhieuXuatMoc');
	}
	public function lo_nhuom() {
		return $this->belongsTo('App\LoNhuom');
	}


	public function cay_vai_thanh_pham() {
		return $this->hasOne('App\CayVaiThanhPham');
	}
}
