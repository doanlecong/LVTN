<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThuChiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thu_chi', function (Blueprint $table) {
            $table->increments('id');


            $table->string('loai');
            $table->integer('khach_hang_id')->unsigned()->nullable();
            $table->foreign('khach_hang_id')->references('id')->on('khach_hang');
            $table->integer('nha_cung_cap_id')->unsigned()->nullable();
            $table->foreign('nha_cung_cap_id')->references('id')->on('nha_cung_cap');
            $table->string('phuong_thuc_thanh_toan');
            $table->bigInteger('so_tien')->unsigned();
            $table->string('ngay_gio');


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
        Schema::dropIfExists('thu_chi');
    }
}
