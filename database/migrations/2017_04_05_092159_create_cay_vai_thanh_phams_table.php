<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCayVaiThanhPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cay_vai_thanh_pham', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cay_vai_moc')->unsigned();
            $table->smallInteger('id_loai_vai')->unsigned();
            $table->smallInteger('id_mau')->unsigned();
            $table->float('kho',8,2)->unsigned();
            $table->smallInteger('so_met')->unsigned();
            $table->mediumInteger('don_gia')->unsigned();
            $table->integer('thanh_tien')->unsigned();
            $table->integer('id_lo_nhuom')->unsigned();
            $table->tinyInteger('id_kho')->unsigned();
            $table->dateTime('ngay_gio_nhap_kho');
            $table->integer('id_hoa_don_xuat')->unsigned();
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
        Schema::dropIfExists('cay_vai_thanh_phams');
    }
}
