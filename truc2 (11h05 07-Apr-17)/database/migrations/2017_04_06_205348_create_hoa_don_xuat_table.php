<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoaDonXuatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don_xuat', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('id_don_hang_khach_hang')->unsigned();
            $table->foreign('id_don_hang_khach_hang')->references('id')->on('don_hang_khach_hang');
            $table->integer('id_khach_hang')->unsigned()->nullable();
            $table->foreign('id_khach_hang')->references('id')->on('khach_hang');
            $table->dateTime('ngay_gio_xuat_hoa_don');
            $table->integer('id_nhan_vien_xuat')->unsigned()->nullable();
            $table->foreign('id_nhan_vien_xuat')->references('id')->on('nhan_vien');


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
        Schema::dropIfExists('hoa_don_xuat');
    }
}
