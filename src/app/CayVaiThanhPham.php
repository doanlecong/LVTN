<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CayVaiThanhPham extends Model
{
	protected $table = 'cay_vai_thanh_pham';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	public function cay_vai_moc() {
		return $this->belongsTo('App\CayVaiMoc');
	}
	public function loai_vai(){
		return $this->belongsTo('App\LoaiVai');
	}
	public function lo_nhuom(){
		return $this->belongsTo('App\LoNhuom');
	}
	public function mau() {
		return $this->belongsTo('App\Mau');
	}
	public function kho() {
		return $this->belongsTo('App\Kho');
	}
	public function hoa_don_xuat() {
		return $this->belongsTo('App\HoaDonXuat');
	}


	public function cay_vai_thanh_pham_tra_lai() {
		return $this->hasOne('App\CayVaiThanhPhamTraLai');
	}

}
