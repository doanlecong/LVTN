<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThuChisTable extends Migration
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
            $table->timestamps();

            $table->string('loai');
            $table->unsignedInteger('id_nha_cung_cap');//FK
            $table->unsignedInteger('id_khach_hang');//FK
            $table->integer('so_tien');
            $table->dateTime('ngay_gio');
            $table->string('phuong_thuc_thanh_toan');

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
        Schema::dropIfExists('thu_chis');
    }
}
