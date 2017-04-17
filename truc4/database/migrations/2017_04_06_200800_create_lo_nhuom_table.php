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


            $table->integer('loai_vai_id')->unsigned()->nullable();
            $table->foreign('loai_vai_id')->references('id')->on('loai_vai');
            $table->integer('mau_id')->unsigned();
            $table->foreign('mau_id')->references('id')->on('mau');
            $table->integer('nhan_vien_nhuom_id')->unsigned()->nullable();
            $table->foreign('nhan_vien_nhuom_id')->references('id')->on('nhan_vien');
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
