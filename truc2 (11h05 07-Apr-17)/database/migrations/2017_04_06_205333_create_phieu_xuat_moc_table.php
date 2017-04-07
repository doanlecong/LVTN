<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuXuatMocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_xuat_moc', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('id_loai_vai')->unsigned();
            $table->foreign('id_loai_vai')->references('id')->on('loai_vai');
            $table->integer('tong_so_cay_moc')->unsigned();
            $table->integer('tong_so_met')->unsigned();
            $table->integer('id_kho')->unsigned();
            $table->foreign('id_kho')->references('id')->on('kho');
            $table->integer('id_nhan_vien_xuat')->unsigned();
            $table->foreign('id_nhan_vien_xuat')->references('id')->on('nhan_vien');
            $table->dateTime('ngay_gio_xuat_kho');


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
        Schema::dropIfExists('phieu_xuat_moc');
    }
}
