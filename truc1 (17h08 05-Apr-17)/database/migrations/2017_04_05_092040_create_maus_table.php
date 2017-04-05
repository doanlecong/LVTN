<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('ten');
            $table->text('cong_thuc');
            $table->unsignedInteger('id_nhan_vien_pha_che');//FK
            $table->dateTime('ngay_gio_tao');

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
        Schema::dropIfExists('maus');
    }
}
