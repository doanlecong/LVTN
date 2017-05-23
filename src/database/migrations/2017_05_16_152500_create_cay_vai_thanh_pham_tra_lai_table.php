<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCayVaiThanhPhamTraLaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cay_vai_thanh_pham_tra_lai', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('hoa_don_xuat_id')->unsigned();//->nullable();
            $table->foreign('hoa_don_xuat_id')->references('id')->on('hoa_don_xuat');
            $table->integer('cay_vai_thanh_pham_id')->unsigned();
            $table->foreign('cay_vai_thanh_pham_id')->references('id')->on('cay_vai_thanh_pham');
            $table->double('kich_co')->unsigned()->nullable();
            $table->integer('so_met')->unsigned();
            $table->bigInteger('don_gia')->unsigned();
            $table->integer('loai_vai_id')->unsigned();//->nullable();
            $table->foreign('loai_vai_id')->references('id')->on('loai_vai');
            $table->integer('mau_id')->unsigned();//->nullable();
            $table->foreign('mau_id')->references('id')->on('mau');            

            // $table->dateTime('ngay_gio_tra_lai'); //ngày giờ bị trả lại
            //$table->string('tinh_trang')->default('Vừa bị trả lại');


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
