<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuXuatMocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_xuat_moc', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('id_loai_vai');//FK
            $table->integer('tong_so_cay_moc');
            $table->integer('tong_so_met');
            $table->unsignedInteger('id_kho');//FK
            $table->unsignedInteger('id_nhan_vien_xuat');//FK
            $table->dateTime('ngay_gio_xuat_kho');

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
        Schema::dropIfExists('phieu_xuat_mocs');
    }
}
