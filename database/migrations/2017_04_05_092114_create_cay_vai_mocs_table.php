<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCayVaiMocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cay_vai_moc', function (Blueprint $table) {
            $table->increments('id');
            $table_>smallInteger('id_loai_vai')->unsigned();
            $table->smallInteger('id_loai_soi')->unsigned();
            $table->smallInteger('so_met')->unsigned();
            $table->smallInteger('id_nhan_vien_det')->unsigned();
            $table->smallInteger('ma_may_det')->unsigned();
            $table->dateTime('ngay_gio_det');
            $table->tinyInteger('id_kho')->unsigned();
            $table->dateTime('ngay_gio_nhap_kho');
            $table->integer('id_phieu_xuat_moc')->unsigned();
            $table->string('tinh_trang');
            $table->integer('id_lo_nhuom')->unsigned();
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
        Schema::dropIfExists('cay_vai_mocs');
    }
}
