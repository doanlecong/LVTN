<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonHangKhachHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang_khach_hang', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('khach_hang_id')->unsigned();
            $table->foreign('khach_hang_id')->references('id')->on('khach_hang');
            $table->integer('loai_vai_id')->unsigned();
            $table->foreign('loai_vai_id')->references('id')->on('loai_vai');
            $table->integer('mau_id')->unsigned();
            $table->foreign('mau_id')->references('id')->on('mau');
            $table->double('kich_co')->unsigned()->nullable();
            $table->integer('tong_so_met')->unsigned();
            $table->smallInteger('chiet_khau')->unsigned()->nullable();
            $table->dateTime('han_chot')->nullable();
            $table->dateTime('ngay_gio_dat_hang');
            $table->string('tinh_trang')->default('Mới');


            $table->text('ghi_chu')->nullable();
            $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('nhan_vien');
            $table->foreign('updated_by')->references('id')->on('nhan_vien');
            $table->foreign('deleted_by')->references('id')->on('nhan_vien');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_hang_khach_hang');
    }
}
