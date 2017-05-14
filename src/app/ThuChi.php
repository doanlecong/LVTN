<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThuChi extends Model
{
	protected $table = 'thu_chi';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	public function khach_hang() {
		return $this->belongsTo('App\KhachHang');
	}
	public function nha_cung_cap() {
		return $this->belongsTo('App\NhaCungCap');
	}
    //
}
