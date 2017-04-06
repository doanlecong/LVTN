<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoaDonXuatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don_xuat', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_don_hang_khach_hang')->unsigned();
            $table->smallInteger('id_khach_hang')->unsigned();
            $table->smallInteger('id_loai_vai')->unsigned();
            $table->smallInteger('id_mau')->unsigned();
            $table->float('kho')->unsigned();
            $table->mediumInteger('tong_so_cay_vai')->unsigned();
            $table->mediumInteger('tong_so_met')->unsigned();
            $table->bigInteger('tong_tien')->unsigned();
            $table->tinyInteger('id_kho')->unsigned();
            $table->smallInteger('id_nhan_vien_xuat')->unsigned();  
            $table->dateTime('ngay_gio_xuat_hoa_don');
            $table->string('tinh_chat');
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
        Schema::dropIfExists('hoa_don_xuats');
    }
}
