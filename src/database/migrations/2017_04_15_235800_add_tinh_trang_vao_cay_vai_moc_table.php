<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTinhTrangVaoCayVaiMocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cay_vai_moc', function (Blueprint $table) {
            $table->string('tinh_trang')->after('lo_nhuom_id')->default('Chưa Xuất')->comment('Chưa Xuất/ Đã Xuất');
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
