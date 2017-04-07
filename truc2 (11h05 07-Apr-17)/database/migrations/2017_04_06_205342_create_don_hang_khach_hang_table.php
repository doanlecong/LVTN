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


            $table->integer('id_khach_hang')->unsigned();
            $table->foreign('id_khach_hang')->references('id')->on('khach_hang');
            $table->integer('id_loai_vai')->unsigned();
            $table->foreign('id_loai_vai')->references('id')->on('loai_vai');
            $table->integer('id_mau')->unsigned();
            $table->foreign('id_mau')->references('id')->on('mau');
            $table->float('kich_co')->unsigned()->nullable();
            $table->integer('trong_so_met')->unsigned();
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
