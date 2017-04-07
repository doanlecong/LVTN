<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoNhuomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lo_nhuom', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('id_loai_vai')->unsigned()->nullable();
            $table->foreign('id_loai_vai')->references('id')->on('loai_vai');
            $table->integer('id_mau')->unsigned()->nullable();
            $table->foreign('id_mau')->references('id')->on('mau');
            $table->integer('id_nhan_vien_nhuom')->unsigned()->nullable();
            $table->foreign('id_nhan_vien_nhuom')->references('id')->on('nhan_vien');
            $table->dateTime('ngay_gio_nhuom');


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
        Schema::dropIfExists('lo_nhuom');
    }
}
