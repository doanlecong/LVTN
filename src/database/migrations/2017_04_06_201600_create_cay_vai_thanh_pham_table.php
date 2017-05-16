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


            $table->integer('cay_vai_moc_id')->unsigned()->nullable();
            $table->foreign('cay_vai_moc_id')->references('id')->on('cay_vai_moc');
            $table->double('kich_co')->unsigned()->nullable();
            $table->integer('so_met')->unsigned();
            $table->bigInteger('don_gia')->unsigned();
            $table->integer('kho_id')->unsigned();
            $table->foreign('kho_id')->references('id')->on('kho');
            $table->dateTime('ngay_gio_nhap_kho');
            $table->integer('hoa_don_xuat_id')->unsigned()->nullable();
            $table->foreign('hoa_don_xuat_id')->references('id')->on('hoa_don_xuat');
            $table->string('ghi_chu_nguon_goc')->nullable();
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
