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
		return $this->belongsToOne('App\Models\LoaiVai');
	}
	public function nhan_vien_det() {
		return $this->belongsToOne('App\Models\NhanVien', 'nhan_vien_det_id');
	}
	public function kho() {
		return $this->belongsToOne('App\Models\Kho');
	}
	public function phieu_xuat_moc() {
		return $this->belongsToOne('App\Models\PhieuXuatMoc');
	}
	public function lo_nhuom() {
		return $this->belongsToOne('App\Models\LoNhuom');
	}


	public function cay_vai_thanh_pham() {
		return $this->hasOne('App\Models\CayVaiThanhPham');
	}


	//--//--//--//
	public function mau() {
		return $this->lo_nhuom()->mau;
	}
}
