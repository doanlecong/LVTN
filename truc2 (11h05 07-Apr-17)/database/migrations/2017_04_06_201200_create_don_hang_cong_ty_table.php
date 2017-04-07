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


            $table->integer('loai_soi_id')->unsigned();
            $table->foreign('loai_soi_id')->references('id')->on('loai_soi');
            $table->integer('nha_cung_cap_id')->unsigned();
            $table->foreign('nha_cung_cap_id')->references('id')->on('nha_cung_cap');
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
