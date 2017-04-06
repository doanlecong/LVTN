<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('ho_ten');
            $table->string('ten_dang_nhap');
            $table->string('mat_khau');
            $table->string('dia_chi');
            $table->string('email');
            $table->string('so_dien_thoai');
            $table->bigInteger('cong_no');
            $table->tinyInteger('da_xoa')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khach_hangs');
    }
}
