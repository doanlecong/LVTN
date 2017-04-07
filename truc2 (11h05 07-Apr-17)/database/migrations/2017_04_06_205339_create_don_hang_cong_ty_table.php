<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonHangCongTyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang_cong_ty', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('id_loai_soi')->unsigned();
            $table->foreign('id_loai_soi')->references('id')->on('loai_soi');
            $table->integer('id_nha_cung_cap')->unsigned();
            $table->foreign('id_nha_cung_cap')->references('id')->on('nha_cung_cap');
            $table->integer('khoi_luong')->unsigned();
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
        Schema::dropIfExists('don_hang_cong_ty');
    }
}
