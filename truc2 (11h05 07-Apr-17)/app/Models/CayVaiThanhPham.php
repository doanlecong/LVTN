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
		return $this->belongsToOne('App\Models\CayVaiMoc');
	}
	public function kho() {
		return $this->belongsToOne('App\Models\Kho');
	}
	public function hoa_don_xuat() {
		return $this->belongsToOne('App\Models\HoaDonXuat');
	}


	//
}
