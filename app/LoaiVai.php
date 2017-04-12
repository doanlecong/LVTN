<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoaiVai extends Model
{
	protected $table = 'loai_vai';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	//


	public function cay_vai_mocs() {
		return $this->hasMany('App\CayVaiMoc');
	}
	public function don_hang_khach_hangs() {
		return $this->hasMany('App\DonHangKhachHang');
	}
	public function lo_nhuoms() {
		return $this->hasMany('App\LoNhuom');
	}
	public function loai_soi(){
		$this->belongsTo('App\LoaiSoi');
	}
	public function loai_sois() {
		return $this->belongsToMany('App\LoaiSoi', 'loai_vai_loai_soi', 'loai_vai_id', 'loai_soi_id')
					->withPivot('dinh_muc', 'ghi_chu', 'created_by', 'updated_by', 'deleted_by')
    				->withTimestamps();
	}
	public function phieu_xuat_mocs() {
		return $this->hasMany('App\PhieuXuatMoc');
	}
}
