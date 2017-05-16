<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMauVaoCayVaiThanhPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cay_vai_thanh_pham', function (Blueprint $table) {
            $table->integer('mau_id')->unsigned()->nullable()->after('don_gia');
            $table->foreign('mau_id')->references('id')->on('mau');
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
