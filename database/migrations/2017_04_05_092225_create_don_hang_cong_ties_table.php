<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonHangCongTiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang_cong_ty', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->smallInteger('id_loai_soi')->unsigned();
            $table->mediumInteger('khoi_luong')->unsigned();
            $table->date('han_chot');
            $table->smallInteger('id_nha_cung_cap')->unsigned();
            $table->dateTime('ngay_gio_dat_hang');
            $table->string('tinh_trang');
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
        Schema::dropIfExists('don_hang_cong_ties');
    }
}
