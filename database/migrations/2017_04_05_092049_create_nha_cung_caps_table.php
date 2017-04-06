<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhaCungCapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nha_cung_cap', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('ten');
            $table->string('dia_chi');
            $table->string('email');
            $table->string('so_dien_thoai', 15);
            $table->string('fax', 15);
            $table->integer('cong_no');

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
        Schema::dropIfExists('nha_cung_caps');
    }
}
