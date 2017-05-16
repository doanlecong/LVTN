<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThanhToan extends Model
{
    protected $table = 'thanh_toan';
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	public function khach_hang() {
		return $this->belongsTo('App\KhachHang');
	}
}
