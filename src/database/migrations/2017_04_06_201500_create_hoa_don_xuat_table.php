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


            $table->integer('don_hang_khach_hang_id')->unsigned();
            $table->foreign('don_hang_khach_hang_id')->references('id')->on('don_hang_khach_hang');
            $table->integer('khach_hang_id')->unsigned()->nullable();
            $table->foreign('khach_hang_id')->references('id')->on('khach_hang');
            $table->dateTime('ngay_gio_xuat_hoa_don');
            $table->integer('nhan_vien_xuat_id')->unsigned()->nullable();
            $table->foreign('nhan_vien_xuat_id')->references('id')->on('nhan_vien');


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
