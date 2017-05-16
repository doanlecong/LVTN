<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLoaiCaiIdVaoCayVaiThanhPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cay_vai_thanh_pham', function (Blueprint $table) {
            $table->integer('loai_vai_id')->unsigned()->after('cay_vai_moc_id');
            $table->foreign('loai_vai_id')->references('id')->on('loai_vai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
