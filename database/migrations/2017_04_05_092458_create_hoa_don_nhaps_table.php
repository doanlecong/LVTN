<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoaDonNhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don_nhap', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_don_hang_cong_ty')->unsigned();
            $table->smallInteger('id_nha_cung_cap')->unsigned();
            $table->smallInteger('id_loai_doi')->unsigned();
            $table->smallInteger('so_thung')->unsigned();
            $table->float('khoi_luong_thung')->unsigned();
            $table->mediumInteger('tong_khoi_luong_nhap')->unsigned();
            $table->mediumInteger('don_gia')->unsigned();
            $table->bigInteger('tong_tien')->unsigned();
            $table->tinyInteger('id_kho')->unsigned();
            $table->smallInteger('id_nhan_vien_nhap')->unsigned();
            $table->dateTime('ngay_gio_xuat_hoa_don');
            $table->string('tinh_chat');
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
        Schema::dropIfExists('hoa_don_nhaps');
    }
}
