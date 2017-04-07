<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCayVaiMocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cay_vai_moc', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('id_loai_vai')->unsigned();
            $table->foreign('id_loai_vai')->references('id')->on('loai_vai');
            $table->integer('so_met')->unsigned();
            $table->integer('id_nhan_vien_det')->unsigned();
            $table->foreign('id_nhan_vien_det')->references('id')->on('nhan_vien');
            $table->string('ma_may_det');//
            $table->dateTime('ngay_gio_det');
            $table->integer('id_kho')->unsigned();
            $table->foreign('id_kho')->references('id')->on('kho');
            $table->dateTime('ngay_gio_nhap_kho');
            $table->integer('id_phieu_xuat_moc')->unsigned()->nullable();
            $table->foreign('id_phieu_xuat_moc')->references('id')->on('phieu_xuat_moc');
            $table->integer('id_lo_nhuom')->unsigned()->nullable();
            $table->foreign('id_lo_nhuom')->references('id')->on('lo_nhuom');
            //$table->string('tinh_trang')->default('Chưa xuất');


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
        Schema::dropIfExists('cay_vai_moc');
    }
}
