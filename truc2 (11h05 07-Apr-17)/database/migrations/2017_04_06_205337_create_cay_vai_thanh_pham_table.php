<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCayVaiThanhPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cay_vai_thanh_pham', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('id_cay_vai_moc')->unsigned();
            $table->foreign('id_cay_vai_moc')->references('id')->on('cay_vai_moc');
            $table->float('kich_co')->unsigned()->nullable();
            $table->integer('so_met')->unsigned();
            $table->bigInteger('don_gia')->unsigned();
            $table->integer('id_kho')->unsigned();
            $table->foreign('id_kho')->references('id')->on('kho');
            $table->dateTime('ngay_gio_nhap_kho');
            $table->integer('id_hoa_don_xuat')->unsigned()->nullable();
            $table->foreign('id_hoa_don_xuat')->references('id')->on('hoa_don_xuat');
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
        Schema::dropIfExists('cay_vai_thanh_pham');
    }
}
