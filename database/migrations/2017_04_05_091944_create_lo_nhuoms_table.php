<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoNhuomsTable extends Migration
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
            $table->timestamps();

            $table->unsignedInteger('id_loai_vai');//FK
            $table->unsignedInteger('id_mau');//FK
            $table->unsignedInteger('id_nhan_vien_nhuom');//FK
            $table->date('ngay_gio_nhuom');

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
        Schema::dropIfExists('lo_nhuoms');
    }
}
