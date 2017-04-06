<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiSoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_soi', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('ten');
            $table->text('thong_tin_ky_thuat');
            $table->unsignedInteger('id_kho');//FK
            $table->integer('khoi_luong_ton_kho');
            $table->integer('so_thung_ton');

            $table->tinyInteger('da_xoa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai_sois');
    }
}
