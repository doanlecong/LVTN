<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kho', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('ten');
            $table->smallInteger('id_nhan_vien_quan_ly')->unsigned();
            $table->float('dien_tich')->unsigned();
            $table->string('dia_chi');
            $table->string('so_dien_thoai');
            $table->tinyInteger('da_xoa')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khos');
    }
}
