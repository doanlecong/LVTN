<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();

            $table->rememberToken();

            $table->string('ten_dang_nhap');
            $table->string('chuc_vu');
            $table->integer('quyen');
            $table->integer('luong');
            $table->text('ghi_chu');
            $table->date('ngay_sinh');
            $table->string('gioi_tinh', 1);
            $table->string('dia_chi');
            $table->string('so_dien_thoai', 15);

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
        Schema::dropIfExists('users');
    }
}
