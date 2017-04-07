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


            $table->integer('don_hang_cong_ty_id')->unsigned();
            $table->foreign('don_hang_cong_ty_id')->references('id')->on('don_hang_cong_ty');
            $table->integer('nha_cung_cap_id')->unsigned()->nullable();
            $table->foreign('nha_cung_cap_id')->references('id')->on('nha_cung_cap');
            $table->integer('so_thung')->unsigned();
            $table->integer('khoi_luong_thung')->unsigned();
            $table->bigInteger('don_gia')->unsigned();
            $table->integer('kho_id')->unsigned();
            $table->foreign('kho_id')->references('id')->on('kho');
            $table->dateTime('ngay_gio_xuat_hoa_don');
            $table->integer('nhan_vien_nhap_id')->unsigned()->nullable();
            $table->foreign('nhan_vien_nhap_id')->references('id')->on('nhan_vien');


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
