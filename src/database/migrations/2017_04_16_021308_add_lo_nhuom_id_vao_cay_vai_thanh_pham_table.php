<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLoNhuomIdVaoCayVaiThanhPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cay_vai_thanh_pham', function (Blueprint $table) {
            $table->integer('lo_nhuom_id')->unsigned()->nullable()->after('don_gia');
            $table->foreign('lo_nhuom_id')->references('id')->on('lo_nhuom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
