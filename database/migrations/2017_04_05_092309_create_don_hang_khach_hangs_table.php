<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonHangKhachHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang_khach_hang', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->smallInteger('id_khach_hang')->unsigned();
            $table->smallInteger('id_loai_vai')->unsigned();
            $table->smallInteger('id_mau')->unsigned();
            $table->float('kho')->unsigned();
            $table->mediumInteger('tong_so_met')->unsigned();
            $table->date('han_chot');
            $table->dateTime('ngay_gio_dat_hang');
            $table->string('tinh_trang');
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
        Schema::dropIfExists('don_hang_khach_hangs');
    }
}
