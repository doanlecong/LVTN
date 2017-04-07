<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoaDonNhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don_nhap', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('id_don_hang_cong_ty')->unsigned();
            $table->foreign('id_don_hang_cong_ty')->references('id')->on('don_hang_cong_ty');
            $table->integer('id_nha_cung_cap')->unsigned()->nullable();
            $table->foreign('id_nha_cung_cap')->references('id')->on('nha_cung_cap');
            $table->integer('so_thung')->unsigned();
            $table->integer('khoi_luong_thung')->unsigned();
            $table->bigInteger('don_gia')->unsigned();
            $table->integer('id_kho')->unsigned();
            $table->foreign('id_kho')->references('id')->on('kho');
            $table->dateTime('ngay_gio_xuat_hoa_don');
            $table->integer('id_nhan_vien_nhap')->unsigned()->nullable();
            $table->foreign('id_nhan_vien_nhap')->references('id')->on('nhan_vien');


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
        Schema::dropIfExists('hoa_don_nhap');
    }
}
